<?php  

include('../functions/common_functions.php');
if (isset($_POST['back'])) {
    echo "<script>window.location = 'index.php';</script>";
}
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../include/connect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
   
    
    $sql = "Select * from admin where a_email='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){

                if (password_verify($password,$row['a_password'])){ 
                               
                              session_start();
                                $login = true;
                                        
                                $_SESSION['loggedinadmin'] = true;
                                $_SESSION['a_id'] = $row['admin_id'];
                                    
                                        $_SESSION['email'] =$email;
                                        $_SESSION['admin_username'] = $row['a_username'];
                                        echo "<script>alert('Login Successfully..!' );
                                        window.location = 'index.php'
                                        </script>";
                                
                            
                            
                } else{
                    $showError = "Incorrect password";
                }

            }
        }
        else{
                $showError = "User Does not Exist";
        }
        
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Log in</title>
  </head>
  <style>
    .bg-black{
      background-color: #000 ;  
    }
  </style>
  <body>
  
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

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

    <div class="container " style="margin-top:10%;">
     <h1 class="text-center">Login to our Admin Page</h1>
     <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control" id="username" name="email" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Log in</button>
        <input type="submit" class="bg-primary btn text-white" name="back" value="Back"
                    aria-label="Back" aria-describedby="basic-addon2">
        <p>Don't have an Account ? <a href="admin_register.php">Regester Now</a> </p>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
 