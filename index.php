<?php
use src\Engine;

spl_autoload_register(function ($class) {
	include $class .'.php';
});

$index = new Engine();

