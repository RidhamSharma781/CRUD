<?php
include 'connect.php';

extract($_POST);
if(isset($_POST['deleteSend'])){
$id = $_POST['deleteSend'];
$sql = "delete from user where id='$id'";
$result = mysqli_query($con,$sql);
}

?>