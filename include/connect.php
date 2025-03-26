<?php
$con=mysqli_connect('localhost','root','','icart');
if(!$con){
    die(mysqli_error($con));
    // echo"connection successful";
}

?>