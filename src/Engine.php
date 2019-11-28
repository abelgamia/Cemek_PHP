<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class Engine {
	public function __construct() {
		$engine = new View();
		echo $engine -> showDach();
		// 
		echo $engine -> showStopka();
	}
}

