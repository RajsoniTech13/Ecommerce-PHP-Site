
    <?php
    session_start();

    include('../include/connect.php');
    include('../functions/common_functions.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ecommerce </title>

        <!-- bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <!-- cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
    <?php  
    

    ?>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light text-center text-white p-4 border-0 rounded">
        <div class="container-fluid">
            <a class="navbar-brand title text-white" href="#">ICart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-white"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../displayall.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Contact</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link " href="#">Total Price: 852rs </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link " href="./users_area/signup.php">Register</a>
                    </li>-->
                    <li class="nav-item">
                        </li>
                        
                    </ul>
                    <!-- <h4><?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                        echo"";
                    } else{
        echo $_SESSION['username'];
    } ?></h4> -->
            
            </div>
        </div>
    </nav>


    


    <div class="container " style="margin-top:7%;  margin-bottom: 3%;">
        <!-- main  -->
        <h1 class="text-center m-5  " >Let Us Buy</h1>
        <?php

    // $un = $_SESSION['username'];
    // echo $un;
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        include('login.php');

    //   $username = "";
    }else{
        include('payment.php');
        
    }
    // $deo = $_SESSION['raj'];
    // echo $deo;
    // echo $username;
    // $showError = false;


    ?>

    </div>

    <div class="fixed-bottom">
        <?php
    include('../include/footer.php')
    ?>
    </div>
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        </script>
    </body>

    </html>