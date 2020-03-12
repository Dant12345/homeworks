<?php

define("DS", DIRECTORY_SEPARATOR);
$cDir = __DIR__.DS.'test';
$cacheDir = $cDir. DS . '_cache';

if (!file_exists($cacheDir)) {
    if (!mkdir($cacheDir)) {
        die ('Не удалось создать директорию');
    }
}

$d = opendir($cDir);

while( false !== ($name = readdir($d)) ) {
    $aFile = $cDir.DS.$name;
    if (is_dir($aFile)) {
        continue;
    }
    if (pathinfo($aFile, PATHINFO_EXTENSION) === 'php') {

        copy($aFile, $cacheDir.DS.$name);
    }
}
closedir($d);
echo 'Все файлы скопированы!';
$hasInclude = false;
$c = opendir($cacheDir);

while ( false !== ($name = readdir($c)) ) {
    $isFile = $cacheDir.DS.$name;
    if (is_dir($isFile)) {
        continue;
    }
    $rFile = file($isFile);

    $substDone = false;

    if (is_array($rFile)) {
        foreach ($rFile as $key => $value) {
             $string = mb_strrchr($value, 'include');

             if($string) {
                 $filename = explode("'", $string);
                 $filename = $filename[1];
                 echo $filename . "<br>";


                 if (!file_exists($filename)) {
                     echo "File to include not found!" . PHP_EOL;
                     continue;
                 }
                 $hasInclude = $substDone = true;
                 echo "File to include " . $filename . PHP_EOL;

                 $wFile = file($filename);

                 unset($wFile[0]);
                 $wFile= implode('',$wFile);
                 $rFile[$key] =substr_replace($string, $wFile,0);


             }


        }

    }
    if ($substDone) {
        $fh = fopen($cacheDir.DS.$name,'w');
        foreach ($rFile as $line) {
            fwrite($fh, $line);
        }
        fclose($fh);
        echo "Операция по поиску и замене завершены";

    }
}
closedir($c);

if ($hasInclude === false) {
    echo "Файлы содержащие include не найдены!!!.<br>";
}

