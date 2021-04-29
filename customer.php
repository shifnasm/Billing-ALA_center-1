<?php
  /*  session_start();
    if(!isset($_SESSION['AdminUser'])) {
        header('Location: index.php');
        die();
    } */
?>
<?php 
include('customer_process.php');
if (isset($_GET['edit'])) {
    $shop_code = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM customers WHERE shop_code='$shop_code'");
    // if (!$rec) {
    //     printf("Error: %s\n", mysqli_error($db));
    //     exit();
    // }
        $record = mysqli_fetch_array($rec);
        $shop_code = $record['shop_code'];
        $shop_name = $record['shop_name'];
        $owner = $record['owner'];
        $contact = $record['contact'];
        $address = $record['address'];
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Customers</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/tablestyle.css">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <img src="img/logo3.png" style="height:50px; float:left; position:relative; left:20px; top:5px;">
        <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> &#8287 Logout</a>
        <a href="product.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i> &#8287 Products</a>
        <a href="customer.php" class="active"><i class="fa fa-child" aria-hidden="true"></i> &#8287 Customers</a>
        <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> &#8287 Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="container">
    <div class="main">
        <div class="content">
                    
        <form class="form" action="customer_process.php" method="POST" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Add Customer Details</h2><br>
            <div class="form-group">
                <label>Shop Code</label>
                <input class="form-control" type="text" name="shop_code" size="50" value="<?php echo $shop_code; ?>" required><br>

                <label>Shop Name</label>
                <input class="form-control" type="text" name="shop_name" size="50" value="<?php echo $shop_name; ?>"  required><br>

                <label>Owner name</label>
                <input class="form-control" type="text" name="owner" size="50" value="<?php echo $owner; ?>" required><br>
                
                <label>Contact No</label>
                <input class="form-control" type="text" name="contact" size="50" value="<?php echo $contact; ?>" required><br>

                <label>Address</label>
                <input class="form-control" type="text" name="address" size="50" value="<?php echo $address; ?>" required><br>
            </div>
            <?php if ($edit_state == false): ?>
            <button class="button" type="submit" name='save' value="Save"></button>
            <?php else: ?>
            <button class="button" type="submit" name='update' value="Update"></button>
            <?php endif ?>
        </form>
    </div>
</div>


<div class="tableview">
<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

        <table class="table">
            <tr>
                <th colspan="7" style="background-color:black; color:white">
                    <h2>Customer Details</h2>
                </th>
            </tr>
            <tr style="background-color:black; color:white">
                <th>Shop Code</th>
                <th>Shop Name</th>
                <th>Owner Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($results)){ ?>

                <tr>
                <td><?php echo $row['shop_code'];?></td>
                <td><?php echo $row['shop_name'];?></td>
                <td><?php echo $row['owner'];?></td>
                <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><a class="btn1" href="customer.php?edit=<?php echo $row['shop_code']; ?>"> Edit</a></td>
                <td><a class="btn" href="customer_process.php?del=<?php echo $row['shop_code']; ?> "> Delete</a></td>
            </tr>
            <?php } ?>
        </table>
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