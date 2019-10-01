<?php
require_once 'Car.php';

class Bmw extends Car
{
    public static $DOOR_IS_OPEN = true;
    public $brand = 'BWM';

    public function __construct($speed = 20)
    {
        $this->test();
    }

    public function test()
    {
        $this->self = self::DOOR_IS_OPEN;
        $this->static = static::DOOR_IS_OPEN;
    }

    public function move()
    {
        $this->temp += 5;

    }
}