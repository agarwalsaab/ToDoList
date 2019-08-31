<?php 
	include('dbcon.php');
	$id=$_REQUEST['sid'];
	$qry="DELETE FROM `items` WHERE `id`='$id'";
	mysqli_query($con, $qry);
	header('location:index.php');
?>