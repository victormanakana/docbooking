<?php
    require('connect.php');

    $patientCode = $_POST['patientCode'];
    $bookingDate = $_POST['bookingDate'];
    $booking_status = $_POST['booking_status'];


    $query = "INSERT INTO booking(`patientCode`, `bookingDate`, `booking_status`)
                VALUES('$patientCode', '$bookingDate', '$booking_status')";
    $result = mysqli_query($db, $query);

    echo '<script>location.replace("/index.php")</script>';
    
?>