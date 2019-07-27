<?php

namespace php;

/**
 *
 * @author Edi
 *        
 */
class Util
{
	public static function self()
	{
		$self = $_SERVER['PHP_SELF'];
		$wyraz = array('/Cemek/', '.php');
		$lokal = str_replace($wyraz, '', $self);
		echo $lokal;
	}
}

