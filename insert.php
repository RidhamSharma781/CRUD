<?php
include 'connect.php';

extract($_POST);

if(isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['phoneSend']) && isset($_POST['citySend'])){
    $sql = "insert into `user` (name,email,phone,city) values ('$nameSend','$emailSend','$phoneSend','$citySend')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "Success";
    }
}

?>