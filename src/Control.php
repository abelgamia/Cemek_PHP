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
	public function checkKukis() {
		if (!$_COOKIE) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function getKuki($name) {
		if (!isset($_COOKIE[$name])) {
			return FALSE;
		} else {
			$value = $_COOKIE[$name];
			return $value;
		}
	}
	public function setKuki($name, $sesid, $time) {
		setcookie($name, $sesid, time()+$time);
	}
	public function startSession($name) {
		{
			if (!empty($_SESSION)) {
				session_write_close();
			}
			session_name($name);
			session_start();
			$sesid = session_id();
		}
		return $sesid;
	}
}

