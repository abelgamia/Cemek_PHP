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
}

