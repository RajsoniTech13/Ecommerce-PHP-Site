
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
                        <th>brand Id</th>
                        <th>brand Title</th>
                        
            
                        <th>Remove</th>
                    </tr>
                </thead>
                
                
                <tbody>
    <?php
  
        $sl_pr = "SELECT * FROM `brand` ";
        $sl_res = mysqli_query($con, $sl_pr);
        if (mysqli_num_rows($sl_res)>0) {
                while ($row = mysqli_fetch_assoc($sl_res)) {
                    $brand_id = $row['brand_id'];
             
                    $brand_title = $row['brand_title'];
             
                
        

                    // G
                    ?>

                    <tr>
                        <td><?php echo $brand_id; ?></td>
                        <td><?php echo $brand_title; ?></td>
        
                        
                
                        <td><a href="index.php?delete_brand=<?php echo $brand_id; ?>"   ><button class="bg-black  text-white mx-2 px-4  py-2 border-0 rounded mt-1">Remove </button></a> 
                    </td>
                    </tr>
            <?php
                }    
            
            ?>
</tbody>



</table>
            <!-- sub total -->
         
        </div>
    </div>
<?php

}else{
    echo ' <h2 class="text-danger text-center">Empty Field</h2>';
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