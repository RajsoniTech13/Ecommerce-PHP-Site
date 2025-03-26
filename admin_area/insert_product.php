<?php
    include('../include/connect.php');
if(isset($_POST['insert_product'])) 
    {
    # code...
    // echo "clicked";
    $pr_title = $_POST['product_title'];
    $pr_desc = $_POST['product_desc'];
    $pr_kw = $_POST['product_keywords'];
    $pr_cat = $_POST['product_categories'];
    $pr_brands = $_POST['product_brands'];
    $pr_price = $_POST['product_price'];
    $pr_status = 'true';

    // accessing images
    $pr_img1 = $_FILES['product_img1']['name'];
    $pr_img2 = $_FILES['product_img2']['name'];
    $pr_img3 = $_FILES['product_img3']['name'];
    
    // accessing images name tmp
    $pr_tmp_img1 = $_FILES['product_img1']['tmp_name'];
    $pr_tmp_img2 = $_FILES['product_img2']['tmp_name'];
    $pr_tmp_img3 = $_FILES['product_img3']['tmp_name'];
    // checking empty condition
    // if($pr_title == ' ' or $pr_desc or $pr_kw =='' or $pr_price =='' or $pr_cat =='' or $pr_brands =='' or $pr_img1 =='' or $pr_img2 =='' or $pr_img3 ==''){
    //     echo"<script>alert('please fill all the available feilds');</script>";
    //     exit();
        
    // }else {
          move_uploaded_file($pr_tmp_img1,"./pr_imgs/$pr_img1");
          move_uploaded_file($pr_tmp_img2,"./pr_imgs/$pr_img2");
          move_uploaded_file($pr_tmp_img3,"./pr_imgs/$pr_img3"); 

        //   insert products
        $ins_sql = "INSERT INTO `products` (`product_id`, `product_title`, `product_desc`, `product_kw`, `cat_id`, `brand_id`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `date`, `status`) VALUES(NULL,'$pr_title','$pr_desc','$pr_kw','$pr_cat','$pr_brands','$pr_img1','$pr_img2','$pr_img3','$pr_price',NOW(),'$pr_status')";
        $res = mysqli_query($con,$ins_sql);
        if ($res) {
            # code...
            echo"<script>alert('Successfully Inserted Project');</script>";
        }
        else{
            echo"<script>alert('Something is going wrong in insertion');</script>";
        }
    }
// }
// else{
//     echo"<script>alert('Something is going wrong');</script>";

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-info">
        <div class="container mt-3">
            <h1 class="text-center">Insert Product</h1>

            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" value="" class="form-control" name="product_title" id="product_title" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>
                <!-- Description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" value="" class="form-control" name="product_desc" id="product_description" placeholder="Enter Product description" autocomplete="off" required="required">
                </div>
                <!-- KeyWords -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" value="" class="form-control" name="product_keywords" id="product_keywords" placeholder="Enter Product keywords" autocomplete="off" required="required">
                </div>
                <!-- Categories -->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="product_categories" class="form-select">
                    <option value="">Select Categories</option>
                    <?php
                            $slcat_query = "SELECT * FROM `categories`";
                            $res_slcat = mysqli_query($con,$slcat_query);
                                while ($row = mysqli_fetch_assoc($res_slcat  )) {       
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                    ?>
                    
    >
                   </select>
                </div>
                <!-- Brands -->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="product_brands" class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                            $slcat_query = "SELECT * FROM `brand`";
                            $res_slcat = mysqli_query($con,$slcat_query);
                                while ($row = mysqli_fetch_assoc($res_slcat  )) {       
                                    $br_title = $row['brand_title'];
                                    $br_id = $row['brand_id'];
                                    echo "<option value='$br_id'>$br_title</option>";
                                }
                    ?>
    
                   </select>
                </div>
                <!-- Image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_img1" class="form-label">Product Image 1</label>
                    <input type="file" value="" class="form-control" name="product_img1" id="product_image1" placeholder="Enter Product image1" autocomplete="off" required="required">
                </div>
                <!-- Image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_img2" class="form-label">Product Image 2</label>
                    <input type="file" value="" class="form-control" name="product_img2" id="product_image2" placeholder="Enter Product image2" autocomplete="off" required="required">
                </div>
                <!-- Image 3 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_img3" class="form-label">Product Image 3</label>
                    <input type="file" value="" class="form-control" name="product_img3" id="product_image3" placeholder="Enter Product image3" autocomplete="off" required="required">
                </div>

                <!-- Price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" value="" class="form-control" name="product_price" id="product_price" placeholder="Enter Product price" autocomplete="off" required="required">
                </div>
                <!-- Submit -->
                <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-dark text-white"  value="insert Product" aria-label="Username"
            aria-describedby="basic-addon1">
                </div>
            </form>
            <!-- <input type="submit"  class="btn btn-dark text-white" name="insert_product" value="Insert Product"> -->
        </div>
</body>
</html>


<!-- http://localhost/Ecommerce/admin_area/insert_product.php?product_title=jnlkm&product_desc=kj+n&product_keywords=j+n&product_categories=2&product_brands=1&product_image1=binarysearch.png&product_image2=binarysearch.png&product_image3=binarysearch.png&product_price=lkmn&submit=submit -->