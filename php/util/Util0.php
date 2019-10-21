<?php
namespace php\util;

/**
 *
 * @author Edi
 *
 */
class Util {
	public static function self() {
		$lokal = $_SERVER['PHP_SELF'];
		$wyraz = array('/Cemek/', '.php');
		$self = str_replace($wyraz, '', $lokal);
		return $self;
	}
}
