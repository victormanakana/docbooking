<?php
    require('connect.php');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    $query = "INSERT INTO patient(`name`, `surname`, `email`, `phone`, `address`)
                VALUES('$name', '$surname', '$email', '$phone', '$address')";
    $result = mysqli_query($db, $query);

    echo '<script>location.replace("/index.php")</script>';
    
?>