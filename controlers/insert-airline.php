<?php 
    require_once("connection.php");

    try {
        
        if(isset($_POST['insertAirline'])) {


            $var_airline_name = $_POST['airlineName'];

           //imageUpload
            $folder ="../images/";
            $image = $_FILES['logo']['name'];
            $path = $folder . $image ;
            $target_file=$folder.basename($_FILES["logo"]["name"]);
            move_uploaded_file( $_FILES['logo'] ['tmp_name'], $path);
            
            
            $SqlQuery = "INSERT INTO airlines_list VALUES (?,?,?)";
            $statement = $conn->prepare($SqlQuery);
            $result = $statement->execute(array(null, $var_airline_name, $image));

            if($result == true) {

                ?>
                <script>
                    alert("Added Successefully");
                    window.location.href = "../airlines.php"; 
                </script>
                <?php
        
            }

                
        }

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>