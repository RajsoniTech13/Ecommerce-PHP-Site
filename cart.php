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
    <title>Ecommerce Website - Cart Details </title>
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
    


 <!-- cart function to display total items in cart -->
        <?php 
        include './include/header.php';
        cart(); ?>

<!-- Cart table      -->
<div class="container " style="margin-top:7%;  margin-bottom: 3%;">
    <div class="row">
      
        <form action="" method="post">
            <table class="table table-bordered text-center">
                
                <!-- php Code -->
                <?php
                        //   global $con;    
                          $ip = getIPAddress(); // ::1
                          $total=0;
                          $sql= "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                          $res = mysqli_query($con,$sql);
                          $count_num = mysqli_num_rows($res);
                          if ($count_num>0) {
                            # code...


                            ?>
                            <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Update</th>
                    </tr>
                </thead>
                
                
                <tbody>
    <?php
    while ($row = mysqli_fetch_array($res)) {
        $pr_id = $row['product_id'];
        $sl_pr = "SELECT * FROM `products` WHERE product_id=$pr_id";
        $sl_res = mysqli_query($con, $sl_pr);
        while ($row_product_price = mysqli_fetch_array($sl_res)) {
            $product_price = array($row_product_price['product_price']);
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_img1 = $row_product_price['product_img1'];
            $product_values = array_sum($product_price);
            $total += $product_values;

            // Get the current quantity for the item

            $current_qty = $row['quantity'];
            $total += $price_table * ($current_qty-1);

            ?>

            <tr>
                <td><?php echo $product_title; ?></td>
                <td><img src='./admin_area/pr_imgs/<?php echo $product_img1; ?>' class='employee-photo cart-img'></td>
                <td>
                    <input type="number" name="qty[<?php echo $pr_id; ?>]" class="form-input w-50" value="<?php echo $current_qty; ?>">
                </td>
                <td><?php echo $price_table; ?>/-</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $pr_id ?>" id=""></td>
                <td><input type="checkbox" name="updateitem[]" value="<?php echo $pr_id ?>" id=""></td>
            </tr>
    <?php
        }
    }
    ?>
</tbody>


<?php
  function update_item()
  {
      global $con;
      if (isset($_POST['update_cart'])) {
          if (isset($_POST['updateitem'])) {
              foreach ($_POST['updateitem'] as $update_id) {
                  $qty = $_POST['qty'][$update_id];
                 
                  $update_cart = "UPDATE `cart_details` SET quantity =$qty WHERE product_id ='$update_id'";
                  $up_res = mysqli_query($con, $update_cart);
                  if ($up_res) {
                      // Quantity updated successfully
                      // You can add a success message here if you like
                      echo "<script>window.open('cart.php','_self')</script>";
                  } else {
                      echo "<script>alert('Something went wrong')</script>";
                  }
              }
          } else {
              echo "<script>alert('Check on perticular item')</script>";
          }
        
      }
  }
  $update_item = update_item();
  
// Function to remove item
function remove_item(){
    global $con;
    if (isset($_POST['remove_cart'])) {
        if (isset($_POST['removeitem'])) {
            # code...
        
        foreach ($_POST['removeitem'] as $remove_id) {
            # code...
            echo $remove_id;
            $dlt = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
            $dl_res = mysqli_query($con,$dlt);
            if($dl_res){
                echo "<script>window.open('cart.php','_self')</script>";
            }else {
                echo "<script>alert('somthing went wrong ')</script>";
                
            }
        }
    }else {
        echo "<script>alert('Select atleast one item')</script>";
    }

}
}
echo $remove_item = remove_item();
?>

</table>
            <!-- sub total -->
            <div class="d-flex m-auto">
            <h4 class="px-4 py-2 m-auto">Total: <strong class="text-info"><?php echo $total; ?>/-</strong></h4>

            <input type="submit" value="Remove" name="remove_cart" class="bg-black  text-white mx-2 px-4  py-2 border-0 rounded mt-1"> 
            <input type="submit" value="Update Cart" name="update_cart" class="btn-info px-3 py-2 mt-1">
            <input type="submit" value="Continue Shopping" name="index" class="bg-info text-white px-4 py-3 mx-2 border-0 mt-1">
            <input type="submit" value="LET's BUY" name="buy" class="bg-secondary text-white px-4 mr-2 py-3 border-0 mt-1">
            <!-- <a href="index.php"><button class="bg-info text-white px-4 py-3 mx-2 border-0 mt-1">Continue Shopping</button></a> -->
            
            
        </div>
        </div>
    </div>
<?php

}else{
    echo ' <h2 class="text-danger text-center">Cart is Empty</h2>';
   echo" <input type='submit' value='Continue Shopping' name='index'class='bg-info text-white px-4 py-3 mx-2 border-0 mt-1'>";
}

            if (isset($_POST['index'])) {
                echo "<script>
                window.open('index.php','_self');
            </script>";
            }
            if (isset($_POST['buy'])) {
                echo "<script>
                window.open('users_area/buy.php','_self');
            </script>";
            }
?>
  </form>
<div class="fixed-bottom">
    <?php
   include('include/footer.php')
   ?>
   </div>
    <!-- bootstrap js -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    </script>
</body>

</html>