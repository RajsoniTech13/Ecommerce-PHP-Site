<?php
    global $con;
    if (isset($_GET['delete_cat'])) {
  
            # code...
            $remove_id = $_GET['delete_cat'];
            echo "$remove_id";
            
            $dlt = "DELETE FROM `categories` WHERE cat_id = $remove_id";
            $dl_res = mysqli_query($con,$dlt);
            if($dl_res){
                echo "<script>window.open('index.php?view_category','_self')</script>";
            }else {
                echo "<script>alert('somthing went wrong ')</script>";
                
            }
    }
?>