<?php

use src\Engine;

// include 'src/inkludy.php';
/**
 *
 * @author Edikowy
 *
 */
// spl_autoload_register(function ($class) {
// 	include $class .'.php';
// });
spl_autoload_extensions('.php');
spl_autoload_register('autoload');
function autoload($class) {
    set_include_path('./src/');
    spl_autoload($class);
}
// class Index {
//     function __construct() {
//         spl_autoload_extensions('.php');
//         spl_autoload_register('autoload');
        
//         new Engine();
//     }
//     function autoload($class) {
//         set_include_path('./src/');
//         spl_autoload($class);
//     }
// }
new Engine();
// new Index();


