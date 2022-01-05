<?php
$conn = mysqli_connect('localhost','root','', $studentforum);

 $type=$_POST['type'];
 $sno=$_POST['sno'];
 if ($type=='like'){
     $sql="update studentforum set like_count=like_count+1 where sno=$sno";
 }
 else{
    $sql="update studentforum set like_count=like_count-1 where sno=$sno";
 }
 $result = mysqli_query($conn, $sql);
 ?>
           