<?php


/**
 *
 * @author Edi
 *
 */
use src\Control;
use src\Util;
use src\View;

class Index {
	public function __construct() {
		// 		echo 'Index<br>';
		spl_autoload_register(function ($class) {
			include $class .'.php';
		});
	}
}

$index = new Index();
// $index1 = new Model();

$index4 = new View();
$index4 -> showDach();
$index2 = new Control();
$index3 = new Util();

$index4 -> showStopka();












// session_start();
// use php\view\View;
// use php\model\User;
// require 'php/rekfiry.php';
// $index = new View;
// $index->showTop();
// $index->showDach();
// $index->showEnd();
