<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="style/loginstyle.css">

</head>

<body>
    <div class="login-form">
        <h1>Login</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <img class="logo" src="img/logo1.png">

                    <form action="loginvalid.php" method="POST">
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <input type="text" name="username" placeholder="User Name" required autofocus="">

                        <input type="password" name="password" placeholder="Password" required autofocus="">

                        <button class="btn" type="submit">Login</button>
                    </form>

                </div>

                <div class="form-img">
                    <img src="img/login.png">


                </div>


            </div>



        </div>


    </div>


</body>


</html>