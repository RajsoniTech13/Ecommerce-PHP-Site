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
    <title>Document</title>
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
    <header>


        <!-- <h1>Hello Raj..!</h1> -->

        <?php

            include('./include/header.php');
        ?>


    </header>


    <!-- main  -->
    <h1 class="text-center m-5  ">Let Us Buy</h1>

    <div class="row container-fluid mt-5   ">

        <div class="col-md-2 "></div>
        <div class="col-md-8 ">


            <!-- <div class="col-md-1  "></div> -->


            <!-- Fetching Products  -->
            <h1 class="text-center m-5  ">Product Information</h1>
            <?php
                view_details();
                // get_unique_cat();
                // get_unique_brand();
                ?>

        </div>





        <?php
                // view_details();
                get_unique_cat();
                get_unique_brand();
            ?>
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

</body>

</html>