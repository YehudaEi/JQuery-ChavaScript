<?php

$dict = json_decode(file_get_contents('dict.json'), true);
$newDict = array();
foreach ($dict as $subdict){
    foreach($subdict as $en => $he){
        $newDict[$en] = $he;
    }
}

function mySort($a, $b){
    return strlen($b) - strlen($a);
}

uksort($newDict, "mySort");

$jquery = file_get_contents("jquery-3.5.1.min.js");

foreach ($newDict as $en => $he){
    $jquery = str_replace($en, $he, $jquery);
}

file_put_contents("jquery-3.5.1.he.min.js", $jquery);

echo "done.";
