<?php

include 'conn.php';

$id = $_GET['id'];

$q = " DELETE FROM `users` WHERE id = $id ";

if ($con->query($q) === TRUE) {
	echo "Record Deleted Successfully";
	header('location:display.php');

} else {
	echo "Error: " . $q . "<br>" . $con->error;
}

header('location:display.php');

?>