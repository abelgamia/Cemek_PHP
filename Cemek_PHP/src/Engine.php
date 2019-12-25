<?php

namespace src;

/**
 *
 * @author Edi @ Abelg
 *        
 */
class Engine {
	
	private $ses_name;
	private $ses_id;
	private $exp = 3600*24*30;
	
	public function __construct() {
		// ----------------------------------
// 		$control = new Control();
		// ----------------------------------
// 		$model = new User();
		// ----------------------------------
		$view = new View();
		echo $view -> showDach();
		// 
		echo $view -> showStopka();
		// ----------------------------------
	}
}

