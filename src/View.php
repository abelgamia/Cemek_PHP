<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class View {
	public function showDach() {
		echo "<!DOCTYPE html>\n";
		echo "<html lang='pl' dir='ltr'>\n";
		echo "<head>\n";
		echo "<meta charset='utf-8'>\n";
		echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>\n";
		echo "<meta name='viewport' content='width=device-width, initial-scale=1'>\n";
		echo "<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'>\n";
		echo "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>\n";
		$this->showStyle();
		$this->showSkrypty();
		echo "<title>";
		echo Util::self();
		echo "</title>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<div class='zero'>\n";
		echo "<header class='dach'>\n";
		$this->showLewy();
		$this->showCenter();
		$this->showPrawy();
		$this->showLinki();
		echo "</header>\n";
		echo "<div class='front'>\n";
	}
	public function showStyle() {
		foreach(Config::$view['style'] as $styl) {
			echo "<link href='";
			echo $styl;
			echo "' rel='stylesheet'>\n";
		}
		echo "<link href='css/locales/";
		echo Util::self();
		echo ".css' rel='stylesheet'>\n";
	}
	public function showSkrypty() {
		foreach(Config::$view['skrypty'] as $skrypt) {
			echo "<script src='";
			echo $skrypt;
			echo "'></script>\n";
		}
	}
	public function showLewy() {
		echo "<div class='lewy'>\n";
		echo "<div id='data'></div>\n";
		echo "<div id='czas'></div>\n";
		echo "</div>\n";
	}
	public function showCenter() {
		echo "<div class='center'>\n";
		echo "<a href='index.php' class='logo'>";
		echo Config::$view['logo'];
		echo "</a>\n";
		echo "</div>\n";
	}
	public function showPrawy() {
		echo "<div class='prawy'>\n";
		$this->showFormLogIn();
		echo "</div>\n";
	}
	public function showFormLogIn() {
		echo "<form name='' method='POST' action=''>";
		echo "<input name='form_login[login]' type='text' value='' placeholder='Login' required>\n";
		echo "<input name='form_login[pass]' type='password' value='' placeholder='Pass' required>\n";
		echo "<input name='form_login[submit]' type='submit' value='Login' placeholder='' required>\n";
		echo "</form>\n";
	}
	public function showLinki() {
		echo "<nav class='linki'>\n";
		echo "<ul>\n";
		foreach (Config::$view['linki'] as $n => list($nazwa, $klasa, $url)) {
			?>
			<li><a href='<?= $url; ?>' class='<?= $klasa; ?>' id=''><?= $nazwa; ?></a></li>
			<?php
		}
		echo "</ul>\n";
		echo "</nav>\n";
	}
	//-----------------------------------------
	public function showStopka() {
		echo "</div>\n";
		echo "<footer class='stopka'>\n";
		echo "<a href='index.php' class='stopka_logo'>";
		echo Config::$view['stopka'];
		echo "&copy;";
		echo "</a>";
		echo "</footer>\n";
		echo "</div>\n";
		echo "</body>\n";
		echo "</html>\n";
	}
}

