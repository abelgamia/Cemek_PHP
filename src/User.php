<?php

namespace src;

use PDO;

/**
 *
 * @author Edi
 *        
 */
class User extends Model {
	private $id;
	private $login;
	private $pass;
	private $email;
	private $access;
	private $loged = FALSE;
	// --------------------------------------
	public function __construct() {
		parent::__construct();
		if ((!empty($_SESSION['user']['login'])) && (!empty($_SESSION['user']['pass']))) {
			addslashes($_SESSION['user']['login']);
			$this->setLogin($_SESSION['user']['login']);
			addslashes($_SESSION['user']['pass']);
			$this->setPass($_SESSION['user']['pass']);
			$sql = "SELECT * FROM users WHERE login = '$this->getLogin()'";
			$query = $this->conn->prepare($sql);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if (!empty($result)) {
				if (password_verify($this->getPass(),$result['pass'])) {
					$this->setId($result['id']);
					$_SESSION['user']['id'] = $this->getId();
					$this->setEmail($result['email']);
					$_SESSION['user']['email'] = $this->getEmail();
					$this->setAccess($result['access']);
					$_SESSION['user']['access'] = $this->getAccess();
					$this->setLoged(TRUE);
					$_SESSION['user']['loged'] = TRUE;
				}
			}
		}
	}
	// --------------------------------------
	public function login($login, $pass) {
		$_SESSION['user']['login'] = addslashes($login);
		$this->setLogin($_SESSION['user']['login']);
		$_SESSION['user']['pass'] = addslashes($pass);
		$this->setPass($_SESSION['user']['pass']);
		$sql = "SELECT * FROM users WHERE login = '$this->getLogin()'";
		$query = $this->conn->prepare($sql);
		$query->bindValue('login',$this->getLogin());
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		if (!empty($result)) {
			if (password_verify($this->getPass(),$result['pass'])) {
				$this->setId($result['id']);
				$_SESSION['user']['id'] = $this->getId();
				$this->setEmail($result['email']);
				$_SESSION['user']['email'] = $this->getEmail();
				$this->setAccess($result['access']);
				$_SESSION['user']['access'] = $this->getAccess();
				$this->setLoged(TRUE);
				$_SESSION['user']['loged'] = TRUE;
				return TRUE;
			} else {
				$_SESSION['err']['pass'] = 'Złe haslo';
				unset($_SESSION['user']['login']);
				unset($_SESSION['user']['pass']);
				return FALSE;
			}
		} else {
			$_SESSION['err']['login'] = 'Zły login';
			unset($_SESSION['user']['login']);
			unset($_SESSION['user']['pass']);
			return FALSE;
		}
		header("Location:{$_SERVER['PHP_SELF']}"); // ???????????????/
		$this->conn = null; // ???????????????/
	}
	public function logout() {
		if ($this->getLoged()) {
			$this->setLoged(FALSE);
			$this->setId(0);
			$this->setAccess(0);
			session_destroy();
			header("Location:{$_SERVER['PHP_SELF']}"); // ???????????????/
			return TRUE;
		} else {
			return FALSE;
		}
	}
	// --------------------------------------
	public function register($login, $email, $pass, $pass2, $regulations) {
		$login = addslashes($login);
		$email = addslashes($email);
		$pass = addslashes($pass);
		$pass2 = addslashes($pass2);
		$all_OK = TRUE;
		{
			if ((strlen($login) < 3) || (strlen($login) > 20)) {
				$all_OK = FALSE;
				$_SESSION['e']['login'] = "Nick musi posiadać od 3 do 20 znaków!";
			}
			if (ctype_alnum($login) == FALSE) {
				$all_OK = FALSE;
				$_SESSION['e']['login'] = "Nick musi składać się z znaków alfanumerycznych";
			}
			$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
			if ((filter_var($emailB,FILTER_VALIDATE_EMAIL) == FALSE) || ($emailB != $email)) {
				$all_OK = FALSE;
				$_SESSION['e']['email'] = "Podaj poprawny adres e-mail!";
			}
			if ((strlen($pass) < 6) || (strlen($pass2) > 20)) {
				$all_OK = FALSE;
				$_SESSION['e']['pass'] = "Hasło musi składać się od 6 do 20 znaków.";
			}
			if ($pass != $pass2) {
				$all_OK = FALSE;
				$_SESSION['e']['pass'] = "Hasła nie są identyczne.";
			}
			$pass_hash = password_hash($pass,PASSWORD_DEFAULT);
			if (!isset($regulations)) {
				$all_OK = FALSE;
				$_SESSION['e']['regulations'] = "Zaakceptuj regulamin.";
			}
			$sql = "SELECT email FROM users WHERE email = '$email'";
			$query = $this->conn->prepare($sql);
			$query->bindValue('email',$email);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if (!empty($result)) {
				$all_OK = FALSE;
				$_SESSION['e']['email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
			}
			$sql = "SELECT login FROM users WHERE login = '$login'";
			$query = $this->conn->prepare($sql);
			$query->bindValue('login',$login);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if (!empty($result)) {
				$all_OK = FALSE;
				$_SESSION['e']['login'] = "Istnieje już gracz o takim nicku! Wybierz inny.";
			}
			if ($all_OK == TRUE) {
				$sql = "INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email', '1', '')";
				$query = $this->conn->prepare($sql);
				$query->execute();
				$_SESSION['udanarejestracja'] = TRUE; // ???????????????/
				header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
			}
			$this->conn = null; // ???????????????/
		}
	}
	public function chengeEmail($new_email, $pass, $confirm) {
		if ($this->getLoged == TRUE) {
			$email = addslashes($new_email);
			$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
			if ((filter_var($emailB,FILTER_VALIDATE_EMAIL) == FALSE) || ($emailB != $email)) {
				$_SESSION['e_change_email'] = "Podaj poprawny adres e-mail!"; // ???????????????/
				header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
			} else {
				$sql = "SELECT email FROM users WHERE email = '$email'";
				$query = $this->conn->prepare($sql);
				$query->bindValue('email',$email);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_ASSOC);
				if (!empty($result)) {
					$_SESSION['e_change_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
					// ???????????????/
					header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
				} else {
					if (!isset($confirm)) {
						$_SESSION['e_potwierdz'] = "Zaakceptuj potwierdz.";
						// ???????????????/
						header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
						return FALSE;
					} else {
						if ($this->pass == $pass) {
							$sql = "UPDATE users SET email = '$email' WHERE login = '$this->getLogin()'";
							$query = $this->conn->prepare($sql);
							$query->bindValue('login', $this->getLogin());
							$query->execute();
							$_SESSION['zmiany'] = "Email został zmieniony na " . $email;
							// ???????????????/
							header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
							return TRUE;
						}
						$_SESSION['e_change_email_haslo'] = "Nieprawidłowe hasło";
						// ???????????????/
						header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
					}
				}
			}
		} else {
			return FALSE;
		}
	}
	public function chengePass($old_pass, $new_pass, $new_pass2, $confirm) {
		if ($this->getLoged() == TRUE) {
			if ($this->getPass() == $old_pass) {
				$pass = addslashes($new_pass);
				$pass2 = addslashes($new_pass2);
				if ((strlen($pass) < 6) || (strlen($pass2) > 20))
				{
					$_SESSION['e_change_haslo'] = "Hasło musi składać się od 6 do 20 znaków.";
					// ???????????????/
					header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
				} else {
					if ($new_pass != $new_pass2) {
						$_SESSION['e_change_haslo2'] = "Hasła nie są identyczne.";
						// ???????????????/
						header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
					} else {
						$pass_hash = password_hash($pass,PASSWORD_DEFAULT);
						$sql = "UPDATE users SET pass = '$pass_hash' WHERE login = '$this->getLogin()'";
						$query = $this->conn->prepare($sql);
						$query->execute();
						// ???????????????/
						$_SESSION['zmiany'] = "Hasło zostało zmienionye";
						$_SESSION['haslo'] = $this->setPass($pass);
						// ???????????????/
						header("Location: {$_SERVER['PHP_SELF']}");
						// ???????????????/
						return TRUE;
					}
				}
			} else {
				$_SESSION['e_change_haslo_haslo'] = "Złe hasło."; // ???????????????/
				header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
			}
		} else {
			return FALSE;
		}
	}
	public function delUser() {}
	// --------------------------------------
	protected function getId() {
		return $this->id;
	}
	protected function setId($id) {
		$this->id = $id;
	}
	protected function getLogin() {
		return $this->login;
	}
	protected function setLogin($login) {
		$this->login = $login;
	}
	protected function getPass() {
		return $this->pass;
	}
	protected function setPass($pass) {
		$this->pass = $pass;
	}
	protected function getEmail() {
		return $this->email;
	}
	protected function setEmail($email) {
		$this->email = $email;
	}
	protected function getAccess() {
		return $this->access;
	}
	protected function setAccess($access) {
		$this->access = $access;
	}
	protected function getLoged() {
		return $this->loged;
	}
	protected function setLoged($loged) {
		$this->loged = $loged;
	}
}

