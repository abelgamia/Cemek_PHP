<?php

namespace src;

/**
 *
 * @author Edi @ Abelg
 *        
 */
class Engine {
	
	private $name = "private";
	private $sesid;
	private $time = 3600*24*30;
	
	public function __construct() {
		
		// 
		
		$engine = new View();
		echo $engine -> showDach();
		// 
		echo $engine -> showStopka();
	}
}

