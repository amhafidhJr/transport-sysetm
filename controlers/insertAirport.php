<?php 
    require_once("connection.php");

    try {
        
        if(isset($_POST['inserAirport'])) {

        
            $var_airport_name = $_POST['airportName'];
            $var_airport_location  = $_POST['airportLocation'];
            

            $SqlQuery = "INSERT INTO airport_list VALUES (?,?,?)";
            $statement = $conn->prepare($SqlQuery);
            $result = $statement->execute(array(null, $var_airport_name, $var_airport_location));


                if($result == true) {
                        ?>
                        <script>
                            alert("Added Successefully");
                           window.location.href = "../airport.php"; 
                        </script>
                        <?php
                }

        }

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>