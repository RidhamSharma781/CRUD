<?php
include 'connect.php';
extract($_POST);

if(isset($_POST['updateSend'])){
    $id = $_POST['updateSend'];
    $sql = "select * from `user` where id='$id'";
    $result = mysqli_query($con,$sql);
    $response = array();
    while($row = mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo  json_encode($response);
}else{
    $response['status'] = 200;
    $response['message'] = 'Data not Found';
}

// For updating data 
if(isset($_POST['updateId'])){
    $id = $_POST['updateId'];
    $name = $_POST['updateName'];
    $email = $_POST['updateEmail'];
    $phone = $_POST['updatePhone'];
    $city = $_POST['updateCity'];

    $sql = "update `user` set name='$name',email='$email',phone='$phone',city='$city' where id='$id'";
    $result = mysqli_query($con,$sql);
}
?>