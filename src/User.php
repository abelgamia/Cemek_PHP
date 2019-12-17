<?php

namespace src;

use PDO;
use function src\User\getLogin;

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
	public function __construct() {
		parent::__construct();
		if (! empty($_SESSION['login']) && ! empty($_SESSION['haslo'])) {
			addslashes($_SESSION['login']);
			$this->setLogin($_SESSION['login']);
			addslashes($_SESSION['haslo']);
			$this->setPass($_SESSION['haslo']);
			$sql = "SELECT * FROM uzytkownicy WHERE user = 'getLogin()'";
			$query = $this->conn->prepare($sql);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if (! empty($result)) {
				if (password_verify($this->getPass(),$result['pass'])) {
					$this->setId($result['id']);
					$_SESSION['id'] = $this->getId();
					$this->setEmail($result['email']);
					$_SESSION['email'] = $this->getEmail();
					$this->setAccess($result['access']);
					$_SESSION['access'] = $this->getAccess();
					$this->setLoged(TRUE);
					$_SESSION['loged'] = TRUE;
				}
			}
		}
	}
	public function login($login, $haslo) {
		$_SESSION['login'] = addslashes($login);
		$this->setLogin($_SESSION['login']);
		$_SESSION['haslo'] = addslashes($haslo);
		$this->setPass($_SESSION['haslo']);
		$sql = "SELECT * FROM uzytkownicy WHERE user = 'getLogin()'";
		$query = $this->conn->prepare($sql);
		$query->bindValue('user',$this->getLogin());
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		if (! empty($result)) {
			if (password_verify($this->getPass(),$result['pass'])) {
				$this->setId($result['id']);
				$_SESSION['id'] = $this->getId();
				$this->setEmail($result['email']);
				$_SESSION['email'] = $this->getEmail();
				$this->setAccess($result['access']);
				$_SESSION['access'] = $this->getAccess();
				$this->setLoged(TRUE);
				$_SESSION['loged'] = TRUE;
				return TRUE;
			} else {
				$_SESSION['blad_haslo'] = 'Złe haslo';
				unset($_SESSION['haslo']);
				unset($_SESSION['login']);
				return false;
			}
		} else {
			$_SESSION['blad_login'] = 'Zły login';
			unset($_SESSION['login']);
			unset($_SESSION['haslo']);
			return false;
		}
		header("Location:{$_SERVER['PHP_SELF']}");
		$this->conn = null;
	}
	public function logout() {
		if ($this->getLoged()) {
			$this->setLoged(FALSE);
			$this->setId(0);
			$this->setAccess(0);
			session_destroy();
			header("Location:{$_SERVER['PHP_SELF']}");
			return true;
		} else {
			return false;
		}
	}
	public function register($new_login, $new_email, $new_haslo, $new_haslo2, $regulamin) {
		$login = addslashes($new_login);
		$email = addslashes($new_email);
		$haslo = addslashes($new_haslo);
		$haslo2 = addslashes($new_haslo2);
		$wszystko_OK = true;
		if ((strlen($login) < 3) || (strlen($login) > 20)) {
			$wszystko_OK = false;
			$_SESSION['e_login'] = "Nick musi posiadać od 3 do 20 znaków!";
		}
		if (ctype_alnum($login) == false) {
			$wszystko_OK = false;
			$_SESSION['e_login'] = "Nick musi składać się z znaków alfanumerycznych";
		}
		$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
		if ((filter_var($emailB,FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
			$wszystko_OK = false;
			$_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
		}
		if ((strlen($haslo) < 6) || (strlen($haslo2) > 20)) {
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = "Hasło musi składać się od 6 do 20 znaków.";
		}
		if ($haslo != $haslo2) {
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = "Hasła nie są identyczne.";
		}
		$haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
		if (! isset($regulamin)) {
			$wszystko_OK = false;
			$_SESSION['e_regulamin'] = "Zaakceptuj regulamin.";
		}
		$sql = "SELECT email FROM uzytkownicy WHERE email = '$email'";
		$query = $this->conn->prepare($sql);
		$query->bindValue('email',$email);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		if (! empty($result)) {
			$wszystko_OK = false;
			$_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
		}
		$sql = "SELECT user FROM uzytkownicy WHERE user = '$login'";
		$query = $this->conn->prepare($sql);
		$query->bindValue('user',$login);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		if (! empty($result)) {
			$wszystko_OK = false;
			$_SESSION['e_login'] = "Istnieje już gracz o takim nicku! Wybierz inny.";
		}
		if ($wszystko_OK == true) {
			$sql = "INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email', '1', '')";
			$query = $this->conn->prepare($sql);
			$query->execute();
			$_SESSION['udanarejestracja'] = true;
			header("Location: {$_SERVER['PHP_SELF']}");
		}
		$this->conn = null;
	}
	public function chengeEmail($new_email, $haslo, $potwierdz) {
		if ($this->getLoged == true) { //???????????????????????????????????
			$email = addslashes($new_email);
			$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
			
			if ((filter_var($emailB,FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
				$_SESSION['e_change_email'] = "Podaj poprawny adres e-mail!";
				header("Location: {$_SERVER['PHP_SELF']}");
			} else {
				$sql = "SELECT email FROM uzytkownicy WHERE email = '$email'";
				$query = $this->conn->prepare($sql);
				$query->bindValue('email',$email);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_ASSOC);
				if (! empty($result)) {
					$_SESSION['e_change_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
					header("Location: {$_SERVER['PHP_SELF']}");
				} else {
					if (! isset($potwierdz)) {
						$_SESSION['e_potwierdz'] = "Zaakceptuj potwierdz.";
						header("Location: {$_SERVER['PHP_SELF']}");
						return false;
					} else {
						if ($this->haslo == $haslo) {
							$sql = "UPDATE uzytkownicy SET email = '$email' WHERE user = 'getLogin()'";
							$query = $this->conn->prepare($sql);
							$query->bindValue('user',getLogin());
							$query->execute();
							$_SESSION['zmiany'] = "Email został zmieniony na " . $email;
							header("Location: {$_SERVER['PHP_SELF']}");
							return true;
						}
						$_SESSION['e_change_email_haslo'] = "Nieprawidłowe hasło";
						header("Location: {$_SERVER['PHP_SELF']}");
					}
				}
			}
		} else {
			return false;
		}
	}
	public function chengePass($old_haslo, $new_haslo, $new_haslo2, $potwierdz) {
		if ($this->czy_zalogowany == true) {
			if ($this->haslo == $old_haslo) {
				$haslo = addslashes($new_haslo);
				$haslo2 = addslashes($new_haslo2);
				if ((strlen($haslo) < 6) || (strlen($haslo2) > 20))
				{
					$_SESSION['e_change_haslo'] = "Hasło musi składać się od 6 do 20 znaków.";
					header("Location: {$_SERVER['PHP_SELF']}");
				} else {
					if ($new_haslo != $new_haslo2) {
						$_SESSION['e_change_haslo2'] = "Hasła nie są identyczne.";
						header("Location: {$_SERVER['PHP_SELF']}");
					} else {
						$haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
						$sql = "UPDATE uzytkownicy SET pass = '$haslo_hash' WHERE user = '$this->login'";
						$query = $this->conn->prepare($sql);
						$query->execute();
						$_SESSION['zmiany'] = "Hasło zostało zmienionye";
						$_SESSION['haslo'] = $this->haslo = $haslo;
						header("Location: {$_SERVER['PHP_SELF']}");
						return true;
					}
				}
			} else {
				$_SESSION['e_change_haslo_haslo'] = "Złe hasło.";
				header("Location: {$_SERVER['PHP_SELF']}");
			}
		} else {
			return false;
		}
	}
	public function delUser() {}
	/**
	 * @return mixed
	 */
	protected function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	protected function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	protected function getLogin() {
		return $this->login;
	}

	/**
	 * @param mixed $login
	 */
	protected function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * @return mixed
	 */
	protected function getPass() {
		return $this->pass;
	}

	/**
	 * @param mixed $pass
	 */
	protected function setPass($pass) {
		$this->pass = $pass;
	}

	/**
	 * @return mixed
	 */
	protected function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	protected function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	protected function getAccess() {
		return $this->access;
	}

	/**
	 * @param mixed $access
	 */
	protected function setAccess($access) {
		$this->access = $access;
	}

	/**
	 * @return mixed
	 */
	protected function getLoged() {
		return $this->loged;
	}

	/**
	 * @param mixed $loged
	 */
	protected function setLoged($loged) {
		$this->loged = $loged;
	}

}

