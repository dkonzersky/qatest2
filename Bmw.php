<?php /** @noinspection PhpMissingParentConstructorInspection */
require_once 'Car.php';

class Bmw extends Car
{
    // --Commented out by Inspection (06.10.2019 18:08):public static $DOOR_IS_OPEN = true;
    public $brand = 'BWM';
    /**
     * @var bool
     */

    /**
     * @var bool
     */
    private $self;
    private $static;

    public function __construct()
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