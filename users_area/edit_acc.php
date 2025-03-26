<?php  

    session_start();
     include('../include/connect.php');
     include('../functions/common_functions.php');
    
    if (isset($_GET['edit_acc'])) {
        # code...
        $user = $_SESSION['id'];
        // echo $user;
        $sl_Sql = "SELECT * FROM users WHERE u_id= '$user' ";
        $res_user = mysqli_query($con,$sl_Sql);
        $row = mysqli_fetch_assoc($res_user);
        $username = $row['u_username'];
        $user_email = $row['u_email'];
        $user_mob = $row['u_mobile'];
        // echo $user_mob;
        $user_add = $row['u_address'];


        if (isset($_POST['submit'])) {
            # code...
      
            // echo $user
   
            $up_username = $_POST['username'];
            $up_email = $_POST['email'];
            $up_mob = $_POST['contact'];
            // echo $user_mob;
            $up_add = $_POST['u_address'];
            $up_img = $_FILES['u_img']['name'];
            $up_tp_img = $_FILES['u_img']['tmp_name'];
            move_uploaded_file($up_tp_img,"./users/$up_img");
            $update = "UPDATE users SET 
            u_username='$up_username'
            , u_email='$up_email'
            , u_image='$up_img'
            ,u_address='$up_add'
            ,u_mobile='$up_mob'
            WHERE u_id=$u_id";
            $result_update = mysqli_query($con,$update);
            if ($result_update) {
                echo "<script>alert('Updated Successfully ' );
                                        window.location = 'profile.php'
                                        </script>";
                                    }
                                    
        
    
        }
    

    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit Account</title>
</head>
<body>
<div class="container  justify-content-center" style="margin-top: 5%;    width: 30%;">
        <h1>Edit Account</h1>
        <form action="" method="Post" class="mb-2" enctype="multipart/form-data">
            <h5>Username</h5>

            <div class="input-group w-90  mb-3">

                <input type="text" class="form-control " name="username" placeholder="<?php echo $username ?>" aria-label="Username" required>
            </div>
            <h5>Email </h5>

            <input type="email" class="form-control mb-3 " name="email" placeholder="<?php echo  $user_email ?>"   aria-label="Username"
                aria-describedby="basic" required>
           
            <h5>Contact NO</h5>
            
            <input type="text" class="form-control mb-3 " name="contact"  placeholder="<?php echo $user_mob; ?>" aria-label="Username"
            aria-describedby="basic" required>
            
            <h5>image</h5>
            <div class="input-group mb-4 w-100">
                <input type="file" class="form-control" name="u_img" id="profile" placeholder="Enter Profile Picture" autocomplete="off" required>
               
            </div>

            <div class="input-group  mb-3">
                    
                 <textarea name="u_address" id=""  placeholder = "<?php echo $user_add; ?>"  cols="74" rows="10" required></textarea>
            </div>
       


        
            <div class="input-group w-10">

                <input type="submit" class="form-control bg-info p-2 border-0" name="submit" value="Update"
                    aria-label="Submit" aria-describedby="basic-addon1">
                    
                    <!-- <button class="bg-info p-3 border-0" name="insert_cat" >Insert Categories</button> -->
                </div>
                
                
            </form>
            <a href="profile.php"><button class="form-control bg-info p-2 border-0" >Back</button></a>
    
    </div>
</body>
</html>