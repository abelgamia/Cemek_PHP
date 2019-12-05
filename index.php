<?php
use src\Engine;
/**
 *
 * @author Edi
 *
 */
spl_autoload_register(function ($class) {
	include $class .'.php';
});

$index = new Engine();

