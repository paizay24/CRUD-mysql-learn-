
<?php 
require_once('./customersdb_con.php');

// print_r($_GET);

$id = $_GET['row_id'];

$sql= "DELETE FROM customers WHERE id = $id ";

$query = mysqli_query($conn,$sql);

if($query){
      header("Location:customers-lists.php");
}

