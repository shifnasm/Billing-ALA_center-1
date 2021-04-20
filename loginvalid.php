<?php 
session_start(); 

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
    $password = md5($password);
	if($username == "admin" && $password == "0192023a7bbd73250516f069df18b500")
	{
		$_SESSION['AdminUser'] = $username;
		header('Location: home.php');
		}else{
		header("Location: index.php?error=Incorrect Username or password");
	    exit();
		}
	}