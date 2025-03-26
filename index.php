<?php

 include('./include/connect.php');
 include('./functions/common_functions.php');
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
    <link rel="stylesheet" href="css/style.css">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
<header class="slider-header">


        <!-- <h1>Hello Raj..!</h1> -->
        <?php
//  include('./include/connect.php');
            include('./include/header.php');
            cart();
            
                ?>
        <div class="slider">
                

                <div class="midtext">
                    <h2>ONLINE SHOPPING MALL</h2>
                    <h1>GET HERE <span class="change_content"> </span> </h1>
                    <p>"Communications is at the heart of e-commerce and community"</p>
                </div>
            </div>
        
</header>


    <!-- main  -->
    <h1 class="text-center m-5  ">Let Us Buy</h1>
    <div class="row container-fluid mt-5   " id="cards">
        <div class="col-md-2 "></div>
        <div class="col-md-8  ">
            <!-- <h1>Products</h1> -->
            <div class="row">


                <!-- Fetching Products  -->
                <?php
                getproducts();
                get_unique_cat();
                get_unique_brand();
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip;  
            ?>




            </div>
        </div>


        <div class="col-md-2 bg-sdnv p-0">
            <!-- <h1>Sidenav</h1> -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-black ">
                    <a href="" class="nav-link text-light">
                        <h4>Delivary Brands</h4>
                    </a>
                </li>
                <?php
                    getbrands();
                
                ?>


            </ul>
            <ul class="navbar-nav me-auto mt-3 text-center">
                <li class="nav-item bg-black ">
                    <a href="" class="nav-link text-light">
                        <h4>Categories</h4>
                    </a>
                </li>
                <?php   
                    getcategories();
               
                ?>

            </ul>
        </div>

    </div>


    <?php
   include('include/footer.php')
   ?>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>

</html>