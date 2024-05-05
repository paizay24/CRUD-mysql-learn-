<?php 




require_once('./schooldb_conn.php');

// print_r($_POST);

// die();

$id = $_POST['id'];
$name = $_POST['name'];
$courseId = $_POST['courseId'];
$date = $_POST['date'];
$time = $_POST['time'];
$limit = $_POST['limit'];
$register = isset($_POST['is_register_open'])?$_POST['is_register_open']:0;

$sql = "UPDATE batches SET name='$name', course_id=$courseId,start_date='$date',start_time = '$time', is_register_open = $register,student_limit =$limit WHERE id = $id";


$query = mysqli_query($conn,$sql);

if($query){
      header("Location:batch-create.php");
}