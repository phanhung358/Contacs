<?php
	include_once "conn.php";
	if(isset($_POST['update']))
	{
		$ma = $_GET['ID'];
		$name = $_POST['txtName'];
		$phone = $_POST['txtPhone'];
		$email = $_POST['txtEmail'];

		$query = "UPDATE  danhba SET name='".$name."',phone='".$phone."',email='".$email."'  WHERE ma='".$ma."'";
		$result = mysqli_query($con,$query);

		if($result) 
		{
			header('location:index.php');
		}
		else 
		{
			echo  " Vui lòng xem lại";
		}
	} 
	else 
	{
		header('location:index.php');
	}
 ?>