<?php 
require_once('./customersdb_con.php');
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

$sql = "UPDATE customers SET name='$name',phone=$phone,gender='$gender' WHERE id = $id";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:customers-lists.php");
}

