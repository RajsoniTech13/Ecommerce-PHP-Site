
<div class='container text-center'>
    <h1>All Users</h1>
    <table class='table table-striped'>
        <thead>
            <tr>

                <th>Sno</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
              
                <th>Address</th>
                <th>Delete</th>
    
            </tr>
        </thead>
        <?php

                $sql = "SELECT *  FROM users";
                $result = mysqli_query($con, $sql);
                // Fetch Data
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['u_id'];
                        $email = $row['u_email'];
                        $username = $row['u_username'];
                        $mob = $row['u_mobile'];
                        $address = $row['u_address'];
                        $profile_pic = $row['u_image'];
                        $profile_pic = ltrim($profile_pic);


  

                    if($id!=1){
                    
                        echo "
        
                        <tbody>
                                <tr>
                                    <td><img src='../users_area/users/$profile_pic'  class='employee-photo' style='
                                    width: 50px;
                            height: 50px;
                            object-fit: cover;
                            border-radius: 50%;'></td>
                                    <td>$id</td>
                                    <td>$username</td>
                                    <td>$email</td>
                                    <td>$mob</td>
                                    
                             
                                    <td>$address</td>
                                 
                                   
                                     
                                    ";
                    
                                echo "
                                <td>
                                    <form  method='post'>
                                        <input type='hidden' name='id' value='$id'>
                                        <button type='submit' class='btn btn-dark'>Delete Record</button>
                                    </form>
                                    </td>
                                </tr>
                        
                        ";
  

                    }
                }
        if($_SERVER["REQUEST_METHOD"] == "POST"){

// $iddl = $_POST['id']; 

           
                $sql = "DELETE FROM user WHERE sno=$id"; 
               
                $res = mysqli_query($con,$sql);
            
                if ($res==TRUE) {
                    # executed
                
                echo "<script>alert('Record Deleted Successfully');
                =
                </script>
                ";
                    
                }
                else{
                    
                    echo "<script>alert('Record Deleted Fail..!');
                    
                    </script>
                    ";
                    
                    
                }
            }
        }

  
?>

        </tbody>
    </table>
</div>