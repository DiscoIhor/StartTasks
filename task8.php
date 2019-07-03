<?php

Class Product
{
    public $blanc;
    public $phone;

    function __construct($blanc, $phone)
    {
        $this->$blanc = $blanc;
        $this->$phone = $phone;
    }

    function defineProduct($blanc, $phone)
    {
        if (is_null($blanc)) {
            return "{$blanc->False}";
        }
        if (is_null($phone)) {
            return "{$phone->False}";
        }
    }
}

Class Robot
{
    public $irobot1;
    public $irobot2;
    public $irobot3;
    public $irobot4;
    public $irobot5;
    public $irobot6;

    function __construct($irobot1, $irobot2, $irobot3, $irobot4, $irobot5, $irobot6)
    {
        $this->irobot1;
        $this->irobot2;
        $this->irobot3;
        $this->irobot4;
        $this->irobot5;
        $this->irobot6;
    }

    public function takeBlank()
    {
        if ($this != null) {
            return $this;
        }
    }
}

interface Robotshelper
{
    public function checkRobot()
    {
        switch ($this) {
            case $irobot1:
                return $blanc = $this->irobot1;
            case $irobot2:
                return $blanc = $this->irobot2;
            case $irobot3:
                return $blanc = $this->irobot3;
            case $irobot4:
                return $blanc = $this->irobot4;
            case $irobot5:
                return $blanc = $this->irobot5;
            case $irobot6:
                return $blanc = $this->irobot6;
        }
    }
}

class Storage
{
    public $phone;

    function getInfo()
    {
        echo $this->phone;
    }
}

interface  Conveyor
{
    public function transportProduct()
    {

    }
}

?>