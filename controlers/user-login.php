<?php
    include "connection.php";
    session_start();
     if(isset($_POST['login'])){
       try{
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            //retrive user name and password
            $query = "SELECT * FROM users where username=? and password=?";
            $statement = $conn->prepare($query);
            $statement->execute(array($username,$password));
            $row=$statement->fetchAll(PDO::FETCH_ASSOC);

            if($row ){
                //echo"hi";
            foreach($row as $display){
                $_SESSION['usersId']= $display['id'];
                $_SESSION['type']= $display['type'];
                header("location:../home.php");

            }

            }
            else{
                $_SESSION['error']="Sorry!! try again invalid user name or password";
                echo"<script>
                alert('Sorry!! try again invalid user name or password');
                window.location.href='../index.php';
                </script>";
                exit();

            }

        }
        catch(Exception $br){
            echo "error";
            exit();
        }
    
}
?>