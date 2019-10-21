<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class Util {
	public function __construct() {
		echo 'Util<br>';
	}
	public static function self() {
		$wyraz = array('/Cemek/', '.php');
		$self = str_replace($wyraz, '', $_SERVER['PHP_SELF']);
		return $self;
	}
}

