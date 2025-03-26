<?php  
session_start();

include('../functions/common_functions.php');
include('../include/connect.php');
if (isset($_POST['back'])) {
    echo "<script>window.location = 'index.php';</script>";
}
$showError = false;

if(isset($_POST['submit']) ){
    if ($_POST['code']=="Raj123") {
        
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
   
    $cno = $_POST["contact"];



   
    // Check whether this username exists
   $existSql = "SELECT * FROM `admin` WHERE a_email = '$email'";
   $result = mysqli_query($con, $existSql);
   $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "User Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin` 
            VALUES 
            (NULL, '$username', '$email', '$hash','$cno')";
            $result = mysqli_query($con, $sql);
            if ($result){
                // $showAlert = true;
               //    Select cart items
   
                
                    echo "<script>alert('Succesfully Registered ..! --> Now Login First' );
                    window.location = 'login.php'
                     </script>";
                    
                    
            }
        }
        else{
            $showError = "Password  Does not  Match";
        }
   }


}
else{
    $showError = "Code is Wrong...!";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    
<?php

if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';   
    }
    ?>

    <div class="container  justify-content-center" style="margin-top: 5%;    width: 30%;">
        <h1>Welcome to Icart</h1>
        <form action="" method="Post" class="mb-2" enctype="multipart/form-data">
            <h5>Username</h5>

            <div class="input-group w-90  mb-3">

                <input type="text" class="form-control " name="username" placeholder="Enter username" aria-label="Username">
            </div>
            <h5>Email </h5>

            <input type="email" class="form-control mb-3 " name="email" placeholder="Enter Email" aria-label="Username"
                aria-describedby="basic">
            <div class="input-group w-90  mb-3">
                <h5>Password</h5>
                <h5 style="margin-left:35%">Confirm Password</h5>
            </div>
            <div class="input-group w-90  mb-3">
                <input type="password" class="form-control mb-3 " name="password" placeholder="Enter Password"
                    aria-label="Username" aria-describedby="basic">
                <input type="password" class="form-control mx-3 mb-3" name="cpassword" placeholder="Confirm Password"
                    aria-label="Username" aria-describedby="basic">
            </div>
            <h5>Contact NO</h5>
            
            <input type="text" class="form-control mb-3 " name="contact" placeholder="Enter Mobile No" aria-label="Username"
            aria-describedby="basic">
            <h5><Code></Code></h5>
            
            <input type="text" class="form-control mb-3 " name="code" placeholder="Enter Code" aria-label="Username"
            aria-describedby="basic">
            
      

       


        
            <div class="input-group w-10">

                <input type="submit" class="form-control bg-info p-2 border-0" name="submit" value="submit"
                    aria-label="Submit" aria-describedby="basic-addon1">
                    
                    <input type="submit" class="form-control bg-info p-2 border-0" name="back" value="Back"
                    aria-label="Back" aria-describedby="basic-addon2">
                   <!-- <button class="bg-info p-3 border-0" name="insert_cat" >Insert Categories</button> -->
                </div>
                
                <p>Already have an Account ? <a href="login.php">Login Now</a> </p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>

</html>