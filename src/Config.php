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
						'?linki=2'
				),
				array (
						'Bravo',
						'bravo',
						'?linki=3'
				),
				array (
						'Certo',
						'certo',
						'?linki=4'
				),
				array (
						'Delta',
						'delta',
						'?linki=5'
				),
				array (
						'Echo',
						'echo',
						'?linki=6'
				)
		)
	);
	/**
	 * @return multitype:string 
	 */
	public static function getDb() {
		return Config::$db;
	}

	/**
	 * @param multitype:string  $db
	 */
	public static function setDb($db) {
		Config::$db = $db;
	}

	/**
	 * @return multitype:string multitype:string  multitype:multitype:string   
	 */
	public static function getView() {
		return Config::$view;
	}

	/**
	 * @param multitype:string multitype:string  multitype:multitype:string    $view
	 */
	public static function setView($view) {
		Config::$view = $view;
	}

}

