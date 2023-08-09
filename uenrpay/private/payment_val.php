<?php

session_start();
require 'conn.php';

$student_id = $_SESSION['id'];
$transaction_id = time().'_'.$student_id;

if(isset($_POST['pay'])){

    $payment_method = $_POST['payment_method'];
    

    
        
        
        $phone = $_POST['phone'];
        $momo_trans_id = $_POST['trx'];
        $amount = $_POST['amount'];

        
        
    
        
//        $_SESSION['payment'] = [
//            "phone" => $phone,
//            "amount" => $amount,
//            "student_id" => $student_id,
//            "payment_method" => $payment_method,
//        ];

        
        

         $sql = "INSERT INTO `uenr_pay`.`transactions` (`transaction_id`, `student_id`, `date_time`, `amount`, `payment_method_id`, `number`, `momo_trans_id`, `status`) 
                                                VALUES ('$transaction_id', '$student_id', now(), '$amount', '$payment_method', '$phone', '$momo_trans_id', '2');";


        
         $query = mysqli_query($conn, $sql);
    
    
    

        if($query){
            header("Location: /uenrpay/public/pay_fees.php?error=success");
            exit();
        }
    
    
            unset($_POST['pay']);
        
        
            
        




    




   


}elseif(isset($_POST['pay_with_card'])){
    
        
        $card_name = $_POST['card_name'];
        $card_number = $_POST['card_number'];
        $cvv = $_POST['cvv'];
        $expiry_date = $_POST['expiry_date'];
        $amount = $_POST['amount_'];
        


        $sql = "INSERT INTO `uenr_pay`.`transactions` (`transaction_id`, `student_id`, `date_time`, `amount`, `payment_method_id`, `card_name`, `number`, `card_expiry_date`, `cvv`, `status`) 
                                                VALUES ('$transaction_id', '$student_id', now(), '$amount', 8, '$card_name', '$card_number', '$expiry_date', '$cvv', '2');";
        
        $query = mysqli_query($conn,$sql);

        if($query){
            header("Location: /uenrpay/public/pay_fees.php?error=success");
            exit();
        }
    
    unset($_POST['pay_with_card']);
    
}


















?>