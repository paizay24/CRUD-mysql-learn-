<?php 
require_once('./productdb_con.php');

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$id = $_POST['id'];

$sql = "UPDATE products SET name='$name',price=$price,stock=$stock WHERE id = $id";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:product-create.php");
}