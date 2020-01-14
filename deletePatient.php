<?php
include('connect.php');

$id = $_POST['id'];

$query = "DELETE FROM Patient WHERE patientCode = '$id'";
$result = mysqli_query($db, $query);

//echo '<script type="text/javascript">location.href="index.php";</script>';

?>
