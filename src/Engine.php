<?php

namespace src;

/**
 *
 * @author Edi @ Abelg
 *        
 */
class Engine {
	public function __construct() {
		
		$name = "private";
		$sesid;
		$time = 3600*24*30;
		
		// kuki
		// kuki
		
		$engine = new View();
		echo $engine -> showDach();
		// 
		echo $engine -> showStopka();
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

