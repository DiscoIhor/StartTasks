<?php

namespace Site0;

abstract class Conveyer
{
    abstract public function takeNewBlanc($product);

    abstract public function pressBlanc($product);

    abstract public function drillBlanc($product);

    abstract public function polishingBlanc($product);

    abstract public function paintingBlanc($product);

    abstract public function movetostorageBlanc($product);
}

class Robot
    extends Conveyer
{
    protected $state;

    public function __construct()
    {
        $this->state = 'initial';

    }

    public function takeNewBlanc($product)
    {
        $this->state = 1;
    }
    public function pressBlanc($product)
    {
        $this->state = 2;
        echo 'Product is pressed';
        echo "<br>";
    }
    public function drillBlanc($product)
    {
        $this->state = 3;
        echo 'Product drilled';
        echo "<br>";
    }
    public function polishingBlanc($product)
    {
        $this->state = 4;
        echo 'Product is polished';
        echo "<br>";
    }
    public function paintingBlanc($product)
    {
        $this->state = 5;
        echo 'Product painted';
        echo "<br>";
    }
    public function movetostorageBlanc($product)
    {
        $this->state = 'Phone';
    }
}

class Product
{
    public $blanc;

    public function __construct()
    {
        $this->blanc='blanc';
    }
}


class Storage
{
    public $numberofproducts;

    public function __construct()
    {
        $this->numberofproducts=$this;
    }

    function getInfo()
    {
        return $this;
    }
}

$prod= new Product ('blanc');
$obj = new Robot();
$obj->takeNewBlanc($prod);
$obj->pressBlanc($prod);
$obj->drillBlanc($prod);
$obj->polishingBlanc($prod);
$obj->paintingBlanc($prod);
$obj->movetostorageBlanc($prod);
