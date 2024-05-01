<?php

require_once('./customersdb_con.php');




$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];



$sql = "INSERT INTO customers (name,phone,gender) VALUES ('$name',$phone,'$gender')";
// echo $sql;
$query = mysqli_query($conn, $sql);

if ($query) {
      header("Location:customers-lists.php");
}
