<?php
declare(strict_types=1);

/**
 * @param array array
 * @return array 
 */



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

 function  makeOneArray(array $array):array {
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

$newArray = makeOneArray($arr);
sort($newArray);


function medianArr(array $arr): int {
	$centerArr = count($arr)/2; 
	$median = $arr[ceil($centerArr)];
	

	if ( count($arr) % 2 === 0) {
		$median = round(($arr[$centerArr] + $arr[$centerArr+1])/2) ;
		
	}
	return $median;
}

$median = medianArr($newArray);
echo "Медианна массивва равна : " . $median.PHP_EOL;

foreach ($newArray as $key => $value) {
	if (($value > $median * 2) or ($value < $median / 2) ) {	
	     unset($newArray[$key]) ;
	 }
}

print_r($newArray);
	
?>