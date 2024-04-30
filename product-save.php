<?php 

echo "<pre>";

require_once("./productdb_con.php");

$product = $_POST['product'];
$price = $_POST['price'];
$stock = $_POST['stock'];

//sql statement
$sql = "INSERT INTO products(name,price,stock) VALUES ('$product',$price,$stock) ";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:product-create.php");
}