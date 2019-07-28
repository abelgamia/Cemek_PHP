<?php

namespace php\control;

use php\View;
use php\model\User;

/**
 *
 * @author Edi
 *        
 */
class Control_1
{
	function __construct()
	{
		$view = new User();
		$view->logIn("ala" ,"ola");
		View::showTop();
		View::showLinki(View::$linki);
		View::showMainFullTop();
		View::showMainArtykulTop();
		include 'server_identy.php';
		View::showMainArtykulEnd();
		View::showMainFullEnd();
		View::showEnd();;
	}
}

