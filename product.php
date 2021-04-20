<?php
    session_start();
    if(!isset($_SESSION['AdminUser'])) {
        header('Location: index.php');
        die();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Products</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/form.css">
    <link rel="stylesheet" type="text/css" href="style/tablestyle.css">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <img src="img/logo3.png" style="height:50px; float:left; position:relative; left:20px; top:5px;">
        <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> &#8287 Logout</a>
        <a href="product.php" class="active"><i class="fa fa-shopping-bag" aria-hidden="true"></i> &#8287 Products</a>
        <a href="customer.php"><i class="fa fa-child" aria-hidden="true"></i> &#8287 Customers</a>
        <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> &#8287 Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="container">
    <div class="main">
        <div class="content">
                    
        <form class="form" action="" method="post" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Add Product Details</h2><br>
            <div class="form-group">
                <label>Product Code</label>
                <input class="form-control" type="text" name="Product_code" size="50" value="" autocomplete="off"
                    placeholder="Product Code" required><br>

                <label>Product Name</label>
                <input class="form-control" type="text" name="Product_name" size="50" value="" autocomplete="off"
                    value="" placeholder="Product Name" required><br>

                <label>Price</label>
                <input class="form-control" type="text" name="price" size="50" value="" placeholder="Price"
                    required><br>
            </div>
            <input class="button" type="submit" name='submit2' value="Submit">
            <input class="button" type="reset" value="Reset">
        </form>
    </div>
</div>


<div class="tableview">
        <table class="table">
            <tr>
                <th colspan="5" style="background-color:black; color:white">
                    <h2>Product Details</h2>
                </th>
            </tr>
            <tr style="background-color:black; color:white">
                <th>Product Code</th>
                <th>Name</th>
                <th>Price</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php //foreach($users as $user) { ?>
            <tr>
                <td><?php// echo $user['id'];?></td>
                <td><?php// echo $user['email'];?></td>
                <td><?php// echo $user['username'];?></td>
                <td><a href="user-update?id=<?php //echo $user ['id'];?>">
                        <button id="update">Update</button></a></td>

                <td>
                    <form class="form1" action="user-delete?id=<?php //echo $user ['id'];?>" method="POST">
                        <input type="submit" name="delete" value="Delete" id="delete">
                    </form>
                </td>
            </tr>
            <?php // } ?>
        </table>
    </div>
    </div>
    

    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    </script>

</body>

</html>