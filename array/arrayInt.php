<?php  
declare(strict_types=1);

/**
 * @param array $array
 * @return array
 */



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


function  makeOneArray(array $array): array {
 	if (!is_array($array)) {
 		return false;
 	}

 	$tmp = [];

 	foreach ($array as $val) {
 		if (is_array($val)) {
 			$tmp = array_merge($tmp, makeOneArray($val));			
 		}
 		
 		elseif (is_int($val)) {
 			$tmp[] = $val; 					
 		}
 		
 	}
 	return $tmp;
}


$newArr = makeOneArray($arr);
sort($newArr);
echo "<pre>";
print_r($newArr);
echo "</pre>";

?>