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
    <header >


        <!-- <h1>Hello Raj..!</h1> -->

        <?php
//  include('./include/connect.php');
 include('./include/header.php');
?>

       
    </header>


    <!-- main  -->
    <h1 class="text-center m-5  ">Let Us Buy</h1>
    <div class="row container-fluid mt-5   ">
        <div class="col-md-2 "></div>
        <div class="col-md-8  ">
            <!-- <h1>Products</h1> -->
            <div class="row">
                

            <!-- Fetching Products  -->
            <?php
                // getproducts();
                get_unique_cat();
                get_unique_brand();
            ?>
                
                


            </div>
        </div>


        <div class="col-md-2 bg-sdnv p-0">
            <!-- <h1>Sidenav</h1> -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-black ">
                    <a href="" class="nav-link text-light">
                        <h4>Delevary Brands</h4>
                    </a>
                </li>
                <?php
                    getbrands();
                // select brands
                // $sql_sl="Select * from brand";
                // $res_sl= mysqli_query($con,$sql_sl);
                // while($row_data = mysqli_fetch_assoc($res_sl)){
                //     $br_title = $row_data['brand_title'];
                //     $br_id = $row_data['brand_id'];
                //     echo "                <li class='nav-item m-2 bg-black border rounded-circle'>
                //     <a href='index.php?brand_id=$br_id' class='nav-link text-light '>$br_title</a>
                // </li>";
                // }
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
                // select brands
                // $sql_sl="Select * from categories";
                // $res_sl= mysqli_query($con,$sql_sl);
                // while($row_data = mysqli_fetch_assoc($res_sl)){
                //     $cat_title = $row_data['cat_title'];
                //     $cat_id = $row_data['cat_id'];
                //     echo "<li class='nav-item m-2 bg-black border rounded'>
                //     <a href='index.php?cat_id=$cat_id' class='nav-link text-light '>$cat_title</a>
                // </li>";
                // }
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

    </script>
</body>

</html>