<?php

namespace php\model;

use PDO;
use php\Model;
use function php\model\User\setHaslo;
use function php\model\User\setLogin;

/**
 *
 * @author Edi
 *        
 */
class User extends Model
{
	private $id;
	private $login;
	private $haslo;
	private $email;
	private $access;
	private $loged;

	function __construct()
	{
		parent::__construct ();
		if (! empty ( $_SESSION [login] ) && ! empty ( $_SESSION [haslo] ))
		{
			addslashes ( $_SESSION ['login'] );
			setLogin ( $_SESSION ['login'] );
			addslashes ( $_SESSION ['haslo'] );
			setHaslo ( $_SESSION ['haslo'] );
			$sql = "SELECT * FROM uzytkownicy WHERE user = 'getLogin()'";
			$query = $this->conn->prepare ( $sql );
			$query->execute ();
			$result = $query->fetch ( PDO::FETCH_ASSOC );
			if (! empty ( $result ))
			{
				if (password_verify ( getHaslo (), $result ['pass'] ))
				{
					setId ( $result ['id'] );
					$_SESSION ['id'] = getId ();
					setEmail ( $result ['email'] );
					$_SESSION ['email'] = getEmail ();
					setAccess ( $result ['access'] );
					$_SESSION ['access'] = getAccess ();
					setLoged ( TRUE );
					$_SESSION ['loged'] = TRUE;
				}
			}
		}
	}

	/**
	 *
	 * @param string $login
	 * @param string $haslo
	 * @return boolean
	 */
	private function logIn($login, $haslo)
	{
		$_SESSION ['login'] = addslashes ( $login );
		setLogin ( $_SESSION ['login'] );
		$_SESSION ['haslo'] = addslashes ( $haslo );
		setHaslo ( $_SESSION ['haslo'] );
		$sql = "SELECT * FROM uzytkownicy WHERE user = 'getLogin()'";
		$query = $this->conn->prepare ( $sql );
		$query->bindValue ( 'user', getLogin () );
		$query->execute ();
		$result = $query->fetch ( PDO::FETCH_ASSOC );
		if (! empty ( $result ))
		{
			if (password_verify ( getHaslo (), $result ['pass'] ))
			{
				setId ( $result ['id'] );
				$_SESSION ['id'] = getId ();
				setEmail ( $result ['email'] );
				$_SESSION ['email'] = getEmail ();
				setAccess ( $result ['access'] );
				$_SESSION ['access'] = getAccess ();
				setLoged ( TRUE );
				$_SESSION ['loged'] = TRUE;
				return TRUE;
			}
			else
			{
				$_SESSION ['blad_haslo'] = 'Złe haslo';
				unset ( $_SESSION ['haslo'] );
				unset ( $_SESSION ['login'] );
				return false;
			}
		}
		else
		{
			$_SESSION ['blad_login'] = 'Zły login';
			unset ( $_SESSION ['login'] );
			unset ( $_SESSION ['haslo'] );
			return false;
		}
		header ( "Location: {$_SERVER['PHP_SELF']}" );
		$this->conn = null;
	}

	private function logOut()
	{
		if (getLoged ())
		{
			setLoged ( FALSE );
			setId ( 0 );
			setAccess ( 0 );
			session_destroy ();
			header ( "Location: {$_SERVER['PHP_SELF']}" );
			return true;
		}
		else
		{
			return false;
		}
	}

	private function register($new_login, $new_email, $new_haslo, $new_haslo2, $regulamin)
	{
		$login = addslashes ( $new_login );
		$email = addslashes ( $new_email );
		$haslo = addslashes ( $new_haslo );
		$haslo2 = addslashes ( $new_haslo2 );
		$wszystko_OK = true;
		// -------------------------------------
		if ((strlen ( $login ) < 3) || (strlen ( $login ) > 20)) // jeżeli nick krótszy niż 3 lub dłuższy niż 20 to
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_login'] = "Nick musi posiadać od 3 do 20 znaków!"; // ustawienie zmiennej e_nick na tekst błędu
		}

		if (ctype_alnum ( $login ) == false) // jeżeli nick posiada inne znaki niż alfa to
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_login'] = "Nick musi składać się z znaków alfanumerycznych"; // ustawienie zmiennej e_nick na tekst błędu
		}
		// -------------------------------------
		$emailB = filter_var ( $email, FILTER_SANITIZE_EMAIL ); // do zmiennej $emailB ladujemy $email ale bez niedozwolonych znaków

		if ((filter_var ( $emailB, FILTER_VALIDATE_EMAIL ) == false) || ($emailB != $email)) // jeżeli zmienna $emailB po walidacji daje false lub zmienna
		{ //  $emailB jest różna od zmiennej $email to
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_email'] = "Podaj poprawny adres e-mail!"; // ustawienie zmiennej e_email na tekst błędu
		}
		// -------------------------------------
		if ((strlen ( $haslo ) < 6) || (strlen ( $haslo2 ) > 20)) // jeżeli $haslo1 krótsze niż 6 lub dłuższy niż 20 to
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_haslo'] = "Hasło musi składać się od 6 do 20 znaków."; // ustawienie zmiennej e_haslo na tekst błędu
		}
		if ($haslo != $haslo2) // jeżeli $haslo1 krótsze niż 6 lub dłuższy niż 20 to
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_haslo'] = "Hasła nie są identyczne."; // ustawienie zmiennej e_haslo na tekst błędu
		}

		$haslo_hash = password_hash ( $haslo, PASSWORD_DEFAULT ); // do zmiennej $haslo_hash ładujemy wynik hashowania $haslo1
		// -------------------------------------
		// akceptacja regulaminu
		if (! isset ( $regulamin ))
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_regulamin'] = "Zaakceptuj regulamin."; // ustawienie zmiennej e_regulamin na tekst błędu
		}
		// -------------------------------------
		// $sql = "SELECT * FROM uzytkownicy WHERE email = '$_SESSION['new_email']'";
		$sql = "SELECT email FROM uzytkownicy WHERE email = '$email'";
		$query = $this->conn->prepare ( $sql );
		$query->bindValue ( 'email', $email );
		$query->execute ();
		$result = $query->fetch ( PDO::FETCH_ASSOC );
		if (! empty ( $result ))
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!"; // ustawienie zmiennej e_email na tekst błędu
		}
		// -------------------------------------
		$sql = "SELECT user FROM uzytkownicy WHERE user = '$login'";
		$query = $this->conn->prepare ( $sql );
		$query->bindValue ( 'user', $login );
		$query->execute ();
		$result = $query->fetch ( PDO::FETCH_ASSOC );
		if (! empty ( $result ))
		{
			$wszystko_OK = false; // ustawienie flagi udanej walidacji na false
			$_SESSION ['e_login'] = "Istnieje już gracz o takim nicku! Wybierz inny."; // ustawienie zmiennej e_nick na tekst błędu
		}
		// -------------------------------------
		if ($wszystko_OK == true) // jeżeli flaga $wszystko_OK jest true to
		{
			$sql = "INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email', '1', '')";
			$query = $this->conn->prepare ( $sql );
			$query->execute ();
			$_SESSION ['udanarejestracja'] = true; // ustaw zmienną udana rejestracja na true
			header ( "Location: {$_SERVER['PHP_SELF']}" );
		}
		$this->conn = null;
	}

	private function chengeEmail($new_email, $haslo, $potwierdz)
	{
		if ($this->czy_zalogowany == true)
		{
			$email = addslashes ( $new_email );
			// -------------------------------------
			$emailB = filter_var ( $email, FILTER_SANITIZE_EMAIL ); // do zmiennej $emailB ladujemy $email ale bez niedozwolonych znaków

			if ((filter_var ( $emailB, FILTER_VALIDATE_EMAIL ) == false) || ($emailB != $email)) // jeżeli zmienna $emailB po walidacji daje false lub zmienna
			{
				$_SESSION ['e_change_email'] = "Podaj poprawny adres e-mail!"; // ustawienie zmiennej e_email na tekst błędu
				header ( "Location: {$_SERVER['PHP_SELF']}" );
			}
			else
			{
				$sql = "SELECT email FROM uzytkownicy WHERE email = '$email'";
				$query = $this->conn->prepare ( $sql );
				$query->bindValue ( 'email', $email );
				$query->execute ();
				$result = $query->fetch ( PDO::FETCH_ASSOC );
				if (! empty ( $result ))
				{
					$_SESSION ['e_change_email'] = "Istnieje już konto przypisane do tego adresu e-mail!"; // ustawienie zmiennej e_email na tekst błędu
					header ( "Location: {$_SERVER['PHP_SELF']}" );
				}
				else
				{
					if (! isset ( $potwierdz ))
					{ // ustawienie flagi udanej walidacji na false
						$_SESSION ['e_potwierdz'] = "Zaakceptuj potwierdz."; // ustawienie zmiennej e_regulamin na tekst błędu
						header ( "Location: {$_SERVER['PHP_SELF']}" );
						return false;
					}
					else
					{
						if ($this->haslo == $haslo)
						{
							$sql = "UPDATE uzytkownicy SET email = '$email' WHERE user = 'getLogin()'";
							$query = $this->conn->prepare ( $sql );
							$query->bindValue ( 'user', getLogin () );
							$query->execute ();
							$_SESSION ['zmiany'] = "Email został zmieniony na " . $email;
							header ( "Location: {$_SERVER['PHP_SELF']}" );
							return true;
						}
						$_SESSION ['e_change_email_haslo'] = "Nieprawidłowe hasło";
						header ( "Location: {$_SERVER['PHP_SELF']}" );
					}
				}
			}
		}
		else
		{
			return false;
		}
	}

	private function chengeHaslo($old_haslo, $new_haslo, $new_haslo2, $potwierdz)
	{
		if ($this->czy_zalogowany == true)
		{
			if ($this->haslo == $old_haslo)
			{
				$haslo = addslashes ( $new_haslo );
				$haslo2 = addslashes ( $new_haslo2 );
				if ((strlen ( $haslo ) < 6) || (strlen ( $haslo2 ) > 20)) // jeżeli $haslo1 krótsze niż 6 lub dłuższy niż 20 to
				{
					$_SESSION ['e_change_haslo'] = "Hasło musi składać się od 6 do 20 znaków."; // ustawienie zmiennej e_haslo na tekst błędu
					header ( "Location: {$_SERVER['PHP_SELF']}" );
				}
				else
				{
					if ($new_haslo != $new_haslo2)
					{ // ustawienie flagi udanej walidacji na false
						$_SESSION ['e_change_haslo2'] = "Hasła nie są identyczne."; // ustawienie zmiennej e_regulamin na tekst błędu
						header ( "Location: {$_SERVER['PHP_SELF']}" );
					}
					else
					{
						$haslo_hash = password_hash ( $haslo, PASSWORD_DEFAULT ); // do zmiennej $haslo_hash ładujemy wynik hashowania $haslo1
						$sql = "UPDATE uzytkownicy SET pass = '$haslo_hash' WHERE user = '$this->login'";
						$query = $this->conn->prepare ( $sql );
						$query->execute ();
						$_SESSION ['zmiany'] = "Hasło zostało zmienionye";
						$_SESSION ['haslo'] = $this->haslo = $haslo;
						header ( "Location: {$_SERVER['PHP_SELF']}" );
						return true;
					}
				}
			}
			else
			{
				$_SESSION ['e_change_haslo_haslo'] = "Złe hasło.";
				header ( "Location: {$_SERVER['PHP_SELF']}" );
			}
		}
		else
		{
			return false;
		}
	}

	private function delUser()
	{
	}

	/**
	 *
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 *
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 *
	 * @param mixed $login
	 */
	public function setLogin($login)
	{
		$this->login = $login;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getHaslo()
	{
		return $this->haslo;
	}

	/**
	 *
	 * @param mixed $haslo
	 */
	public function setHaslo($haslo)
	{
		$this->haslo = $haslo;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 *
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getAccess()
	{
		return $this->access;
	}

	/**
	 *
	 * @param mixed $access
	 */
	private function setAccess($access)
	{
		$this->access = $access;
	}

	/**
	 *
	 * @return boolean
	 */
	public function getLoged()
	{
		return $this->loged;
	}

	/**
	 *
	 * @param boolean $loged
	 */
	public function setLoged($loged)
	{
		$this->loged = $loged;
	}
}

