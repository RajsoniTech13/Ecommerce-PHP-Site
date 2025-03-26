
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
                <li class="nav-item">
                    <a class="nav-link " href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup> </a>
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
                <h4><?php echo $_SESSION['username'];  ?></h4>
           
        </div>
    </div>
</nav>




<div class="container " style="margin-top:7%;  margin-bottom: 3%;">
 <?php

if (isset($_GET['user_id'])) {
    # code...
    $u_id = $_GET['user_id'];
    // echo $u_id;
}
$ip = getIPAddress(); // ::1
$total_price=0;
$cart_qry = "SELECT * FROM cart_details WHERE ip_address='$ip'";
$cart_res = mysqli_query($con,$cart_qry);
$invoice_number = rand();
// echo $invoice_number;
$status = "pending";
$total= 0;
$count_item = mysqli_num_rows($cart_res);
while ($row_order = mysqli_fetch_array($cart_res)) {
  $pr_id = $row_order['product_id'];
  $sl_pr = "SELECT * FROM `products` WHERE product_id=$pr_id";
        $sl_res = mysqli_query($con, $sl_pr);
        while ($row_product_price = mysqli_fetch_array($sl_res)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_img1 = $row_product_price['product_img1'];
            $total += $product_values;
            
            // $total += $price_table * ($current_qty-1);
            
            $sub_total=$total;
                        // Get the current quantity for the item
            
                        $qty = $row_order['quantity'];
                        if ($qty==0) {
                          $qty=1;
                          $sub_total = $total;
                        }else{
                          $qty=$qty;
                          $sub_total += $price_table * ($qty-1);
                        }
          }
}




$insert_orders = "INSERT INTO orders VALUES(NULL,$u_id,$sub_total,$invoice_number,$count_item,NOW(),'$status')";
$result_ins = mysqli_query($con,$insert_orders);
if ($result_ins) {
  echo "<script>alert('oders are submitted successfully');
  window.open('profile.php','_self');
  </script>";
}

// Orders Pending
$insert_pending_orders = "INSERT INTO orders_pending VALUES(NULL,$u_id,$invoice_number,$pr_id,$qty,'$status')";
$result_pending = mysqli_query($con,$insert_pending_orders);
if ($result_pending) {
  echo "<script>alert('oders are submitted successfully');
  window.open('profile.php','_self');
  </script>";
}


// Delete from cart
$empty_cart = "DELETE FROM cart_details WHERE ip_address = '$ip'";
$delete_res = mysqli_query($con,$empty_cart);

?>
    <!-- main  -->






















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