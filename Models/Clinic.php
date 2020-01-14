<?php 

    class Clinic {

        private $db;

        function __construct()
        {
            $this->db = mysqli_connect('localhost', 'root', '', 'bookingsystem');


        }

        function getTotalPatients()
        {
            $query = "SELECT * FROM patient";
            $result = mysqli_query($this->db, $query);
            
            return mysqli_num_rows($result);
        }

        function getpendingBookings()
        {
            $query = "SELECT * FROM booking";
            $result = mysqli_query($this->db, $query);

            return mysqli_num_rows($result);
        }

        function gettCurrentAppointments()
        {
            $query = "SELECT * FROM booking WHERE bookingDate > CURRENT_DATE";
            $result = mysqli_query($this->db, $query);

            return mysqli_num_rows($result);
        }

        function getCompletedBookings()
        {
            $query = "SELECT * FROM booking";
            $result = mysqli_query($this->db, $query);

            return mysqli_num_rows($result);
        }

        function appointments()
        {
            $query = "SELECT * FROM booking";
            $result = mysqli_query($this->db, $query);

            return mysqli_fetch_array($result);
        }

        function getpatients()
        {
            $query = "SELECT * FROM patient";
            $result = mysqli_query($this->db, $query);

            return $result;
        }

        function __destruct()
        {
            
        }
    }
?>