<?php

namespace src;

/**
 *
 * @author Edikowy
 * @author Abelg
 *        
 */
class Engine {
    private $ses_name;
    private $ses_id;
    private $kuki_name;
    private $kuki_value;
    private $kuki_exp = 3600*24*30;
    public function __construct() {}
	public function startSession($ses_name, $ses_id) {
	    {
	        if (!empty($_SESSION)) {
	            session_write_close();
	        }
	        session_name($ses_name);
	        session_id($ses_id);
	        session_start();
	    }
	    return TRUE;
	}
	public function start() {
	    $control = new Control();
	    // ----------------------------------
	    // 		$model = new User();
	    // ----------------------------------
	    $view = new View();
	    echo $view -> showDach();
	    echo 'lorem ipsum';
	    echo $view -> showStopka();
	}
	public function doHedera($url) {
	    header("location: " . $url);
	}
	public function checkKuki($kuki_name) {
	        return ((!$_COOKIE) || (!isset($_COOKIE[$kuki_name])));
	}
	public function getKuki($kuki_name) {
	    if (isset($_COOKIE[$kuki_name])) {
// 	        $kuki_value = $_COOKIE[$kuki_name];
	        return $_COOKIE[$kuki_name];
	    } else {
	        return FALSE;
	    }
	}
	public function setKuki($kuki_name, $kuki_value, $kuki_exp) {
	    setcookie($kuki_name, $kuki_value, time()+$kuki_exp);
	    return TRUE;
	}
    /**
     * @return mixed
     */
    public function getSes_name()
    {
        return $this->ses_name;
    }

    /**
     * @return mixed
     */
    public function getSes_id()
    {
        return $this->ses_id;
    }

    /**
     * @return mixed
     */
    public function getKuki_name()
    {
        return $this->kuki_name;
    }

    /**
     * @return mixed
     */
    public function getKuki_value()
    {
        return $this->kuki_value;
    }

    /**
     * @return number
     */
    public function getKuki_exp()
    {
        return $this->kuki_exp;
    }

    /**
     * @param mixed $ses_name
     */
    public function setSes_name($ses_name)
    {
        $this->ses_name = $ses_name;
    }

    /**
     * @param mixed $ses_id
     */
    public function setSes_id($ses_id)
    {
        $this->ses_id = $ses_id;
    }

    /**
     * @param mixed $kuki_name
     */
    public function setKuki_name($kuki_name)
    {
        $this->kuki_name = $kuki_name;
    }

    /**
     * @param mixed $kuki_value
     */
    public function setKuki_value($kuki_value)
    {
        $this->kuki_value = $kuki_value;
    }

    /**
     * @param number $kuki_exp
     */
    public function setKuki_exp($kuki_exp)
    {
        $this->kuki_exp = $kuki_exp;
    }

}

