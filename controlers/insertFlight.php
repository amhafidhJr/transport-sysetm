<?php 
    require_once("connection.php");

    try {
        
        if(isset($_POST['insertFlight'])) {

        
            $var_airline = $_POST['airline'];
            $var_plane_no  = $_POST['planeNo'];

            $var_depature_location = $_POST['depature'];
            $var_arrival_location = $_POST['arrival'];

            $var_depature_time = $_POST['d_time'];
            $var_arrival_time  = $_POST['a_time'];

            $var_seat_no = $_POST['seats'];
            $var_price = $_POST['price'];

            $datetime = date("m/d/y G.i:s<br>", time());

            $sqlLoginInsert = "INSERT INTO depature_table VALUES (?,?,?)";
            $statementLogin = $conn->prepare($sqlLoginInsert);
            $resultLogin = $statementLogin->execute(array(null, $var_depature_location, $var_arrival_location));
           

           
            if($resultLogin == true) {
                $selectIdQuery = "SELECT * FROM depature_table";
                $statementID = $conn->prepare($selectIdQuery);
                $statementID->execute();
                $result = $statementID->fetchAll();

                if($result == true) {
                    foreach ($result as $row) {
                        $dept_id = $row[0];
                    }

                    $SqlQuery = "INSERT INTO flight_list VALUES (?,?,?,?,?,?,?,?,?)";
                    $statement = $conn->prepare($SqlQuery);
                    $result = $statement->execute(array(null, $var_airline, $dept_id, $var_plane_no, $var_depature_time, $var_arrival_time, $var_seat_no, $var_price, $datetime));
        
        
                    
                        if($result == true) {
                        ?>
                        <script>
                            alert("Added Successefully");
                           window.location.href = "../flight.php";
                        </script>
                        <?php
                    }
                }
            }

        }

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>