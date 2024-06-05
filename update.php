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
?>