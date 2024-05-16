<?php 

echo "<pre>";





require_once("./schooldb_conn.php");



$studentName = $_POST['studentName'];
$birthday = $_POST['birthday'];
$genderId = $_POST['genderId'];

//sql statement
$sql = "INSERT INTO students(name,birthday,gender_id) VALUES ('$studentName','$birthday','$genderId') ";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:student-list.php");
}