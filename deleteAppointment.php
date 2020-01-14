<?php
    $id = $_POST['id'];

    include('connect.php');

    $query = "DELETE FROM `booking` WHERE id = '$id'";
    $result = mysqli_query($db, $query);

    echo '<script type="text/javascript">location.href="index.php";</script>';
?>