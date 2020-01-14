<?php
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'bookingsystem');

    $db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>