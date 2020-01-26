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
    public function startsSession() {
        {
            $this->startSession(null, null);
        }
        //         return session_id();
    }
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
    
    public function __construct() {}
    public function start() {
        //----------------------------
        
        if (($this -> getKuki('nazwa_sesji')) && ($this -> getKuki('id_sesji')))  {
            $this->setSes_name($this -> getKuki('nazwa_sesji')) ;
            $this->setSes_id($this -> getKuki('id_sesji')) ;
            $this->startSession($this->getSes_name(), $this->getSes_id());
        } else {
            ;
        }
        //----------------------------
        // 	    $control = new Control();
        // 	    $model = new User();
        $view = new View();
        echo $view -> showDach();
        echo 'lorem ipsum';
        echo $view -> showStopka();
    }
    public function doHedera($url) {
        header("location: " . $url);
    }
    public function checkKuki($kuki_name) {
        return !isset($_COOKIE[$kuki_name]);
    }
    public function checkKukis() {
        return !isset($_COOKIE);
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
    
}

