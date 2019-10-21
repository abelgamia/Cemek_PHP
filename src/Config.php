<?php

namespace src;

/**
 *
 * @author Edi
 *        
 */
class Config {
	static $db = array(
			'db_driver'    => 'mysql',
			'db_host'      => 'localhost',
			'db_name'      => 'cemek',
			'db_user_name' => 'root',
			'db_user_pass' => '',
			'db_port'      => '3306'
	);
	static $view = array(
		'logo' => 'Cemek',
		'stopka' => 'Cemek',
		'style' => array(
				'css/zero.css',
				'css/style.css',
				'css/types.css',
				'css/front.css',
				'css/form.css'
		),
		'skrypty' => array(
				'js/main.js',
				'js/zegar.js'
		),
		'linki' => array(
				array (
						'Alfa',
						'alfa',
						'index.php?menu=1'
				),
				array (
						'Bravo',
						'bravo',
						'index.php?menu=2'
				),
				array (
						'Certo',
						'certo',
						'index.php?menu=3'
				),
				array (
						'Delta',
						'delta',
						'index.php?menu=4'
				),
				array (
						'Echo',
						'echo',
						'index.php?menu=5'
				)
		)
	);
}

