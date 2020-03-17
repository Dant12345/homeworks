<?php

/**
 * Class Human
 */
class Human
{
    public $growth;
    public $age;
    public $weight;

    private $temperament = "sanguine";
    private $abilities = "smarty";

    /**
     * Human constructor.
     * @param int $growth
     * @param int $age
     * @param float $weight
     */
    public function __construct(int $growth, int $age, float $weight)
    {
        $this->growth = $growth;
        $this->age = $age;
        $this->weight = $weight;
    }

    public function say():void
    {
        echo "Привет чувааак, по темпераменту я -" . $this->temperament . ", мой рост " . $this->growth . ", мой вес: " .
            $this->weight . ", мой возраст: " . $this->age . "<br>";

        if ($this->abilities === "smarty") {
            $this->think();
        }
    }

    private function think()
    {
        echo "Думаю, значит существую!Но это не точно!";
    }
}

$human = new Human("183см", "20лет", "90кг");

$human->say();
