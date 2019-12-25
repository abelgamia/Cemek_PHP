<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class Control {
	public function __construct() {}
	public function doHedera($url) {
		header("location: " . $url);
	}
	public function checkKuki($name) {
		if ((!$_COOKIE) || (!isset($_COOKIE[$name]))) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function getKuki($name) {
		if (isset($_COOKIE[$name])) {
			$value = $_COOKIE[$name];
			return $value;
		} else {
			return FALSE;
		}
	}
	public function setKuki($name, $value, $time) {
		setcookie($name, $value, time()+$time);
		return TRUE;
	}
	public function startSession($name, $sesid) {
		{
			if (!empty($_SESSION)) {
				session_write_close();
			}
			session_name($name);
			session_id($sesid);
			session_start();
		}
		return TRUE;
	}
}

