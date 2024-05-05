<?php 


require_once("./schooldb_conn.php");
$id = $_GET['row_id'];

$sql = "DELETE FROM batches WHERE id = $id ";
$query = mysqli_query($conn,$sql);

if($query){
      header("Location:batch-create.php");
}
