<?php

namespace src;

/**
 *
 * @author Edi @ Abelg
 *        
 */
class Engine {
	
// 	private $name = "private";
// 	private $sesid;
// 	private $time = 3600*24*30;
	
	public function __construct() {
		// ----------------------------------
		$control = new Control();
		// ----------------------------------
		$model = new User();
		// ----------------------------------
		$view = new View();
		echo $view -> showDach();
		// 
		echo $view -> showStopka();
		// ----------------------------------
	}
}

