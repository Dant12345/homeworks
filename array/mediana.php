<?php

declare(strict_types=1);

$arr = [
    1,
    12313,
    3,
    [
        5,
        6,
        100500,
        [
            7,
            8,
            -1
        ],
    ],
];

/**
 * Преобразуем многомерный массив в одномерный
 *
 * @param $array
 * @return array
 */
function makeOneArray(array $array): array
{
    if (!is_array($array)) {
        return [];
    }

    $tmp = [];
    foreach ($array as $val) {
        if (is_array($val)) {
            $tmp = array_merge($tmp, makeOneArray($val));
            continue;
        }
        $tmp[] = $val;
    }
    return $tmp;
}

/**
 * @param array $arr
 * @return int
 */
function medianArr(array $arr): int
{
    $centerArr = count($arr) / 2;
    $median = $arr[ceil($centerArr)];

    if (count($arr) % 2 === 0) {
        $median = round(($arr[$centerArr] + $arr[$centerArr + 1]) / 2);
    }
    return $median;
}

$newArray = makeOneArray($arr);
sort($newArray);



$median = medianArr($newArray);
echo "Медианна массивва равна : " . $median . PHP_EOL;

foreach ($newArray as $key => $value) {
    if (($value > $median * 2) or ($value < $median / 2)) {
        unset($newArray[$key]);
    }
}

print_r($newArray);