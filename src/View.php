<?php

namespace src;

/**
 *
 * @author Edikowy
 *        
 */
class View {
	/**
	 * @return string
	 * zwraca dach
	 */
	public function showDach() {
		{
			$dach = "";
			$dach .= "<!DOCTYPE html>\n";
			$dach .= "<html lang='pl' dir='ltr'>\n";
			$dach .= "<head>\n";
			$dach .= "<meta charset='utf-8'>\n";
			$dach .= "<meta http-equiv='X-UA-Compatible' content='IE=edge'>\n";
			$dach .= "<meta name='viewport' content='width=device-width, initial-scale=1'>\n";
			$dach .= "<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'>\n";
			$dach .= "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>\n";
			$dach .= $this->showStyle();
			$dach .= $this->showSkrypty();
			$dach .= "<title>";
			$dach .= Util::self();
			$dach .= "</title>\n";
			$dach .= "</head>\n";
			$dach .= "<body>\n";
			$dach .= "<div class='zero'>\n";
			$dach .= "<header class='dach'>\n";
			$dach .= $this->showLewy();
			$dach .= $this->showCenter();
			$dach .= $this->showPrawy();
			$dach .= $this->showLinki();
			$dach .= "</header>\n";
			$dach .= "<div class='front'>\n";
		}
		return $dach;
	}
	public function showStyle() {
		{
			$style = "";
			foreach(Config::$view['style'] as $styl) {
				$style .= "<link href='";
				$style .= $styl;
				$style .= "' rel='stylesheet'>\n";
			}
		}
		return $style;
	}
	public function showSkrypty() {
		{
			$skrypty = "";
			foreach(Config::$view['skrypty'] as $skrypt) {
				$skrypty .= "<script src='";
				$skrypty .= $skrypt;
				$skrypty .= "'></script>\n";
			}
		}
		return $skrypty;
	}
	public function showLewy() {
		{
			$lewy = "";
			$lewy .= "<div class='lewy'>\n";
			$lewy .= "<div id='data'></div>\n";
			$lewy .= "<div id='czas'></div>\n";
			$lewy .= "</div>\n";
		}
		return $lewy;
	}
	public function showCenter() {
		{
			$center = "";
			$center .= "<div class='center'>\n";
			$center .= "<a href='?linki=1' class='logo'>";
			$center .= Config::$view['logo'];
			$center .= "</a>\n";
			$center .= "</div>\n";
		}
		return $center;
	}
	public function showPrawy() {
		{
			$prawy = "";
			$prawy .= "<div class='prawy'>\n";
			$prawy .= $this->showFormLogIn();
			$prawy .= "</div>\n";
		}
		return $prawy;
	}
	public function showLinki() {
		{
			$linki = "";
			$linki .= "<nav class='linki'>\n";
			$linki .= "<ul>\n";
			foreach (Config::$view['linki'] as $n => list($nazwa, $klasa, $url)) {
				$linki .= "<li><a href='$url' class='$klasa' id=''>$nazwa</a></li>";
			}
			$linki .= "</ul>\n";
			$linki .= "</nav>\n";
		}
		return $linki;
	}
	//-----------------------------------------
	public function showStopka() {
		{
			$stopka = "";
			$stopka .= "</div>\n";
			$stopka .= "<footer class='stopka'>\n";
			$stopka .= "<a href='?dupa' class='stopka_logo'>";
			$stopka .= Config::$view['stopka'];
			$stopka .= "&copy;";
			$stopka .= "</a>";
			$stopka .= "</footer>\n";
			$stopka .= "</div>\n";
			$stopka .= "</body>\n";
			$stopka .= "</html>\n";
		}
		return $stopka;
	}
	//-----------------------------------------
	public function showFormAdmin() {
		{
			$form_admin = "";
			$form_admin .= "<form name='form_admin' method='POST' action=''>";
			$form_admin .= "</form>\n";
			$form_admin .= "";
		}
		return $form_admin;
	}
	public function showFormLogIn() {
		{
			$form_login = "";
			$form_login .= "<form name='form_login' method='POST' action=''>";
			$form_login .= "<input name='form_login[login]' type='text' value='' placeholder='Login' required>\n";
			$form_login .= "<input name='form_login[pass]' type='password' value='' placeholder='Pass' required>\n";
			$form_login .= "<input name='form_login[submit]' type='submit' value='Login' placeholder='' required>\n";
			$form_login .= "</form>\n";
		}
		return $form_login;
	}
	public function showFormRegist() {
		{
			$form_regist = "";
			$form_regist .= "<form name='form_regist' method='POST' action=''>";
			$form_regist .= "</form>\n";
			$form_regist .= "";
		}
		return $form_regist;
	}
}

