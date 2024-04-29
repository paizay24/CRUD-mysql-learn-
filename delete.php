<?php 

$conn = mysqli_connect("localhost", "pzo", "pzo124", "wad_shop");

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['row_id'];

$sql = "DELETE FROM products WHERE id = $id ";
$query = mysqli_query($conn,$sql);

if($query){
      header("Location:index.php");
}
