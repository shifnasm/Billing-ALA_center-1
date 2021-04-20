<?php 
session_start(); 
include "connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	if (empty($username)) {
		header("Location: log.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: log.php?error=Password is required");
	    exit();
	}else{
		
		
        $password = md5($password);

        
		$sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con, $sql);


		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
				if($row["usertype"] == "admin")
				{
					$_SESSION['AdminUser'] = $row["username"];
					header('Location: Admin/admin.php');
				}
				else if ($row["usertype"] == "nutrition") 
				{
					$_SESSION['NutritionistUser'] = $row["username"];
					header('Location: Nutritionist/dash.php');
				}
				else if ($row["usertype"] == "seller") 
				{
					$_SESSION['SellerUser'] = $row["username"];
					header('Location: Seller/dash.php');
				}
				else if ($row["usertype"] == "delivery") 
				{
					$_SESSION['DeliveryUser'] = $row["username"];
					header('Location: Driver/dash.php');
				}
				else if ($row["usertype"] == "registered")
				{
					$_SESSION['registereduser'] = $row["username"];
					header('Location: User/UserHome.php');
				}

			}
		}else{
			header("Location: log.php?error=Incorrect Username or password");
	        exit();
		}
	}}
	else{
	header("Location: log.php");
	exit();
}