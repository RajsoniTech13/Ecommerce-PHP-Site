<?php
session_start();

session_unset();
session_destroy();


echo "<script>alert('You are Logged Out..!' );
window.location = '../index.php'
 </script>";

exit;
?>



