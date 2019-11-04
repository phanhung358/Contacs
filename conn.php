<?php
	$con = mysqli_connect('localhost', 'root');
	mysqli_select_db($con,'qldb');
	$con->set_charset("utf8");
	if($con) {
		// echo 'Connect susscess';
	}
	else {
		echo 'Not Connect';
	}
 ?>