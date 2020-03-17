<?php

declare(strict_types=1);

$arr = [
    1,
    a,
    1.25,
    [
        -2,
        e,
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

$newArr = makeOneArray($arr);
sort($newArr);
echo "<pre>";
print_r($newArr);
echo "</pre>";