<?php

session_start();
require '../private/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../extra/tx_history.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="../extra/js/jquery.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <!-- Top Navigation Bar -->
    <?php

       require 'topbar.php';
       
       
       
       
       ?>

    <section class="main">
        
       <?php

       require 'menubar.php';
       
       
       
       
       ?>

        <!-- Main-Content page -->
        <div class="main--content">
            <!-- Overview section -->
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">History</h2>
                    <select name="date" id="date" class="dropdown">
                        <option value="today">Today</option>
                        <option value="lastweek">Last Week</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="lastyear">Last Year</option>
                        <option value="alltime">All Time</option>
                    </select>
                </div>
                
            </div>
            
            <!-- Transaction history section -->
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">Payment History</h2>
                    <a href="../public/pay_fees.php">
                        <button class="add"><i class="ri-coin-line"></i>Make Payment</button>
                    </a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Academic Year</th>
                                <th>Date</th>
                                                    
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                           <?php
                            $id = $_SESSION['id'];
                                $sql = "SELECT transactions.amount, transactions.date_time, payment_methods.payment_method, transactions.transaction_id, payment_status.payment_status 
                                    FROM uenr_pay.transactions 
                                    inner join payment_methods on payment_methods.id = transactions.payment_method_id
                                    inner join payment_status on payment_status.id = transactions.status
                                    inner join students on students.id = transactions.student_id
                                    where students.id = '$id';";

                                $query = mysqli_query($conn, $sql);
                        
                                $i = 1;
                            $r = mysqli_num_rows($query);
                            if ($r < 1){
                                
                            }else{
                                
                                
                                while($row = mysqli_fetch_assoc($query)){
                                    ?>
                                    
                                    <tr>
                                    
                                        <td><?php echo $i; ?></td>
                                        <td>2021/2022</td>
                                        <td><?php echo $row['date_time']; ?></td>
                                        <td><?php echo $row['amount']; ?></td>

<!--
                                        <td>1000</td>
                                        <td>2070</td>
                                        <td>1070</td>
-->

                                        <td><?php echo $row['payment_method']; ?></td>
                                        <td><?php echo $row['transaction_id']; ?></td>
                                        <td class="<?php echo $row['payment_status']; ?>"><?php echo $row['payment_status']; ?></td>
                                    </tr>
                                    
                                    <?php
                                    $i++;
                                    
                                }
                            }
                        
                        
                        
                        ?>
                           
                            
                            
                            
                                                                                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </section>
   
    <script src="../private/assets/js/main.js"></script>
   
</body>
<

</html>