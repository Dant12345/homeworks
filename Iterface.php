<?php

/**
 * Class Vehicle
 */
class Vehicle
{
    public $wheel = 4;
}

/**
 * Interface Driver
 */
interface Driver
{
    public function drive(): void;

    public function fix(Vehicle $vehicle): void;
}

/**
 * Interface Pilot
 */
interface Pilot
{
    public function fly(): void;

    public function company(): void;
}

/**
 * Interface CaptainOfTheShip
 */
interface CaptainOfTheShip
{
    public function drive(): void;

    public function aqua(): void;
}

/**
 * Class DriverShip
 */
abstract class DriverShip implements CaptainOfTheShip
{
    /**
     * @var string
     */
    protected $ship;

    abstract public function aqua(): void;

    public function drive(): void
    {
        echo "Я хожу по воде на своем любимом " . $this->ship . "<br>";
    }

}

/**
 * Class Lainer
 */
class Lainer extends DriverShip
{
    public $ship = "Лайнер";

    public function drive(): void
    {
        parent::drive();
        $this->aqua();
    }

    public function aqua(): void
    {
        echo "Не страшны мне шторма!" . "<br>";
    }
}

/**
 * Class Pilots
 */
abstract class Pilots implements Pilot
{
    protected $height;

    abstract public function company(): void;

    public function fly(): void
    {
        echo "Полет нормальный максимальная высота " . $this->height . " метров!";
    }
}

/**
 * Class PilotPas
 */
class PilotPas extends Pilots
{
    protected $height = 10000;

    public function company(): void
    {
        echo "Скажи по секрету компания наша ПОБЕДА!";
    }
}

/**
 * Class DriverPublicVehicle
 */
abstract class DriverPublicVehicle implements Driver
{
    protected $maxPeople;

    abstract public function sendToRepairStation();

    abstract protected function angryDriver();

    public function drive(): void
    {
        echo "Я везу максимум " . $this->maxPeople . " человек<br>";
    }

    public function fix(Vehicle $vehicle): void
    {
        $this->sendToRepairStation($vehicle);
    }
}

/**
 * Class DriverBus
 */
class DriverBus extends DriverPublicVehicle
{
    private $name = "Я водитель автобуса";
    protected $maxPeople = 50;

    public function drive(): void
    {
        parent::drive();
        echo "Еду только по маршруту!!";
    }

    public function fix(Vehicle $vehicle): void
    {
        $this->sendToRepairStation($vehicle);
    }

    public function sendToRepairStation(): void
    {
        echo "Отправлю машинку на ремонт в сервис!" . "<br>";
    }

    public function talk(): void
    {
        $this->angryDriver();
    }

    protected function angryDriver(): void
    {
        echo "Не сметь разговарить с водителем!" . $this->name . "<br>";
    }
}

/**
 * Class DriverTrollbus
 */
class DriverTrollbus extends DriverPublicVehicle
{
    private $name = "Я водитель лимузина, ну почти";
    protected $maxPeople = 60;

    public function drive(): void
    {
        parent::drive();
        echo "Еду только по маршруту!!";
    }

    public function fix(Vehicle $vehicle): void
    {
        $this->sendToRepairStation($vehicle);
    }

    public function sendToRepairStation(): void
    {
        echo "Отправлю машинку на ремонт в сервис!";
    }

    protected function angryDriver(): void
    {
        echo "Не сметь разговарить с водителем!" . $this->name;
    }
}


$obj = new DriverBus;
$obj->talk();

$obj1 = new Lainer();
$obj1->drive();


$obj3 = new PilotPas();
$obj3->fly();
