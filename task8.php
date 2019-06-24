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
    public $step1;
    public $step2;
    public $step3;
    public $step4;
    public $step5;
    public $step6;

    function __construct($step1, $step2, $step3, $step4, $step5, $step6)
    {
        $this->step1;
        $this->step2;
        $this->step3;
        $this->step4;
        $this->step5;
        $this->step6;
    }

    public function takeBlank($step1)
    {

    }
}
