<?php

include 'conn.php';

if(isset($_POST['done'])){

	$id = $_GET['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$roll_no = $_POST['roll_no'];
	$class = $_POST['class'];
	$batch = $_POST['batch'];
	$gender = $_POST['gender'];
	$q = " update users set id=$id, firstname='$firstname', lastname='$lastname', rollno='$roll_no', class='$class', batch='$batch', gender='$gender' where id=$id  ";

	if ($con->query($q) === TRUE) {
		echo " Record updated successfully";
		header('location:display.php');

	} else {
		echo "Error: " . $q . "<br>" . $con->error;
	}

	header('location:display.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="col-lg-6 m-auto">

		<?php

		include 'conn.php'; 
		$id = $_GET['id'];
		$q = "select * from users where id=$id ";
		$query = mysqli_query($con,$q);
		while($res = mysqli_fetch_array($query)){

			?>
			<form method="post">

				<br><br><div class="card">

					<div class="card-header bg-dark">
						<h1 class="text-white text-center">  Update Students </h1>
					</div><br>

					<label> FirstName: </label>
					<input type="text" name="firstname" class="form-control" value="<?php echo $res['firstname'];  ?>"> <br>

					<label> LastName: </label>
					<input type="text" name="lastname" class="form-control" value="<?php echo $res['lastname'];  ?>"> <br>
					<label> Roll Number: </label>
					<input type="number" name="roll_no" class="form-control" value="<?php echo $res['rollno'];  ?>"> <br>
					<label> Class: </label>
					<select class="form-control" name="class">
						<option value="<?php echo $res['class'];  ?>" selected><?php echo $res['class'];  ?></option>
						<option value="One">One</option>
						<option value="Two">Two</option>
						<option value="Three">Three</option>
						<option value="Four">Four</option>
						<option value="Five">Five</option>
					</select>

					<label> Batch: </label>
					<select class="form-control" name="batch">
						<option value="<?php echo $res['batch'];  ?>" selected><?php echo $res['batch'];  ?></option>
						<option value="2071">2071</option>
						<option value="2072">2072</option>
						<option value="2073">2073</option>
						<option value="2074">2074</option>
						<option value="2075">2075</option>
						<option value="2076">2076</option>
						<option value="2077">2077</option>
					</select>
					<label> Gender: </label>
					<div class="form-control">
						<input type="radio" name="gender" value="male" <?php echo $res['gender'] == 'male'?'checked':'';  ?>>Male 
						<input type="radio" name="gender" value="female" <?php echo $res['gender'] == 'female'?'checked':'';  ?>>Female 
					</div>
					<button class="btn btn-success" type="submit" name="done"> Submit </button><br>

				</div>
			</form>
			<?php 
		}
		?>
	</div>
</body>
</html>