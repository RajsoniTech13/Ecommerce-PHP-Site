<!DOCTYPE html>
<html lang="en">
<?php
session_start();
 include('../include/connect.php');
 include('../functions/common_functions.php');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- bootstrap css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Profile Dashboard</title>
</head>

<body>
<nav id="navbar" class="navbar navbar-expand-lg navbar-light text-center text-white p-4 border-0 rounded">
    <div class="container-fluid">
        <a class="navbar-brand title text-white" href="#">ICart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-white"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../displayall.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup> </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="#">Total Price: 852rs </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="logout.php">Log out</a>
                </li>
                <li class="nav-item">
                    </li>
                    
                </ul>
                <h4><?php echo $_SESSION['username'];  ?></h4>
           
        </div>
    </div>
</nav>
  <div class="container " style="margin-top:6%;">
    <h1 class="text-center mb-5">Profile Dashboard</h1>
    <?php  
    
    $user = $_SESSION['id'];
    $user_img_q = "SELECT *  FROM `users` WHERE u_id = '$user'";
    $res_user = mysqli_query($con,$user_img_q);
    $row = mysqli_fetch_array($res_user);
    $user_img = $row['u_image'];

    ?>
      
<div class="row d-flex " >
<div class="col-md-3">
    <h3 class="bg-black text-white text-center p-2">Rajs Profile</h3>
    <img src="users/<?php echo $user_img ?>" alt="" style="width:100%; height:80%;">
</div>
    <div class="col-md-9 ">
        
   
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pending Orders</h5>
            <?php get_user_order_detail();   ?>
            
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Account</h5>
            <p class="card-text">Update your account information.</p>
            <a href="edit_acc.php?edit_acc" class="btn btn-primary">Edit Account</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Let's Fun</h5>
            <p class="card-text">something is missing?</p>
            <a href="index.php" class="btn btn-primary">Go To shop</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Delete Account</h5>
            <p class="card-text">Permanently delete your account.</p>
            <a href="profile.php?delete_acc" class="btn btn-danger">Delete Account</a>
          </div>
        </div>
      </div>
    </div>
    </div>
  
</div>  
<div class="container d-flex justify-content-center" style="margin-top:8%;margin-bottom:8%">
  <?php
    if (isset($_GET['orders'])) {
      # code...
      include('users_order.php');
    }
  ?>
</div>
  </div>
  <div class="fixed-bottom">
    <?php
   include('../include/footer.php')
   ?>
   </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
