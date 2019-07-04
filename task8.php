<?php

namespace App;


interface IProduct
{
    function setState(string $state): void;
}

class Product implements IProduct
{
    protected $state;

    public function __construct()
    {
        $this->state = 'initial';
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}

class Conveyor implements \Iterator
{
    public $position;
    protected $irobot = array(
        '1', '2', '3', '4', '5', '6'
    );

    public function rewind()
    {
        $this->position = 0;  // Вызов rewind: устанавливаем итератор на начальную позицию
    }

    public function current()
    {
        return $this->irobot[$this->position]; //Вызов current: получаем текущий элемент
    }

    public function next()
    {
        ++$this->position; //Вызов next: сдвигаем итератор на один элемент вперёд
    }

    public function key()
    {
        return $this->position; //Вызов key: получаем текущую позицию
    }

    public function valid()
    {
        $isValid = isset($this->items[$this->position]);
        echo "Вызов valid: проверка корректность текущей позиции - (" . ($isValid ? 'оk' : 'fail') . ") <br />";
        return $isValid;
    }
}

class Robot extends Conveyor
{
    protected $irobot = array();
    public $position;

    public function checkRobot()
    {
        switch ($this) {
            case 1:
                return $position = 1;
            case 2:
                return $position = 2;
            case 3:
                return $position = 3;
            case 4:
                return $position = 4;
            case 5:
                return $position = 5;
            case 6:
                return $position = 6;
            default :
                echo "Nothing happens";
        }
    }
}

class Storage extends Robot
{
    public $phone;

    function getInfo()
    {
        echo $this->phone;
    }

    function addPhone()
    {
        if ($this > 6) {
            ++$this->position;
        }
    }
}

$obj = new namespace\Product('blank');


?>