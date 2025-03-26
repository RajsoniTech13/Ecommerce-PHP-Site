<?php
    global $con;
    if (isset($_GET['delete_brand'])) {
  
            # code...
            $remove_id = $_GET['delete_brand'];
            echo "$remove_id";
            
            $dlt = "DELETE FROM `brand` WHERE brand_id = $remove_id";
            $dl_res = mysqli_query($con,$dlt);
            if($dl_res){
                echo "<script>window.open('index.php?view_brands','_self')</script>";
            }else {
                echo "<script>alert('somthing went wrong ')</script>";
                
            }
    }
?>