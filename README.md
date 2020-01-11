<!DOCTYPE html>
<html lang='pl' dir='ltr'>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'>
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
<link href='css/zero.css' rel='stylesheet'>
<link href='css/style.css' rel='stylesheet'>
<link href='css/types.css' rel='stylesheet'>
<link href='css/front.css' rel='stylesheet'>
<link href='css/form.css' rel='stylesheet'>
<script src='js/main.js'></script>
<script src='js/zegar.js'></script>
<title>/Cemek_PHP/index</title>
</head>
<body>
<div class='zero'>
<header class='dach'>
<div class='lewy'>
<div id='data'></div>
<div id='czas'></div>
</div>
<div class='center'>
<a href='?linki=1' class='logo'>Cemek</a>
</div>
<div class='prawy'>
<form name='form_login' method='POST' action=''><input name='form_login[login]' type='text' value='' placeholder='Login' required>
<input name='form_login[pass]' type='password' value='' placeholder='Pass' required>
<input name='form_login[submit]' type='submit' value='Login' placeholder='' required>
</form>
</div>
<nav class='linki'>
<ul>
<li><a href='?linki=2' class='alfa' id=''>Alfa</a></li><li><a href='?linki=3' class='bravo' id=''>Bravo</a></li><li><a href='?linki=4' class='certo' id=''>Certo</a></li><li><a href='?linki=5' class='delta' id=''>Delta</a></li><li><a href='?linki=6' class='echo' id=''>Echo</a></li></ul>
</nav>
</header>
<div class='front'>
Cemek_PHP


Autorski edukacyjno/eksperymentalny projekt (CMS) https://pl.wikipedia.org/wiki/System_zarz%C4%85dzania_tre%C5%9Bci%C4%85  systemu zarządzania treścią w PHP.
Zastosowanie
Jako podstawa do wszystkich zastosowań web w tym min. e-commerce.
Wymagania
PHP 5.5 (starsze wersje mogą działać niestabilnie).
Dostęp do bazy danych zgodny z PDO.

Założenia główne 
W pełni obiektowy (OOP). https://pl.wikipedia.org/wiki/Programowanie_obiektowe 
Zgodny z MVC (Model View Controler). https://pl.wikipedia.org/wiki/Model-View-Controller  
Baza danych z interfejsu PDO.
Dwuetapowa rejestracja z potwierdzaniem poprzez email.
Szyfrowanie haseł typu password_hash.
Wykorzystanie cookies. ? rodo
Responsywność.
Tematy (CSS) do wyboru.
Zmiana języka (multilanguage).
Instalacja
Licencje
</div>
<footer class='stopka'>
<a href='?dupa' class='stopka_logo'>Cemek&copy;</a></footer>
</div>
</body>
</html>
