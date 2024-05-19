<?php 

echo "<pre>";
require_once("./schooldb_conn.php");



$studentId = $_POST['studentId'];
$batchId = $_POST['batchId'];

//sql statement
$sql = "INSERT INTO enrollments(student_id,batch_id) VALUES ($studentId, $batchId) ";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:enrollement-list.php");
}