<?php

// including connect 
//  include('./include/connect.php');

//  Getting Products
if (!function_exists('getproducts')) {
function getproducts(){
    global $con;
    if (!isset($_GET['cat_id'])) {
        # code...
        if (!isset($_GET['brand_id'])) {
        
         # code...
    
                $sl_sql = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9 ";
                $res_sl = mysqli_query($con,$sl_sql);
                
               while ($row = mysqli_fetch_assoc($res_sl)) {
                # code...   
                $pr_id = $row['product_id'];
                $pr_title = $row['product_title'];
                $pr_desc = $row['product_desc'];
                
                $pr_cat_id = $row['cat_id'];
                $pr_br_id = $row['brand_id'];
                $pr_img1 = $row['product_img1'];
                $pr_price = $row['product_price'];
                echo "
                
                    <div class='col-md-4 mb-2 d-flex justify-content-center'>
                        <div class='card' style='width: 20rem; display:inline-block;'>
                            <img class='card-img-top' src='admin_area/pr_imgs/$pr_img1' alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>$pr_title</h5>
                                <p class='card-text '>Price :- $pr_price/-</p>
                                <p class='card-text '>". substr($pr_desc, 0, 100). "...</p>
                                <a href='index.php?add_to_cart=$pr_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_id=$pr_id' class='btn btn-success'>View More</a>
                            </div>
                        </div>
                    </div>
                ";
               }
}
                
}
}
}
if (!function_exists('getallproducts')) {
// Get all product 
    function getallproducts(){
        global $con;
        if (!isset($_GET['cat_id'])) {
            # code...
            if (!isset($_GET['brand_id'])) {
            
            # code...
        
                    $sl_sql = "SELECT * FROM products ORDER BY RAND()  ";
                    $res_sl = mysqli_query($con,$sl_sql);
                    
                while ($row = mysqli_fetch_assoc($res_sl)) {
                    # code...   
                    $pr_id = $row['product_id'];
                    $pr_title = $row['product_title'];
                    $pr_desc = $row['product_desc'];
                    
                    $pr_cat_id = $row['cat_id'];
                    $pr_br_id = $row['brand_id'];
                    $pr_img1 = $row['product_img1'];
                    $pr_price = $row['product_price'];
                    echo "
                    
                        <div class='col-md-4 mb-2 d-flex justify-content-center'>
                            <div class='card' style='width: 20rem; display:inline-block;'>
                                <img class='card-img-top' src='admin_area/pr_imgs/$pr_img1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$pr_title</h5>
                                    <p class='card-text '>Price :- $pr_price/-</p>
                                    <p class='card-text '>". substr($pr_desc, 0, 100). "...</p>
                                    <a href='index.php?add_to_cart=$pr_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$pr_id' class='btn btn-success'>View More</a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
                    
        }
    }
}



if (!function_exists('get_unique_cat')) {
// Getting Perticular categories
    function get_unique_cat(){
            global $con;
            if (isset($_GET['cat_id'])) {
                # code...
                $cat_id_un = $_GET['cat_id'];
                
                $sl_sql = "SELECT * FROM products  where cat_id=$cat_id_un";
                            $res_sl = mysqli_query($con,$sl_sql);
                            $count = mysqli_num_rows($res_sl);
                            if ($count==0) {
                                # code...
                                echo "<h2 class='text-center text-danger'>No Stock for this Category";
                            }
                        while ($row = mysqli_fetch_assoc($res_sl)) {
                            # code...   
                            $pr_id = $row['product_id'];
                            $pr_title = $row['product_title'];
                            $pr_desc = $row['product_desc'];
                            
                            $pr_cat_id = $row['cat_id'];
                            $pr_br_id = $row['brand_id'];
                            $pr_img1 = $row['product_img1'];
                            $pr_price = $row['product_price'];
                            echo "
                            
                                <div class='col-md-4 mb-2'>
                                    <div class='card' style='width: 20rem; display:inline-block;'>
                                        <img class='card-img-top' src='admin_area/pr_imgs/$pr_img1' alt='Card image cap'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$pr_title</h5>
                                            <p class='card-text '>Price :- $pr_price/-</p>
                                            <p class='card-text'>". substr($pr_desc, 0, 100). "...</p>
                                            <a href='index.php?add_to_cart=$pr_id' class='btn btn-primary'>Add to Cart</a>
                                            <a href='product_details.php?product_id=$pr_id' class='btn btn-success'>View More</a>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
            }
                    
    }
}
// Getting Perticular categories
if (!function_exists('get_unique_brand')) {
function get_unique_brand(){
    global $con;
    if (isset($_GET['brand_id'])) {
        # code...
        $br_id_un = $_GET['brand_id'];
        
        $sl_sql = "SELECT * FROM products  where brand_id=$br_id_un";
                    $res_sl = mysqli_query($con,$sl_sql);
                    $count = mysqli_num_rows($res_sl);
                    if ($count==0) {
                        # code...
                        echo "<h2 class='text-center text-danger'>No Stock for this Brand";
                    }
                    
                   while ($row = mysqli_fetch_assoc($res_sl)) {
                    # code...   
                    $pr_id = $row['product_id'];
                    $pr_title = $row['product_title'];
                    $pr_desc = $row['product_desc'];
                    
                    $pr_cat_id = $row['cat_id'];
                    $pr_br_id = $row['brand_id'];
                    $pr_img1 = $row['product_img1'];
                    $pr_price = $row['product_price'];
                    echo "
                    
                        <div class='col-md-4 mb-2'>
                            <div class='card' style='width: 20rem; display:inline-block;'>
                                <img class='card-img-top' src='admin_area/pr_imgs/$pr_img1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$pr_title</h5>
                                    <p class='card-text '>Price :- $pr_price/-</p>
                                    <p class='card-text '>". substr($pr_desc, 0, 100). "...</p>
                                    <a href='index.php?add_to_cart=$pr_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$pr_id' class='btn btn-success'>View More</a>
                                </div>
                            </div>
                        </div>
                    ";
                   }
    }
                    
    }


}
if (!function_exists('getbrands')) {
    function getbrands(){
     // select brands
     global $con;
     $sql_sl="Select * from brand";
     $res_sl= mysqli_query($con,$sql_sl);
     while($row_data = mysqli_fetch_assoc($res_sl)){
         $br_title = $row_data['brand_title'];
         $br_id = $row_data['brand_id'];
         echo "                <li class='nav-item m-2 d-flex justify-content-center '>
         <a href='unique_br_cat.php?brand_id=$br_id' style='width: 70%;' class='nav-link  bg-black border rounded text-light '>$br_title</a>
     </li>";
    }
}
}


if (!function_exists('getcategories')) {
    function getcategories(){
        global $con;

        // select brands
        $sql_sl="Select * from categories";
        $res_sl= mysqli_query($con,$sql_sl);
        while($row_data = mysqli_fetch_assoc($res_sl)){
            $cat_title = $row_data['cat_title'];
            $cat_id = $row_data['cat_id'];
            echo "<li class='nav-item m-2 d-flex justify-content-center'>
            <a href='unique_br_cat.php?cat_id=$cat_id' style='width:70%' class='nav-link bg-black border rounded text-light '>$cat_title</a>
        </li>";
        }
    }
}

if (!function_exists('search_product')) {
// Search products  
    function search_product(){
        global $con;
        if (isset($_GET['search'])) {
            # code...
            $user_sr_data = $_GET['search_data'];
        
            # code...
        
                    $search_sql = "SELECT * FROM products where product_kw like '%$user_sr_data%' ";
                    $res_sl = mysqli_query($con,$search_sql);
                    
                while ($row = mysqli_fetch_assoc($res_sl)) {
                    # code...   
                    $pr_id = $row['product_id'];
                    $pr_title = $row['product_title'];
                    $pr_desc = $row['product_desc'];
                    
                    $pr_cat_id = $row['cat_id'];
                    $pr_br_id = $row['brand_id'];
                    $pr_img1 = $row['product_img1'];
                    $pr_price = $row['product_price'];
                    echo "
                    
                        <div class='col-md-4 mb-2'>
                            <div class='card' style='width: 20rem; display:inline-block;'>
                                <img class='card-img-top' src='admin_area/pr_imgs/$pr_img1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$pr_title</h5>
                                    <p class='card-text '>Price :- $pr_price/-</p>
                                    <p class='card-text'>". substr($pr_desc, 0, 100). "...</p>
                                    <a href='index.php?add_to_cart=$pr_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='#' class='btn btn-success'>View More</a>
                                </div>
                            </div>
                        </div>
                    ";
                }
        }
    }             
}
if (!function_exists('view_details')) {
// View Details 
    function view_details(){
        global $con;
        if(isset($_GET['product_id'])){
                if (!isset($_GET['cat_id'])) {
                    # code...
                    if (!isset($_GET['brand_id'])) {
                    
                    # code...
                    $pr_id = $_GET['product_id'];
                            $sl_sql = "SELECT * FROM products WHERE product_id=$pr_id ";
                            $res_sl = mysqli_query($con,$sl_sql);
                            
                        while ($row = mysqli_fetch_assoc($res_sl)) {
                            # code...   
                            $pr_id = $row['product_id'];
                            $pr_title = $row['product_title'];
                            $pr_desc = $row['product_desc'];
                            
                            $pr_cat_id = $row['cat_id'];
                            $pr_br_id = $row['brand_id'];
                            $pr_img1 = $row['product_img1'];
                            $pr_img2 = $row['product_img2'];
                            $pr_img3 = $row['product_img3'];
                            $pr_price = $row['product_price'];
                            echo "
                            <div class='row container-fluid mt-5   '>
                            <div class='col-md-2 '></div>
                            <div class='col-md-8  d-flex justify-content-center'>
                            <div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel' style='width:100% ; '> 
                            <div class='carousel-inner' >
                                <div class='carousel-item active'>
                                    <img src='admin_area/pr_imgs/$pr_img1' class='d-block m-auto w-auto' alt='...' style='height:30rem'>
                                </div>
                                <div class='carousel-item'>
                                    <img src='admin_area/pr_imgs/$pr_img2' class='d-block  m-auto w-auto' alt='...' style='height:30rem'>
                                </div>
                                <div class='carousel-item'>
                                    <img src='admin_area/pr_imgs/$pr_img3' class='d-block  m-auto w-auto ' alt='...' style='height:30rem'>
                                </div>
                            </div>
                            <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls'
                            data-bs-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true' style='filter: invert(100%);'></span>
                                <span class='visually-hidden'>Previous</span>
                            </button>
                            <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls'
                            data-bs-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true' style='filter: invert(100%);'></span>
                                <span class='visually-hidden'>Next</span>
                            </button>
                            
                            </div>
                            </div>
                            
                            <div class='mt-5 text-center'>
                            <h1 class='mb-5'>$pr_title</h1>
                            <h3>Price :- $pr_price/-</h3>
                            <p>$pr_desc</p>
                            <a href='index.php?add_to_cart=$pr_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='index.php' class='btn btn-primary'>Go Home</a>
                            
                            
                            
                            
                        
                        </div>
                            ";
                            
                        }
                    }       
            }         
        }
    }
}
if (!function_exists('getIPAddress')) {
// GEt IP ADdress Function 
    function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        //whether ip is from the remote address  
            else{  
                    $ip = $_SERVER['REMOTE_ADDR'];  
            }  
            return $ip;  
        }  
}
if (!function_exists('cart')) {
// Cart Details Function
    function cart(){
            if (isset($_GET['add_to_cart'])) {
                global $con;
                $ip = getIPAddress(); // ::1
                $get_pr_id = $_GET['add_to_cart'];
                $sql= "SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id = $get_pr_id ";
                $res = mysqli_query($con,$sql);
                $num_rows = mysqli_num_rows($res);
                if ($num_rows>0) {
                    echo "<script>alert('This item is already in cart');
                    window.open('index.php','_self');
                    
                    </script>";
                    
                }else{
                    $insert_qry = "INSERT INTO `cart_details` (product_id,ip_address,quantity)
                                                VALUES ($get_pr_id,'$ip',1)
                            ";
                            $res = mysqli_query($con,$insert_qry);
                        if ($res) {
                            # code...
                            echo "<script>
                            alert('This item is added in cart');
                            window.open('index.php','_self');
                            </script>";
                        }else{
                            echo "<script>
                            alert('Something went wrong');
                            window.open('index.php','_self');
                            </script>";

                        }

                }
                
                
            }
    }
}

if (!function_exists('cart_item')) {
// Function to get cart item numbers
    function cart_item(){
        if (isset($_GET['add_to_cart'])) {

            global $con;
            $ip = getIPAddress(); // ::1
            $sql= "SELECT * FROM `cart_details` WHERE ip_address='$ip'  ";
            $res = mysqli_query($con,$sql);
            $count_items = mysqli_num_rows($res);
        }else{
            
            global $con;
            $ip = getIPAddress(); // ::1
            $sql= "SELECT * FROM `cart_details` WHERE ip_address='$ip'  ";
            $res = mysqli_query($con,$sql);
            $count_items = mysqli_num_rows($res);
        }
        echo $count_items;
        
    }
}
if (!function_exists('get_user_order_detail')) {
// GEt user order {}
function get_user_order_detail(){
    // echo "hello";
    global $con;
    $uid = $_SESSION['id'];
    $get_details = "SELECT * FROM `users` WHERE u_id=$uid";
    $result_detail = mysqli_query($con,$get_details);
    while ($row = mysqli_fetch_array($result_detail)) {
        $user_id = $row['u_id'];
        // echo $user_id;
        if(!isset($_GET['edit_acc'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_acc'])){
                    $get_orders = "SELECT *  FROM `orders`  WHERE u_id=$user_id AND order_status='pending'";
                    $result_order = mysqli_query($con,$get_orders);
                    $row_count = mysqli_num_rows($result_order);
                    if ($row_count>0) {
                        echo '<p class="card-text">You have '.$row_count.' pending orders.</p>
                        <a href="profile.php?orders" class="btn btn-primary">View Orders</a>';
                    }
                    else {
                        echo '<p class="card-text">You have zero pending orders.</p>
                        <a href="../index.php" class="btn btn-primary">Explore Product</a>';
                        
                    }
                }
            }
        }
    }
}   
}
    ?>