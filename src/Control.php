<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class Control {
	public function __construct() {
// 		echo "Control<br>";
		
		if (isset($_POST)) {
// 			var_dump($_POST);
// 			print_r($_POST);
			unset($_POST);
// 			unset($_POST["haslo"]);
// 			unset($_POST["zaloguj"]);
// 			@print_r($_POST);
		}
// 		print_r($_POST);
// 		var_dump($_POST);
// 		echo "Control<br>";
	}
}

