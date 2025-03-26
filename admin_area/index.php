<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../include/connect.php');
include('../functions/common_functions.php');
if(!isset($_SESSION['loggedinadmin']) || $_SESSION['loggedinadmin']!=true){
    header('location:login.php');exit();
}else{
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link bootstrap -->
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>
</head>
<style>
/* Admin */

.Admin-Img {
    width: 100px;
    object-fit: contain;
}

button {
    border: none;
    background: none;
}
</style>


<body>
 
    <nav class="navbar navbar-expand-lg navbar-light bg-black text-white p-4 border-0 rounded">
        <div class="container-fluid">  
            <a class="navbar-brand title text-white" href="#">ICart</a>
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item text-light" style="list-style: none; font-size: 1.3rem;">
                        <a href="" class="nav-link" style="color: white;
                                                                    display: block;
                                                                    padding: 3px 22px;
                                                                    border-radius: 20px;
                                                                    text-decoration: none; 
                                                                     ">WelCome <?php echo $_SESSION['admin_username'];?></a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
    <!-- second part -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- third part -->
    <div class="row container-fluid">
        <div class="col-md-12 bg-sdnv p-1 d-flex align-items-center ">
            <div class="m-5">
                <a href=""><img src="../img/card-1.jpg" alt="" class="Admin-Img "></a>
                <p class="text-dark text-center">Admin name</p>
            </div>
            <div class="button text-center btn-lg m-5 ">
                <button><a href="insert_product.php" class="nav-link text-light bg-black m-1 border rounded">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-black m-1 border rounded">View Products</a></button>
                <button><a href="index.php?insert_category "
                        class="nav-link text-light bg-black m-1 border rounded">Insert Categories</a></button>
                <button><a href="index.php?view_category" class="nav-link text-light bg-black m-1 border rounded">View Categories</a></button>
                <button><a href="index.php?insert_Brands" class="nav-link text-light bg-black m-1 border rounded">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-black m-1 border rounded">View Brands</a></button>
                <button><a href="index.php?all_order" class="nav-link text-light bg-black m-1 border rounded">All Orders</a></button>
                <!-- <button><a href="" class="nav-link text-light bg-black m-1 border rounded">All Payments</a></button> -->
                <button><a href="index.php?list_users" class="nav-link text-light bg-black m-1 border rounded">List Users</a></button>
                <button><a href="logout.php" class="nav-link text-light bg-black m-1 border rounded">LogOut</a></button>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <?php
            if(isset($_GET['insert_category'])){
                    include('insert_categories.php');    
            }
            if(isset($_GET['insert_Brands'])){
                    include('insert_brands.php');    
            }
            if(isset($_GET['view_products'])){
                    include('view_product.php');    
            }
            if(isset($_GET['view_brands'])){
                    include('view_brand.php');    
            }
            if(isset($_GET['view_category'])){
                    include('view_category.php');    
            }
            if(isset($_GET['list_users'])){
                    include('allusers.php');    
            }
           
            if(isset($_GET['delete_product'])){
                    include('delete_product.php');    
            }
            if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');    
            }
            if(isset($_GET['delete_cat'])){
                    include('delete_cat.php');    
            }
            if(isset($_GET['delete_order'])){
                    include('delete_order.php');    
            }
            if(isset($_GET['all_order'])){
                    include('allorders.php');    
            }
           

        }
?>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>