<?php
declare(strict_types=1);

/**
 * @param array $array
 * @return array
 */


$arr = [
    1,
    2,
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
*Преобразуем многомерный массив в одномерный	
*/
 function  makeOneArray($array) {
 	if (!is_array($array)) 
 	{
 		return false;
 	}
 	$tmp = [];
 	foreach ($array as $val) {
 		if (is_array($val)) {
 			$tmp = array_merge($tmp, makeOneArray($val));
 			
 		}
 		
 		else {
 			$tmp[] = $val;
 		}
 	}
 	return $tmp;
}


$newArr = makeOneArray($arr);
sort($newArr);
print_r($newArr);
echo "<hr>";

$maxElem = array_pop($newArr);
echo "Максимальный элемент массива: " . $maxElem;



$strArr= [
    'One',
    'Two',
    'Twenty',
    'Аааааа - ru',
    'Afffff',
    'Aaaaaa - en',
];

sort($strArr);
echo '<pre>';
print_r($strArr);
echo '</pre>';
?>





<?php


$strArr= [
    'One',
    'Two',
    'Twenty',
    'Аааааа - ru',
    'Afffff',
    'Aaaaaa - en',
];

usort($strArr, 'strcmp');

echo '<pre>';
print_r($strArr);
echo '</pre>';


