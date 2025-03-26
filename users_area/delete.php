<?php
session_start();
include('../include/connect.php');
$u_id = $_SESSION['id'];

// echo $u_id;
$sql = "DELETE FROM users WHERE u_id=$u_id ";
$res = mysqli_query($con,$sql);
if ($res) {
    session_destroy();
    echo "<script>alert('Account Deleted Successfully');
    window.open('../index.php','_self');
    </script>";
}
 


?>