<?php 
session_start();
include "db.php";
if(strtoupper($_SERVER['REQUEST_METHOD'])=="POST"){
    $payment="not_specified";
    
    if(filter_has_var(INPUT_POST, 'radio3')){
        $payment=$_POST['radio3'];
    }
    $t_id = uniqid();  

    $query="INSERT INTO `payment`(`transaction_id`, `payment_type`, `name`) VALUES ('$t_id','$payment','ahmad')";

    if(mysqli_query($conn,$query)){
        $_SESSION['transfer_payment']="SuccessFully Transfered";
    }else{
        $_SESSION['transfer_payment']="Payment Transfer Error";
    }

    $key = hash("sha256", $t_id);

    $query="INSERT INTO `keys`(`api_keys`) VALUES ('$key')";

    if(mysqli_query($conn,$query)){
        $_SESSION['api_key']=$key;
    }else{
        $_SESSION['api_key']="Not Generated Error occured";
    }

    header("Location:index.php");
}
?>