<?php

/**
 * Task1
 */

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
 * Task2 and 3
 */
/*class Counter
{

    protected static $count = 0;


    public function __construct()
    {
        self::$count++;
    }

    public function __destruct()
    {
        self::$count--;
    }

    public static function setCount($arg)
    {
        return self::$count =$arg;
    }

    public static function getCount()
    {
        return self::$count;
    }



}
Counter::setCount(123);
$obj = new Counter;
$obj1 = new Counter;$obj2= new Counter;
unset($obj2);

echo Counter::getCount();*/

/**
 * Task4
 */
class A
{
    protected static function title(): void
    {
        echo __CLASS__;
    }
}

class Child extends A
{
    protected static function title(): void
    {
        echo __CLASS__;
    }

    public static function myTest(): void
    {
        self::title();
    }

    public static function myTest1(): void
    {
        A::title();
    }
}

echo Child::mytest();
echo "<hr>";
echo Child::myTest1();

/**
*Task 5
*Абстрактный класс нужен, когда нужно описать множество классов у которых много общего .(В своем роде шаблон, описывающий общую сущность)
*Интерфейс же описывает свойства, поведение (совокупность правил взаимодействия отдельных вещей..систем)
*/
/**
*
*/