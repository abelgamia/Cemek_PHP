<?php

use src\Engine;

// include 'src/inkludy.php';
/**
 *
 * @author Edi
 *
 */
spl_autoload_register(function ($class) {
	include $class .'.php';
});

$index = new Engine();