
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
    


 
    

<!-- Cart table      -->
<div class="container " style="margin-top:7%;  margin-bottom: 9%;">
    <div class="row">
      
      
            <table class="table table-bordered text-center">
                
                <!-- php Code -->
                <?php
                        //   global $con;    
                        
                     
                   
                            # code...


                            ?>
                            <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Totsl Sold</th>
                        <th>Price</th>
                        <th>Status</th>
            
                        <th>Remove</th>
                    </tr>
                </thead>
                
                
                <tbody>
    <?php
  
        $sl_pr = "SELECT * FROM `products` ";
        $sl_res = mysqli_query($con, $sl_pr);
        if (mysqli_num_rows($sl_res)>0) {
                while ($row = mysqli_fetch_assoc($sl_res)) {
                    $product_id = $row['product_id'];
                    $product_price = array($row['product_price']);
                    $price_table = $row['product_price'];
                    $product_title = $row['product_title'];
                    $product_img1 = $row['product_img1'];
                
        

                    // Get the current quantity for the item

            

                    ?>

                    <tr>
                        <td><?php echo $product_id; ?></td>
                        <td><?php echo $product_title; ?></td>
                        <td><img src='pr_imgs/<?php echo $product_img1; ?>' class='employee-photo cart-img'></td>
                        <td><?php echo $price_table; ?>/-</td>
                        
                            
                            <td>0</td>
                            <td>true</td>
                        
                
                        <td><a href="index.php?delete_product=<?php echo $product_id; ?>"   ><button class="bg-black  text-white mx-2 px-4  py-2 border-0 rounded mt-1">Remove </button></a> 
                    </td>
                    </tr>
            <?php
                }    
            
            ?>
</tbody>



</table>
            <!-- sub total -->
            <div class="d-flex m-auto">
      

     
       
            <!-- <a href="index.php"><button class="bg-info text-white px-4 py-3 mx-2 border-0 mt-1">Continue Shopping</button></a> -->
            
            
        </div>
        </div>
    </div>
<?php

}else{
    echo ' <h2 class="text-danger text-center">Cart is Empty</h2>';
  
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