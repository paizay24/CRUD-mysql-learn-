<?php 

echo "<pre>";

$conn = mysqli_connect("localhost","pzo","pzo124","wad_shop");

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
 echo "Connected successfully";

$product = $_POST['product'];
$price = $_POST['price'];
$stock = $_POST['stock'];

//sql statement
$sql = "INSERT INTO products(name,price,stock) VALUES ('$product',$price,$stock) ";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:index.php");
}