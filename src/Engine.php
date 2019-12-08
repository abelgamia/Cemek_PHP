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
		$loged = FALSE;
		$int = 3600*24*30;
		
		// kuki spraw czy zarejestrowany lub odwiedziny kolejna i sesja
		// self::kuki();
// 		if (!$_COOKIE) {
			
// 		}
		if (!isset($_COOKIE[$name])) {
			if (empty($_SESSION)) {
				session_name($name);
				session_start();
				$sesid = session_id();
			}
			setcookie($name, $sesid,  $loged, time()+$int);
		} else {
			
		}
		
		// kuki
		// kuki
		
		$engine = new View();
		echo $engine -> showDach();
		// 
		echo $engine -> showStopka();
	}
	public function kuki() {}
}

