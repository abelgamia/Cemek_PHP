<?php
namespace php\model;

use PDO;
use php\Model;
use function php\model\User\setHaslo;
use function php\model\User\setLogin;

/**
 *
 * @author Edi
 *        
 */
class User extends Model
{
    private $id;
    private $login;
    private $haslo;
    private $email;
    private $access;
    private $loged;
    
    function __construct() {
        parent::__construct();
        if (!empty($_SESSION[login]) && !empty($_SESSION[haslo])) {
            addslashes($_SESSION['login']);
            setLogin($_SESSION['login']);
            addslashes($_SESSION['haslo']);
            setHaslo($_SESSION['haslo']);
            $sql = "SELECT * FROM uzytkownicy WHERE user = 'getLogin()'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!empty($result)){
                if (password_verify(getHaslo(), $result['pass'])) {
                    setId($result['id']);
                    $_SESSION['id'] = getId();
                    setEmail($result['email']);
                    $_SESSION['email'] = getEmail();
                    setAccess($result['access']);
                    $_SESSION['access'] = getAccess();
                    setLoged(TRUE);
                    $_SESSION['loged'] = TRUE;
                }
            }
        }
    }
    
    private function logIn($login, $haslo)
    {
        
    }
    
    private function logOut()
    {
        
    }
    
    private function register($new_login ,$new_email ,$new_haslo ,$new_haslo2 ,$regulamin)
    {
        
    }
    
    private function chengeEmail($new_email, $haslo, $potwierdz)
    {
        
    }
    
    private function chengeHaslo($old_haslo, $new_haslo ,$new_haslo2 ,$potwierdz)
    {
        
    }
    
    private function delUser()
    {
        
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * @param mixed $haslo
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param mixed $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

    /**
     * @return boolean
     */
    public function getLoged()
    {
        return $this->loged;
    }

    /**
     * @param boolean $loged
     */
    public function setLoged($loged)
    {
        $this->loged = $loged;
    }
    
}

