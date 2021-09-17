<?php 


    $SERVER = "localhost";
    $DATABASE = "flight_booking_db";
    $USERNAME = "root";
    $PASSWORD = "";

    try {
        $conn = new PDO("mysql:host=$SERVER;dbname=$DATABASE", $USERNAME, $PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

   

?>