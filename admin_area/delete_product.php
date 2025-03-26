<?php
    global $con;
    if (isset($_GET['delete_product'])) {
  
            # code...
            $remove_id = $_GET['delete_product'];
            
            $dlt = "DELETE FROM `products` WHERE product_id = $remove_id";
            $dl_res = mysqli_query($con,$dlt);
            if($dl_res){
                echo "<script>window.open('index.php?view_products','_self')</script>";
            }else {
                echo "<script>alert('somthing went wrong ')</script>";
                
            }
    }
?>