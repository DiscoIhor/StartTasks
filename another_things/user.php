<?php

class User
{
    public $name;
    public $age;
    public $city;
    protected $login;
    protected $pswrd;
    protected $pswrd2;
    //protected $rights;

    /*
    *   Constructor
    */
    function __construct($name, $age, $city, $login, $pswrd, $pswrd2)
    {
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
        $this->login = $login;
        $this->pswrd = $pswrd;
        $this->pswrd2 = $pswrd2;
        //$this->rights = $rights;

    }

    /*
    *   Return info
    */
    function getInfo()
    {
        return "{$this->name}" . "{$this->age}" . "{$this->city}"."{$this->login}"."{$this->name}"."{$this->pswrd}"."{$this->name}";
    }
}
?>

