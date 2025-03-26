
<?php
//  include('../functions/common_functions.php');   
 include('../include/connect.php');
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
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
         $ip = getIPAddress(); // ::1
         $select = "SELECT *  FROM users WHERE u_ip = '$ip'"; 
         $res = mysqli_query($con,$select);
         $data = mysqli_fetch_array($res);
         $u_id = $data['u_id'];
         
         ?>

 


<h2 class="text-center text-info" style="margin-top:7%;  margin-bottom: 3%;">Payment Options</h2>
<div class="container d-flex justify-content-center" >
    <!-- main  -->
    <div class="card text-center " style="width:40%" >
          <div class="card-body ">
            <h2 class="card-title mb-5">Order Summary</h2>
        <?php
                $ip = getIPAddress(); // ::1
                $total=0;
                $sql= "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                $res = mysqli_query($con,$sql);
                $count_num = mysqli_num_rows($res);
                if ($count_num>0) {
                    while ($row = mysqli_fetch_array($res)) {
                        $pr_id = $row['product_id'];
                        $sl_pr = "SELECT * FROM `products` WHERE product_id=$pr_id";
                        $sl_res = mysqli_query($con, $sl_pr);
                        while ($row_product_price = mysqli_fetch_array($sl_res)) {
                            $product = $row_product_price['product_title'];
                            $price = $row_product_price['product_price'];
                            $total += $price;
                            $qty = $row['quantity'];
                            $total += $price * ($qty-1);
                            echo  "<h4 class='card-text'>$qty $product : $price * $qty  
                           </h4>";
                        }
                    }
            }
        ?>
            
         
            <hr>
            <h3 class="card-text fw-bold"><?php echo "Total : $total";  ?></h3>
            <!-- <p class="card-text">Total: $49.98</p> -->
      
        
     
    </div>

        <div class="row  text-center align-items-center mb-5" >
            <div class="col-md-2"></div>
            <div class="col-md-4">
        <!-- <h1 class="m-auto">hello</h1> -->
                <a href="https://www.paypal.com" target="_blank" ><Button class="bg-primary w-60 text-white border-0 p-3 rounded">Payment Online</Button></a>
            </div>
            <div class="col-md-4 ">
                <!-- <h1>bc</h1> -->
                <a href="order.php?user_id=<?php echo $u_id;?>" target="_blank" ><Button class="bg-primary w-60 text-white border-0 p-3 rounded">Payment Offline</Button></a>
            </div>
        </div>
            <div class="col-md-2 ">
        </div>
        </div>

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