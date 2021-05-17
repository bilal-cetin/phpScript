<?php

$connect = mysqli_connect("localhost","root","root","enforsec");

$jsondata = file_get_contents("https://jsonplaceholder.typicode.com/posts");
 
$postsArray = json_decode($jsondata,true);


foreach($postsArray as $k =>$v){

    $userId = mysqli_real_escape_string($connect, $v['userId']);
    $id = mysqli_real_escape_string($connect, $v['id']);
    $title = mysqli_real_escape_string($connect, $v['title']);
    $body = mysqli_real_escape_string($connect, $v['body']);
    $sql = "INSERT INTO posts(userId,id,title,body) VALUES ('".$userId."', '".$id."','".$title."', '".$body."')";
    mysqli_query($connect,$sql);
    
}



$jsondatas = file_get_contents("https://jsonplaceholder.typicode.com/comments");
 
$commentsArray = json_decode($jsondatas,true);


foreach($commentsArray as $k =>$v){

    $postId = mysqli_real_escape_string($connect, $v['postId']);
    $id = mysqli_real_escape_string($connect, $v['id']);
    $name = mysqli_real_escape_string($connect, $v['name']);
    $email = mysqli_real_escape_string($connect, $v['email']);
    $body = mysqli_real_escape_string($connect, $v['body']);
    $sql = "INSERT INTO comments(postId,id,name,email,body) VALUES ('".$postId."', '".$id."','".$name."', '".$email."', '".$body."')";
    mysqli_query($connect,$sql);
    
}
?>