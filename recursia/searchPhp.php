<?php
declare(strict_types=1);

/**
 * @param string $dir
 * @return array
 */



function scan(string $dir):array {
	
    $d = opendir($dir);
    $arrayPhp = [];
    while( false !== ($name = readdir($d)) ) {
    
        if ( $name == '.' or $name == '..') continue;
        if ( is_dir(  $dir .DIRECTORY_SEPARATOR. $name) ) {
        
           $newArr =  scan(  $dir . '/'. $name);
           $arrayPhp = array_merge($newArr , $arrayPhp);

        } elseif ( pathinfo($name)['extension'] == "php") {
             
                $arrayPhp[] = $name;
                
             }   

            
            

    }
    
    closedir($d);
    return $arrayPhp;
}

$resultScan = scan($localhost);

echo "<pre>";
print_r($resultScan);
echo "</pre>";
/*I have trouble??!
?>*/
?>

