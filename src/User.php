<?php

namespace src;

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
	}
	public function login($login, $haslo) {}
	public function logout() {}
	public function register() {}
	public function chengeEmail() {}
	public function chengePass() {}
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

