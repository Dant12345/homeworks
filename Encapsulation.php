<?php
    class Human {

        public $growth;
        public $age;
        public $weight;

        private $temperament = "sanguine";
        private $abilities = "smarty";

        public function __construct($growth, $age, $weight)
        {
            $this->growth = $growth;
            $this->age = $age;
            $this->weight = $weight;
        }

        public function say() {
            echo "Привет чувааак, по темпераменту я -" .$this->temperament.", мой рост ".$this->growth.", мой вес: ".
                $this->weight. ", мой возраст: " .$this->age . "<br>";

            if ($this->abilities === "smarty") {
                $this->think();
            }
        }

        private function think() {
            echo "Думаю, значит существую!Но это не точно!";
        }

    }
$human = new Human("183см","20лет", "90кг");

$human->say();


?>