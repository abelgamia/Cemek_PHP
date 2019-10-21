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
		if ($_GET) {
			$arg = (int)$_GET['menu'];
			switch ($arg) {
				case 1:
					echo '1';
					break;
				case 2:
					echo '2';
					break;
				case 3:
					echo '3';
					break;
				case 4:
					echo '4';
					break;
				case 5:
					echo '5';
					break;
			};
		}
		if ($_POST) {
			var_dump($_POST);
// 			@print_r($_POST);
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

