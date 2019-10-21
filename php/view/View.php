<?php

namespace php\view;

use php\util\Util;

/**
 *
 * @author Edi
 *        
 */
class View {
	private $logo = 'Cemek';
	private $skrypty = array (
			'js/main.js',
			'js/zegar.js'
	);
	private $style = array (
			'css/zero.css',
			'css/style.css',
			'css/types.css',
			'css/front.css',
			'css/form.css'
	);
	private $linki = array (
			array (
					'Alfa',
					'alfa',
					'alfa.php'
			),
			array (
					'Bravo',
					'bravo',
					'bravo.php'
			),
			array (
					'Certo',
					'certo',
					'certo.php'
			),
			array (
					'Delta',
					'delta',
					'delta.php'
			),
			array (
					'Echo',
					'echo',
					'echo.php'
			)
	);
	private $stopka = "Cemek";
	//-----------------------------------------
	public function showTop() {
		echo "<!DOCTYPE html>";
		echo "<html lang='pl' dir='ltr'>";
		echo "<head>";
		echo "<meta charset='utf-8'>";
		echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
		echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
		echo "<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'>";
		echo "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>";
		$this->showSkrypty($this->skrypty);
		$this->showStyle($this->style);
		echo "<title>";
		echo Util::self();
		echo "</title>";
		echo "</head>";
		echo "<body>";
		echo "<div class='zero' id=''>";
	}
	public function showSkrypty($skrypty) {
		foreach($this->skrypty as $skrypt) {
			echo "<script src='";
			echo $skrypt;
			echo "'></script>";
		}
	}
	public function showStyle($style) {
		foreach($this->style as $styl) {
			echo "<link href='";
			echo $styl;
			echo "' rel='stylesheet'>";
		}
		echo "<link href='css/locales/";
		echo Util::self();
		echo ".css' rel='stylesheet'>";
	}
	//-----------------------------------------
	public function showDach() {
		echo "<header class='dach' id=''>";
		$this->showLewy();
		$this->showCenter($this->logo);
		$this->showPrawy();
		$this->showLinki($this->linki);
		echo "</header>";
		echo "<div class='front' id=''>";
	}
	public function showLewy() {
		echo "<div class='lewy' id=''>";
		echo "<div id='data'></div>";
		echo "<div id='czas'></div>";
		echo "</div>";
	}
	public function showCenter($logo) {
		echo "<div class='center' id=''>";
		echo "<a href='index.php' class='logo' id=''>";
		echo $logo;
		echo "</a>";
		echo "</div>";
	}
	public function showPrawy() {
		echo "<div class='prawy' id=''>";
		echo "prawy";
		echo "</div>";
	}
	public function showLinki($linki) {
		echo "<nav class='linki' id=''>";
		echo "<ul>";
		foreach ($linki as $n => list($nazwa, $klasa, $url)) {
			?>
			<li><a href='<?= $url; ?>' class='<?= $klasa; ?>' id=''><?= $nazwa; ?></a></li>
			<?php
		}
		echo "</ul>";
		echo "</nav>";
	}
	//-----------------------------------------
// 	public function showFront() {
// 		echo "<div class='front' id=''>";
// 		echo "Front";
// 		echo "</div>";
// 	}
	//-----------------------------------------
	public function showEnd() {
		echo "</div>";
		$this->showStopka($this->stopka);
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}
	public function showStopka($stopka) {
		echo "<footer class='stopka' id=''>";
		echo "<a href='index.php' class='stopka_logo' id=''>";
		echo $stopka;
		echo "&copy;";
		echo "</a>";
		echo "</footer>";
	}
}
