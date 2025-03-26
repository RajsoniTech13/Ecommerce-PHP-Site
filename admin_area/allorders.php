<?php
// session_start();



?>
<div class='container text-center'>
    <h1>Orders</h1>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>SI no</th>
                <th>Amount Due</th>
                <th>Total Product</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Delete</th>
              
              
      
            </tr>
        </thead>
        <?php

                $sql = "SELECT *  FROM orders ";
                $result = mysqli_query($con, $sql);
                // Fetch Data
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $o_id = $row['order_id'];
                        $amount = $row['amount'];
                        $invoice_no = $row['invoice_no'];
                        $total = $row['total_products'];
                        $order_date = $row['order_date'];
                        $order_status= $row['order_status'];
                        if ($order_status=="pending") {
                            $order_status="Incomplete";
                        }else{
                            $order_status="Complete";
                            
                        }
                        
                        
                    
                        echo "
        
                        <tbody>
                                <tr>
                           
                                
                                    <td>$no</td> 
                                    <td>$amount</td>
                                    <td>$invoice_no</td>
                                    
                                    <td>$total</td>
                                    <td>$order_date</td>
                                    <td>$order_status</td>
                                    
                              
                                    <td><a href='index.php?delete_order=$o_id'   ><button class='bg-black  text-white mx-2 px-4  py-2 border-0 rounded mt-1'>Remove </button></a> 
                                    </tr>
                                     
                                    ";
                          
  
                    $no+=1;
                    }
                }
            
 ?>
 
                    </td>
        </tbody>
    </table>
</div>