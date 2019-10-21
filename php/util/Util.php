<?php
namespace php\util;

/**
 *
 * @author Edi
 *
 */
class Util {
	public static function self() {
		$wyraz = array('/Cemek/', '.php');
		$self = str_replace($wyraz, '', $_SERVER['PHP_SELF']);
		return $self;
	}
}
