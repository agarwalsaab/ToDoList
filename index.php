<?php 
	include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>To Do List</title>
</head>
<body>
	<h1 align="center">To Do List</h1>
	<hr>
	<div style="margin-top: 50px;" class="elements">
		<table align="center" width="60%;" border="1">
			<tr>
				<th>S. No.</th>
				<th>Task</th>
				<th>Action</th>
			</tr>
			<?php 
				$qry = "SELECT * FROM `items`";
				$result = mysqli_query($con, $qry);
				$c=0;
				while($run = mysqli_fetch_array($result)){
					$id=$run['id'];
					$c++;
					?>
					<tr>
						<td><?php echo $c; ?></td>
						<td><?php echo $run['thing'];?></td>
						<td><a href="delete.php?sid=<?php echo $id;?>">Delete</a></td>
					</tr>
					<?php 
				}
			?>
		</table>
	</div >
	<form style="margin-top: 50px" align="center" action="index.php" method="POST">
		<input type="text" name="thing">
		<input type="submit" name="add" value="Add">
	</form>
</body>
</html>
<?php 
	if(isset($_POST['add'])){
		$val=$_POST['thing'];
		$query="INSERT INTO `items`(`thing`) VALUES ('$val')";
		mysqli_query($con, $query);
		header('location:index.php');

	}
?>