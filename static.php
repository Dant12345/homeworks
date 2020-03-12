<?php
/*class ExampleStatic {

    public static $my_static;

    public function add($a, $b) {

        if (isset(ExampleStatic::$my_static)) {
            return   ExampleStatic::$my_static;
        }
        else {
            self::$my_static  = $a + $b;
            echo ExampleStatic::$my_static;
        }
    }
}

$sum = new ExampleStatic();

$sum->add(13,3);

$sum->add(132,3);
*/


/**
 * Class Counter
 * Почему не срабатывает деструктор?!!!!
 */

class Counter {

    protected static $count = 0;
     static public  $arr = [];

    private function __construct()
    {
        self::$count++;
    }

    public function __destruct()
    {
        self::$count--;
    }


    public static function getCount() {
            return self::$count;
    }

    public static function create($fname) {
        if (isset(self::$arr[$fname])) {
            return self::$arr[$fname];

        }
        else {
            return self::$arr[$fname] = new Counter;

        }
    }
}
$count = Counter::getCount();
$a =Counter::create("file".Counter::getCount().".log");
$b =Counter::create("file".Counter::getCount().".log");
$c =Counter::create("file".Counter::getCount().".log");
echo "<pre>";
var_dump(Counter::$arr);
echo "</pre>";
Counter::getCount();
$a1 =Counter::create("file".Counter::getCount().".log");
$b2 =Counter::create("file".Counter::getCount().".log");
$c3 =Counter::create("file".Counter::getCount().".log");
echo "<pre>";
var_dump(Counter::$arr);
echo "</pre>";
echo Counter::getCount();
Counter::$arr = [];
echo "<pre>";
var_dump(Counter::$arr);
echo "</pre>";
echo Counter::getCount();
?>