<?php

/**
 * Class Human
 */
abstract class Human
{
    public $growth;
    public $age;
    public $weight;

    private $temperament = "sanguine";
    private $abilities = "smarty";

    /**
     * Human constructor.
     * @param int $aGrowth
     * @param int $anAge
     * @param float $aWeight
     */
    public function __construct(int $aGrowth, int $anAge, float $aWeight)
    {
        $this->growth = $aGrowth;
        $this->age = $anAge;
        $this->weight = $aWeight;
    }

    public function say(): void
    {
        echo "Привет чувааак, по темпераменту я -" . $this->temperament . ", мой рост " . $this->growth . "см, мой вес: " .
            $this->weight . "кг, мой возраст: " . $this->age . "лет>";
        $this->line();
    }

    protected function think(): void
    {
        echo "Думаю, значит существую!Но это не точно!" . "<br>";
    }

    protected function line(): void
    {
        echo "<hr>";
    }

}

/**
 * Class SmartyHuman
 */
class SmartyHuman extends Human
{
    private $iq = 200;

    public function say(): void
    {
        echo "Я умный человек мой IQ равен : " . $this->iq . "<br>";
        parent::say();
    }
}

/**
 * Class SillyHuman
 */
abstract class SillyHuman extends Human
{
    public function think(): void
    {
        echo "Я метод абстрактного класса меня смогут заюзать только потомки!!!<br>";
    }
}

/**
 * Class Noabstract
 */
class Noabstract extends SillyHuman
{
    public function say(): void
    {
        $this->think();
        parent::line();
    }
}

/**
 * Class RapidMan
 */
class RapidMan extends Human
{
    /**
     * @return float
     */
    public function editWeight(): float
    {
        $this->weight = $this->weight - 10;
        return $this->weight;
    }

    public function say(): void
    {
        echo "Я " . __CLASS__ . " поэтому я вешу меньше, чем обычный человек, всего лишь :" . $this->editWeight(
            ) . " кг<br>";
        parent::line();
    }
}

/**
 * Class SlowMan
 */
class SlowMan extends Human
{
    /**
     * @return float
     */
    public function editWeight(): float
    {
        $this->weight = $this->weight + 50;
        return $this->weight;
    }

    public function say(): void
    {
        echo "Я " . __CLASS__ . " поэтому я вешу больше, чем обычный человек, всего лишь :" . $this->editWeight(
            ) . " кг<br>";
        parent::line();
    }
}


$aSmartyHuman = new SmartyHuman(180, 20, 80);
$aSmartyHuman->say();

$noAbstract = new Noabstract(183, 20, 90);
$noAbstract->say();

$rapidMan = new RapidMan(183, 20, 90);
$rapidMan->say();

$slowMan = new SlowMan(183, 20, 90);
$slowMan->say();
