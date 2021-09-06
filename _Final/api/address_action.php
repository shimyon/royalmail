<?php
include("../lib/connection.php");
if ($_POST['action'] == "insert") {
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$sql = "INSERT INTO royalmail_address (Address) VALUES ('$address')";
	
	if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if ($_POST['action'] == "edit") {
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$sql = "update royalmail_address set Address = '$address' where ID = $id";
	
	if ($conn->query($sql) === TRUE) {
        echo "Record udpated successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if ($_POST['action'] == "delete") {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$sql = "DELETE FROM royalmail_address WHERE ID=$id";
	
	if ($conn->query($sql) === TRUE) {
        echo "Record delete successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>