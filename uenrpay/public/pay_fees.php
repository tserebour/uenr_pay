<?php

session_start();
require '../private/conn.php';
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../extra/pay_fees.css">
    <link rel="stylesheet" href="../extra/css/bootstrap.min.css">
    <link rel="stylesheet" href="../extra/fontawesome-free-5.15.4-web/css/all.css">
    <script defer src="../extra/fontawesome-free-5.15.4-web/js/all.js"></script>
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
                    <h2 class="section--title">Payment</h2>
                    
                    
                </div>

            </div>
            
                

                    <!-- MOBILE money PAYMENT SECTION CARD  -->

                    <form action="../private/payment_val.php" method="post">

                    <div class="padding" id="momo_form">
                        <div class="row">
                            <div class="container-fluid d-flex justify-content-center">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="row">
                                                <div class="col-md-9">
                                                    <span>MOBILE MONEY PAYMENT</span>

                                                </div>

                                                <!-- <div class="col-md-6">

                                                    <img src="./final_pipay/extra/img/mtn.svg" style="width: 45px; height: 25px;">
                                                    <img src="./final_pipay/extra/img/vodafone.svg" style="width: 45px; height: 25px;">
                                                    <img src="./final_pipay/extra/img/airtel.svg" style="width: 45px; height: 25px;">

                                                </div> -->

                                            </div>

                                        </div>
                                        <div class="card-body" style="height: 250px">

                                        <div class="form-group" style="margin:7px;">
                                        <select name="payment_method" id="date" class="dropdown">
                                                    <option value="">Select Payment Method</option>
                                                    <?php

                                                    $sql = "SELECT * FROM payment_methods;";
                                                    $query = mysqli_query($conn, $sql);

                                                    while ($row = mysqli_fetch_assoc($query)) { ?>


                                                        <option class="payment_option" value="<?php echo $row['id']; ?>"><?php echo $row['payment_method']; ?></option>

                                                    <?php

                                                    }

                                                    ?>
                                        </select>
                                            </div>

                                            <div class="form-group" style="margin:7px;">
                                                <label for="cc-number" class="control-label">MOBILE NUMBER</label>
                                                <input required name="phone" id="cc-number" type="tel" class="input-lg form-control cc-number"  placeholder="Enter Valid Mobile Money Number" >
                                            </div>

                                            <div class="form-group" style="margin:7px;">
                                                <label for="numeric" class="control-label">AMOUNT (GHC)</label>
                                                <input required name="amount" type="tel" class="input-lg form-control cc-number" placeholder="Enter amount" >
                                            </div>
                                            
                                            <div id="trx" class="form-group" style="margin:7px;">
                                                <label for="numeric" class="control-label">Enter the transaction ID from your phone</label>
                                                <input required name="trx" type="text" class="input-lg form-control cc-number" placeholder="Enter trx" >
                                            </div>

                                            

                                            <div class="form-group text-center" style="margin:20px;">
                                                <button id="momo_pay_button" name="pay" type="button" class="btn btn-success col-sm-9 col-md-6" style="font-size: .8rem; font-weight:500;">MAKE PAYMENT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>

                     <form action="../private/payment_val.php" method="post">
                    CARD PAYMENT SECTION CARD  

                    <div class="padding" id="card_form">
                        <div class="row">
                            <div class="container-fluid d-flex justify-content-center">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="row">
                                                <div class="col-md-9">
                                                    <span>CREDIT/DEBIT CARD PAYMENT</span>

                                                </div>

                                                <!-- <div class="col-md-6 text-right" >
                                                    <img src="https://img.icons8.com/color/36/000000/visa.png">
                                                    <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                                                </div> -->

                                            </div>

                                        </div>
                                        <div class="card-body" style="height: 400px">
                                            <div class="form-group" style="margin:5px;">
                                                <label for="cc-number" class="control-label">CARD NUMBER</label>
                                                <input name="card_number" id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;" required>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin:5px;">
                                                        <label for="cc-exp" class="control-label">CARD EXPIRY</label>
                                                        <input name="expiry_date" id="cc-exp" type="date" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="&bull;&bull; / &bull;&bull;" required>
                                                    </div>


                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin:5px;">
                                                        <label for="cc-cvc" class="control-label">CARD CVC</label>
                                                        <input name="cvv" id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="&bull;&bull;&bull;&bull;" required>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-group" style="margin:5px;">
                                                <label for="numeric" class="control-label">CARD HOLDER NAME</label>
                                                <input name="card_name" type="text" class="input-lg form-control">
                                            </div>

                                            <div class="form-group" style="margin:5px;">
                                                <label for="numeric" class="control-label">AMOUNT (GHC)</label>
                                                <input name="amount_" type="text" class="input-lg form-control cc-number" placeholder="Enter amount" required>
                                            </div>


                                            

                                            <div class="form-group text-center" style="margin: 20px;">
                                                <button name="pay_with_card" value="MAKE PAYMENT" type="submit" class="btn btn-success col-sm-9 col-md-6" style="font-size: .8rem; font-weight:500;">Make Payment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form> 


        </div>
        </div>
      
    </section>

    <script src="../private/assets/js/main.js"></script>
    <script src="../private/assets/js/feepayment.js"></script>
</body>

</html>