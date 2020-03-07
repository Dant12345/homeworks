<?php
	
	class FileLogger {

		private $f;
		private $lines = [];
		private $count = 1;

		public function __construct($fname) {
			
			$this->f = fopen($fname, "w");
		}

		public function __destruct() {

			fputs($this->f, join("", $this->lines));
			fclose($this->f);

		}

		public function log(...$val) {
			$this->lines[] =$this->count .". " . serialize($val).PHP_EOL;

            $str = $this->count . '.  datetime: ' . date('Y-m-d H:i:s') . ', params: ' . serialize($val).PHP_EOL;
            echo $str . "<br>" ;
            $this->count +=1;
            /**
             * Прикольно слизал ))
             */
            sleep(rand(0, 5));

        }
	}

$logger = new FileLogger("test.log");
$logger->log("Hello", "$a", "qweqwer");
$logger->log("Hello", "213", [1,2,3]);
$logger->log("Hello", "213", "0");
$logger->log("Hello", "213", "0");
$logger->log("Hello", "213", "0");
$logger->log("Hello", "213", "0");
$logger->log("Hello", "213", "0");


exit();
?>