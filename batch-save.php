<?php



require_once("./schooldb_conn.php");

$name = $_POST['name'];
$courseId = $_POST['courseId'];
$date = $_POST['date'];
$time = $_POST['time'];
$limit = $_POST['limit'];
$register = isset($_POST['is_register_open'])?$_POST['is_register_open']:0;

//sql statement
$sql = "INSERT INTO batches (name, course_id, start_date, start_time, is_register_open, student_limit)
        VALUES ('$name', $courseId, '$date', '$time', $register, $limit)";

// echo $sql;

// die();

$query = mysqli_query($conn, $sql);

if ($query) {
      header("Location:batch-create.php");
}
