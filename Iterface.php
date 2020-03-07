<?php
class Vehicle
{
   public $wheel = 4;


}


interface Driver {

    public function drive();
    public function fix(Vehicle $vehicle);
}

interface Pilot{

    public function fly();
    public function company();

}

interface CaptainOfTheShip {

    public function drive();
    public function aqua();

}


abstract class DriverShip implements CaptainOfTheShip {

    protected $ship;


    public function drive() {
        echo "Я хожу по воде на своем любимом ".$this->ship . "<br>";
    }

    abstract public function aqua();


}

class Lainer extends DriverShip {

    public $ship = "Лайнер";

    public function drive()
    {
        parent::drive();
        $this->aqua();
    }

    public function aqua() {
     echo "Не страшны мне шторма!". "<br>";
    }
}

abstract class Pilots implements Pilot {

    protected $height;

    public function fly() {
       echo "Полет нормальный максимальная высота " .$this->height. " метров!";
    }
    abstract public function company();

}

class PilotPas extends Pilots {

    protected $height = 10000;




    public function company() {
        echo "Скажи по секрету компания наша ПОБЕДА!";
    }
}


abstract class DriverPublicVehicle implements Driver {

    protected $maxPeople;

    public function drive()
    {
        echo "Я везу максимум " . $this->maxPeople . " человек<br>";
    }
    public function fix(Vehicle $vehicle)
    {
        $this->sendToRepairStation($vehicle);
    }

    abstract public  function sendToRepairStation();

    abstract protected function angryDriver();
}


class DriverBus extends DriverPublicVehicle {

    private $name = "Я водитель автобуса";
    protected $maxPeople = 50;

    public function drive()
    {  parent::drive();
       echo "Еду только по маршруту!!";
    }
    public function fix(Vehicle $vehicle)
    {
        $this->sendToRepairStation($vehicle);
    }

    public function sendToRepairStation() {
        echo "Отправлю машинку на ремонт в сервис!". "<br>";
    }

    public function talk() {
        $this->angryDriver();
    }

    protected function angryDriver()
    {
        echo "Не сметь разговарить с водителем!".$this->name. "<br>";
    }
}


class DriverTrollbus extends DriverPublicVehicle {

    private $name = "Я водитель лимузина, ну почти";
    protected $maxPeople = 60;

    public function drive()
    {   parent::drive();
        echo "Еду только по маршруту!!";

    }
    public function fix(Vehicle $vehicle)
    {
        $this->sendToRepairStation($vehicle);
    }

    public function sendToRepairStation() {
        echo "Отправлю машинку на ремонт в сервис!";
    }

    protected function angryDriver()
    {
        echo "Не сметь разговарить с водителем!".$this->name;
    }
}


$obj = new DriverBus;
$obj->talk();

$obj1 = new Lainer();
$obj1->drive();


$obj3 = new PilotPas();
$obj3->fly();
?>