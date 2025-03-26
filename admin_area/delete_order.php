<?php
    global $con;
    if (isset($_GET['delete_order'])) {
  
            # code...
            $remove_id = $_GET['delete_order'];
            echo "$remove_id";
            
            $dlt = "DELETE FROM `orders` WHERE order_id = $remove_id";
            $dl_res = mysqli_query($con,$dlt);
            if($dl_res){
                echo "<script>window.open('index.php?all_order','_self')</script>";
            }else {
                echo "<script>alert('somthing went wrong ')</script>";
                
            }
    }
?>