<?php 
require_once('./schooldb_conn.php');


$title = $_POST['title'];
$short = $_POST['short'];
$fee = $_POST['fee'];
$id = $_POST['id'];

$sql = "UPDATE courses SET title='$title', short='$short',fee=$fee WHERE id = $id";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:course-create.php");
}