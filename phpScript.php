<?php

$connect = mysqli_connect("localhost","root","root","enforsec");

$jsondata = file_get_contents("https://jsonplaceholder.typicode.com/posts");
 
$array = json_decode($jsondata,true);


foreach($array as $k =>$v){

    $userId = mysqli_real_escape_string($connect, $v['userId']);
    $id = mysqli_real_escape_string($connect, $v['id']);
    $title = mysqli_real_escape_string($connect, $v['title']);
    $body = mysqli_real_escape_string($connect, $v['body']);
    $sql = "INSERT INTO posts(userId,id,title,body) VALUES ('".$userId."', '".$id."','".$title."', '".$body."')";
    mysqli_query($connect,$sql);
    
}

?>