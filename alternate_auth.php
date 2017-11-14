<?php
	session_start();
		error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include 'connection.php';
	$conn = $dbconn;

	extract($_POST);
	$query = "SELECT user_id, password FROM users WHERE username=? LIMIT 1;";
	$quer .= "SELECT teacher_id, first_name, last_name FROM teachers WHERE user_id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($uid, $hashedpwd);
	$stmt->fetch();
	$stmt->close();
	//verify hashed password
	if (password_verify($password, $hashedpwd)) {
		$teacher = "SELECT teacher_id, first_name, last_name FROM teachers WHERE user_id=?";
		$stmt = $conn->prepare($teacher);
		$stmt->bind_param("i", $uid);
		$stmt->execute();
		$stmt->bind_result($teacher_id, $first_name, $last_name);
		$stmt->fetch();
		$_SESSION['teacher_id'] = $teacher_id;
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		$stmt->close();
		header("Location: index.php");	
	} else {
		header("Location: login.php");
	}
?>