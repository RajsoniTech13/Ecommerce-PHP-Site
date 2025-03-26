<?php
    include('../include/connect.php');
    if (isset($_POST['insert_brand'])) {
        # code...
        // echo"<script>alert('category has been inserted');</script>";
        // echo"Clicked";
        $br_title = $_POST['brand_title'];
        $sql_sl = "select * from brand where brand_title='$br_title'";
        $res_sl = mysqli_query($con,$sql_sl);
        $count = mysqli_num_rows($res_sl);
        if ($count>0) {
            #code...
           echo" <script>alert('Brand is already present inside database');</script>";
        }
        else{
        $sql_in= "INSERT INTO `brand` (brand_title) VALUES('$br_title')"; 
        $res = mysqli_query($con,$sql_in);
        if ($res) {
            echo"<script>alert('Brand has been inserted Successfully');</script>";
        }
    }
    }
?>  

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90  mb-3">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control"  name="brand_title" placeholder="Insert Brands" aria-label="Brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-3">
        
        <input type="submit" class="bg-info p-3 border-0" name="insert_brand" value="insert Brands" aria-label="Username"
            aria-describedby="basic-addon1">
            <!-- <button class="bg-info p-3 border-0" >Insert Brands</button> -->
    </div>
</form>