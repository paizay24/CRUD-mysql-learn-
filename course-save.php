<?php 

echo "<pre>";





require_once("./schooldb_conn.php");

$title = $_POST['title'];
$short = $_POST['short'];
$fee = $_POST['fee'];

//sql statement
$sql = "INSERT INTO courses(title,short,fee) VALUES ('$title','$short',$fee) ";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:course-create.php");
}