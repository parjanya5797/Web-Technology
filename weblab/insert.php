<?php


if(isset($_POST['done'])){
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'weblab');
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$roll_no = $_POST['roll_no'];
	$class = $_POST['class'];
	$batch = $_POST['batch'];
	$gender = $_POST['gender'];
	$q = "INSERT INTO users (firstname,lastname,rollno,class,batch,gender) VALUES ('$firstname','$lastname','$roll_no','$class','$batch','$gender')";
	if ($con->query($q) === TRUE) {
		echo "New record created successfully";
		header('location:display.php');

	} else {
		echo "Error: " . $q . "<br>" . $con->error;
	}
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

		<form method="post">

			<br><br><div class="card">

				<div class="card-header bg-dark">
					<h1 class="text-white text-center">  Add Students </h1>
				</div><br>

				<label> FirstName: </label>
				<input type="text" name="firstname" class="form-control"> <br>

				<label> LastName: </label>
				<input type="text" name="lastname" class="form-control"> <br>
				<label> Roll Number: </label>
				<input type="number" name="roll_no" class="form-control"> <br>
				<label> Class: </label>
				<select class="form-control" name="class">
					<option selected disabled>Select A Class</option>
					<option value="One">One</option>
					<option value="Two">Two</option>
					<option value="Three">Three</option>
					<option value="Four">Four</option>
					<option value="Five">Five</option>
				</select>

				<label> Batch: </label>
				<select class="form-control" name="batch">
					<option selected disabled>Select A Batch</option>
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
					<input type="radio" name="gender" value="male" checked>Male 
					<input type="radio" name="gender" value="female">Female 
				</div>

				<br>

				<button class="btn btn-success" type="submit" name="done"> Submit </button><br>

			</div>
		</form>
	</div>
</body>
</html>