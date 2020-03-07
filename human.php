<?php
abstract class Human {


    public $growth;
    public $age;
    public  $weight;

    private $temperament = "sanguine";
    private $abilities = "smarty";

    public function __construct($aGrowth, $anAge, $aWeight)
    {
        $this->growth = $aGrowth;
        $this->age = $anAge;
        $this->weight = $aWeight;
    }

    public function say() {
        echo "Привет чувааак, по темпераменту я -" .$this->temperament.", мой рост ".$this->growth."см, мой вес: ".
            $this->weight. "кг, мой возраст: " .$this->age . "лет>";
        $this->line();


    }

    protected function think() {
        echo "Думаю, значит существую!Но это не точно!" . "<br>";
    }

    protected function line() {
        echo "<hr>";
    }

}

class SmartyHuman extends Human {

    private $iq = 200;



    public function say() {

        echo  "Я умный человек мой IQ равен : " . $this->iq . "<br>";
        parent::say();
    }


}

abstract class SillyHuman extends Human
{
    public function think() {
        echo "Я метод абстрактного класса меня смогут заюзать только потомки!!!<br>";
    }


}

class Noabstract extends SillyHuman {

    public function say()
    {
        $this->think();
        parent::line();
    }
}

class RapidMan extends Human {

    public function editWeight() {


        $this->weight = $this->weight - 10;
        return $this->weight;
    }

    public function say() {
        echo "Я " . __CLASS__. " поэтому я вешу меньше, чем обычный человек, всего лишь :". $this->editWeight()." кг<br>" ;
        parent::line();
    }
}

class SlowMan extends Human {

    public function editWeight() {


        $this->weight = $this->weight + 50;
        return $this->weight;
    }

    public function say() {
        echo "Я " . __CLASS__. " поэтому я вешу больше, чем обычный человек, всего лишь :". $this->editWeight()." кг<br>" ;
        parent::line();
    }
}



$aSmartyHuman = new SmartyHuman(180, 20, 80);
$aSmartyHuman->say();

$noAbstract = new Noabstract(183,20, 90);
$noAbstract->say();

$rapidMan = new RapidMan(183,20, 90);
$rapidMan->say();

$slowMan = new SlowMan(183,20, 90);
$slowMan->say();

?>