<?php

namespace php;

/**
 *
 * @author Edi
 *        
 */
abstract class View
{
	public static $logo = 'Cemex';
	public static $skrypty = array (
			'js/main.js',
			'js/zegar.js'
	);
	public static $style = array (
			'css/main.css',
			'css/standard.css',
			'css/style.css',
			'css/zero.css',
			'css/form.css'
	);
	public static $linki = array (
			array (
					'Alfa',
					'k60',
					'alfa.php'
			),
			array (
					'Bravo',
					'k120',
					'bravo.php'
			),
			array (
					'Certo',
					'k180',
					'certo.php'
			),
			array (
					'Delta',
					'k240',
					'delta.php'
			),
			array (
					'Echo',
					'k300',
					'echo.php'
			)
	);
	
	public static $stopka = "Cemex";

	public static function showTop()
	{
		;?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"><?php
self::showSkrypty ( self::$skrypty );
self::showStyle ( self::$style );
		self::showStyleLokal ();
		self::showTytul ();
		;?></head>
<body>
	<div id="zero">
		<div id="jeden">
			<header id="dach">
				<header id="strych">;<?php
		self::showLewy ();
		self::showLogo ( self::$logo );
		self::showPrawy ();
		self::showEndHeder ();
		;?><main class="main"><?php
	}

	public static function showSkrypty($skrypty) //4  ---------------  showSkrypty
	{
		foreach ( $skrypty as $skrypt )
		{
			echo '<script src="';
			echo $skrypt;
			echo '"></script>' . "\n";
		}
	}

	public static function showStyle($style) // 5  ----------------  showStyle
	{
		foreach ( $style as $styl )
		{
			echo '<link rel="stylesheet" type="text/css" media="screen" href="';
			echo $styl;
			echo '" />' . "\n";
		}
	}

	public static function showStyleLokal() // 5  ----------------  showStyle
	{
		echo '<link rel="stylesheet" type="text/css" media="screen" href="';
		echo "css/lokal/";
		Util::self ();
		echo ".css";
		echo '" />';
	}

	public static function showTytul() // 6
	{
		echo '<title>';
		echo 'Cemek - ';
		Util::self ();
		echo '</title>' . "\n";
	}

	public static function showLewy() // 7  -----------------  showLewy
	{
		?><div id="lewy">
						<div id="data"></div>
						<div id="czas"></div>
					</div><?php
	}

	public static function showLogo($logo) // 8  -----------------  showLogo
	{
		?><div id="center">
						<a href="index.php" id="logo">
							<div id="logo_wew"><?= self::$logo; ?></div>
						</a>
					</div><?php
	}

	public static function showPrawy() // 9  -----------------  showPrawy
	{
		?><div id="prawy"></div><?php
	}

	public static function showEndHeder()
	{
		?>
				
				</header>
			</header><?php
	}

	// showLinki  ===========================  showLinki  10  =============
	public static function showLinki($linki)
	{
		?><nav id="linki">
      <?php foreach (self::$linki as $n => list($nazwa, $klasa, $url)): ?>
        <a href="<?= $url; ?>" class="<?= $klasa; ?>"><div><?= $nazwa; ?></div></a>
      <?php endforeach; ?>
    </nav><?php
	}

	public static function showBelka($b_tytul)
	{
		?><div class="belka"><?= $b_tytul; ?></div><?php
	}

	public static function showKartaTop()
	{
		?><div class="karta"><?php
	}

	public static function showKartaEnd()
	{
		?></div><?php
	}

	// Main  ===========================  Main
	public static function showMainFullTop()
	{
		?><aside class="full"><?php
	}

	public static function showMainFullEnd()
	{
		?></aside><?php
	}

	// Main  ===========================  Main
	public static function showMainSpisTop()
	{
		?><aside class="spis"><?php
	}

	public static function showMainSpisEnd()
	{
		?></aside><?php
	}

	// Main  ===========================  Main
	public static function showMainArtykulTop()
	{
		?><article class="artykul"><?php
	}

	public static function showMainArtykulEnd()
	{
		?></article><?php
	}

	// Main  ===========================  Main
	public static function showMainSekcjaTop()
	{
		?><section class="sekcja"><?php
	}

	public static function showMainSekcjaEnd()
	{
		;?></section><?php
	}

	public static function showEnd()
	{
		;?></main>
			<footer id="stopka">
				<a href="index.php" id="stopka_logo">
					<div><?= self::$stopka; ?></div>
				</a>
			</footer>

		</div>
	</div>
</body>
</html><?php
	}
}

