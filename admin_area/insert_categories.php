<?php
    include('../include/connect.php');
    if (isset($_POST['insert_cat'])) {

        # code...
        // echo"<script>alert('category has been inserted');</script>";
        // echo"Clicked";
        $cat_title = $_POST['cat_title'];
        $sql_sl = "select * from categories where cat_title='$cat_title'";
        $res_sl = mysqli_query($con,$sql_sl);
        $count = mysqli_num_rows($res_sl);
        if ($count>0) {
            # code...
           echo" <script>alert('category exists');</script>";
        }
        else{
        $sql_in= "INSERT INTO `categories` (cat_title) VALUES('$cat_title')"; 
        $res = mysqli_query($con,$sql_in);
        if ($res) {
            echo"<script>alert('category has been inserted');</script>";
        }
    }
    }
?>  

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90  mb-3">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control " name="cat_title" placeholder="Insert Category" aria-label="Category"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-3">
        
        <input type="submit" class="bg-info p-3 border-0" name="insert_cat" value="insert Category" aria-label="CatBtn"
            aria-describedby="basic-addon1">
            <!-- <button class="bg-info p-3 border-0" >Insert Brands</button> -->
    </div>
</form>
<?php
 

?>