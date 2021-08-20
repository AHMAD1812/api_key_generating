<?php
include "db.php";

header('Content-Type','application/json');

$response=array();

if(isset($_POST['api_key'])){
    $res=mysqli_query($conn,"Select `payment`.`transaction_id` from `payment` INNER JOIN `keys` on `payment`.`id`=`keys`.`id` WHERE keys.api_keys='".$_POST['api_key']."'");
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $response['error']=false;
            $response['massage']="Data Has Been Found SuccessFully";
            $response['transaction_id']=$row['transaction_id'];
            
        }
    }else{
        header('HTTP/1.0 401 Unauthorized');
    }
}else{
    $response['error']=true;
    $response['massage']="Please pass api key";
    $response['transaction_id']=null;
}

echo json_encode($response);

?>