<?php
require_once("connection.php");
session_start();
?>
<?php
if(isset($_GET['delete']))
{                                         
$query = "select * from airlines_list where airline_id = ".$_GET['id'];
$Statement=$conn->prepare($query);
$Statement->execute();
$row=$Statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php
	$query = "delete from airlines_list where airline_id = ".$_GET['id'];
    $Statement=$conn->prepare($query);
    $Statement->execute();
    header('location:../airlines.php');
?>