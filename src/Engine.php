<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class Engine {
	public function __construct() {
		spl_autoload_register(function ($class) {
			include $class .'.php';
		});

		$engine = new View();
		echo $engine -> showDach();
		
// 		if ($_COOKIE) {}
		
// 		if (isset($_SESSION)) {}
		
		
		
		echo $engine -> showStopka();
	}
}

