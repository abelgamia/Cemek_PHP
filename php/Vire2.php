<?php

namespace php;

/**
 *
 * @author Edi
 *        
 */
class Vire2
{
	public $logo = 'Cemex';
	public $skrypty = array (
			'js/main.js',
			'js/zegar.js'
	);
	public $style = array (
			'css/main.css',
			'css/standard.css',
			'css/style.css',
			'css/zero.css',
			'css/form.css'
	);
	public $linki = array (
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
	
	public $stopka = "Cemex";
	protected $top;
	protected $end;

	/**
	 */
	public function showTop()
	{
		include '$top'.php;
	}
	
	public function showEnd()
	{
		include '$end'.php;
	}
}

