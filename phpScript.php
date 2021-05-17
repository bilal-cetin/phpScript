<?php

$jsondata = file_get_contents("https://jsonplaceholder.typicode.com/posts");
 
$array = json_decode($jsondata,true);

print_r($array);


?>