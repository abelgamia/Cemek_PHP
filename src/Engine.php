<?php

namespace src;

/**
 *
 * @author Edikowy
 * @author Abelg
 *
 */
class Engine {
    private $ses_name = 'gosc';
    private $ses_id;
    public $kuki_exp = 30*24;


    public function startSession($ses_name, $ses_id) {
        {
            session_name($ses_name);
            session_id($ses_id);
            session_start();
        }
        return TRUE;
    }
    
    public function start() {
        //----------------------------
        if (!isset($_COOKIE[$this->getSes_name()])) {
            $this->setSes_id(session_create_id());
        } else {
            $this->setSes_id($_COOKIE[$this->getSes_name()]);
        }
        $this->startSession($this->getSes_name(), $this->getSes_id());
        $this->setKuki($this->getSes_name(), $this->getSes_id(), time() + $this->getKuki_exp());
        
        //----------------------------
        // 	    $control = new Control();
        // 	    $model = new User();
        $view = new View();
        echo $view -> showDach();
        echo 'lorem ipsum';
        echo $view -> showStopka();
    }
    
    public function __construct() {}
    public function doHedera($url) {
        header("location: " . $url);
    }
    public function getKuki($kuki_name) {
        if (isset($_COOKIE[$kuki_name])) {
            return $_COOKIE[$kuki_name];
        } else {
            return FALSE;
        }
    }
    public function setKuki($kuki_name, $kuki_value, $kuki_exp) {
        setcookie($kuki_name, $kuki_value, time()+$kuki_exp);
        return TRUE;
    }
    public function getSes_name() {
        return $this->ses_name;
    }
    public function setSes_name($ses_name) {
        $this->ses_name = $ses_name;
    }
    public function getSes_id() {
        return $this->ses_id;
    }
    public function setSes_id($ses_id) {
        $this->ses_id = $ses_id;
    }
    /**
     * @return number
     */
    public function getKuki_exp()
    {
        return $this->kuki_exp;
    }
    
    /**
     * @param number $kuki_exp
     */
    public function setKuki_exp($kuki_exp)
    {
        $this->kuki_exp = $kuki_exp;
    }
    
}

