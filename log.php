<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/logstyle.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
	</head>
	<body>
        <div class="container"> 
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" alt="logo" width="125px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
						<li><a href="blog.php">Blog</a></li>
                        <li><a href="restaurant.php">Restaurants</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                    </ul>
				</nav>
				<img src="images/menu.png" class="menu-icon" alt="menu" onclick="menutoggle()">
			</div>
			<div class="row">
				<div class="col-2">
					<div class="icon">
						<img src="images/rest.png">
					</div>
				</div>
				<div class="col-2">
					<div class="banner-text">
						<form action="loginvalid.php" method="post">
							<div class="head">
								<h2 class="title">Login</h2>
							</div>		
							<?php if (isset($_GET['error'])) { ?>
							<p class="error"><?php echo $_GET['error']; ?></p>
							<?php } ?>
							<label class="username">Username</label>
							<input type="text" name="username" autocomplete="off" placeholder="Username"><br>
							<label>Password</label>
							<input type="password" name="password" placeholder="Password"><br>
							<button type="submit">Login</button>
							<a href="index.php#SignUp" class="ca">Want to create an account?</a><br>
							<a href="recoverpass.php" class="ca">Forgot password?</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<Script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";
            
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px"){
                    MenuItems.style.maxHeight = "250px";
                }
                else{
                    MenuItems.style.maxHeight = "0px";
                }
            } 
        </Script>
</body>
</html>