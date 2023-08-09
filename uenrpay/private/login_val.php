<?php


session_start();
require 'conn.php';

if(isset($_POST['login'])){
    
    
    
    
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    
    if(empty($student_id) || empty($password)){
        header("Location: /uenrpay/public/?error=emptyfields");
        exit();
    }else{
        
        $sql = "SELECT * FROM students where student_id = '$student_id';";
        
        $query = mysqli_query($conn, $sql);
        
        $result = mysqli_num_rows($query);
        
        
        if($result > 0){
            
            $row = mysqli_fetch_assoc($query);
            $upassword = $row['password'];
            
            $passwordverify = password_verify($password,$upassword);
//            
//            
            if(!$passwordverify){
                
                
                header("Location: /uenrpay/public/?error=wronginput");
                exit();
                
            }else{
                
                
                $_SESSION['id'] = $row['id'];
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['name'] = $row['firstname'];
                
                
                
                
                
                header("Location: /uenrpay/public/home.php");
                exit();
                
               
            }
//            
        }else{
            header("Location: /uenrpay/public/?error=wronginput1");
            exit();
        }
//        
//        
    }
        
        
    }else{
    
        header("Location: /uenrpay/public/?error");
        exit();
    
    
}










