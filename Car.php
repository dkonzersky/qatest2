<?php
require_once 'CarInterface.php';

abstract class Car implements CarInterface
{
    const STATUS_LIST=['black','red'];
    const DOOR_IS_LOCK=true;
    const DOOR_IS_OPEN=false;
    public $temp = 20;
    protected $speed = 20;
    private $kilometers = 1000;
    protected $doorLoc = false;

    public function __construct($speed = 20)
    {
        $this->speed = $speed;
        $this->closeDoor();
    }

    public function closeDoor()
    {
        $this->doorLoc = self::DOOR_IS_LOCK;
    }

    public function openDoor()
    {
        $this->doorLoc = self::DOOR_IS_OPEN;
    }

    abstract public function move();

    public function autopilot()
    {
        $this->speed = 30;
        $this->move();
        $this->kilometers += $this->speed;
    }

    public function getCurrentSpeed()
    {
        return $this->speed;
    }
}