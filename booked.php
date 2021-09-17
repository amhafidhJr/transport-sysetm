<?php

	session_start();
	$userID = $_SESSION["usersId"];
	$userType = $_SESSION["type"];

	if(!empty($userID) && $userType == 1) {

		require_once('menu/header.php'); 
        require_once('menu/menu.php'); 
        require_once('view/booked.php');
        require_once('menu/footer.php');

	}
	else {
		?>
		<script type="text/javascript">
			// window.location.href = "index.php";
		</script>
		<?php
	}
   
?>