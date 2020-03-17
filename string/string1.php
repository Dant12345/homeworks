<?php

/*
$array = [a, 123 , asdsa , b , sda , d];
sort($array);
print_r($array);
*/

/**
 * Challenge2
 */
$str = 'AAbBbbCcCcAAa';

$arr = str_split($str);
$prevSym = false;
foreach ($arr as $index => $sym) {
    if (mb_strtoupper($prevSym) === mb_strtoupper($sym)) {
        unset($arr[$index]);
        continue;
    }
    $prevSym = $sym;
}

echo implode('', $arr) . PHP_EOL;

print_r($arr);

/**
 * Challenge3
 */


$arr = str_split($str);
$prevSym = false;
foreach ($arr as $index => $sym) {
    if ($prevSym === $sym) {
        unset($arr[$index]);
        continue;
    }
    $prevSym = $sym;
}

echo implode('', $arr) . PHP_EOL;

print_r($arr);
