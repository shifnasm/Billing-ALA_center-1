<?php  include('act.php'); ?>
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
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/home.css"> 
    <link rel="stylesheet" href="style/tablestyle.css">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <img src="img/logo3.png" style="height:50px; float:left; position:relative; left:20px; top:5px;">
        <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> &#8287 Logout</a>
        <a href="product.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i> &#8287 Products</a>
        <a href="customer.php"><i class="fa fa-child" aria-hidden="true"></i> &#8287 Customers</a>
        <a href="home.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> &#8287 Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>

<?php endif ?>
   <div class="container">
   <div class="main">
        <div class="content">       
        <div class="tableview">
        <form method="post" action="act.php" >
        <table class="table" style="position:relative; left:40px; top:20px;">
            <tr>
                <th colspan="6" style="background-color:black; color:white">
                    <h2>Add Products</h2>
                </th>
            </tr>
            <tr style="background-color:black; color:white">
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><input style="border-bottom:none;" type="text" name="productcode" placeholder="" value=""></td>
                <td><input style="border-bottom:none;" type="text" name="productname" placeholder="" value=""></td>
                <td><input style="border-bottom:none;" type="text" name="price" placeholder="" value=""></td>
                <td><input style="border-bottom:none;" type="text" name="quantity" placeholder="" value=""></td>
                <td><input style="border-bottom:none;" type="text" name="amount" placeholder="" value=""></td>
                <td><a href="act.php?add=<?php echo $row ['productcode'];?>">
                        <button id="update" name="add">Add</button></a></td>
            </tr>
            <?php // } ?>
        </table>
        </form>
    </div>

<div class="tableview">
        <?php $results = mysqli_query($db, "SELECT * FROM purchase"); ?>    
        <table class="table" style="position:relative; left:40px; top:20px;">    
            <tr>
                <th colspan="6" style="background-color:black; color:white">
                    <h2>Purchase Details</h2>
                </th>
            </tr>
            <tr style="background-color:black; color:white">
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['productcode'];?></td>
                <td><?php echo $row['productname'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['total'];?></td>
                <td>
                    <form class="form1" action="act.php?delete=<?php echo $row ['productcode'];?>" method="POST">
                        <input type="submit" name="delete" value="Remove" id="delete">
                    </form>
                </td>
            </tr>
            <?php  } ?>
        </table>
    </div>
    </div>
    </div>

        <form class="form" action="" method="post" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Payment Details</h2><br>
            <div class="form-group">
                <label>Total</label>
                <input class="form-control" type="text" name="productcode" size="50" value="" autocomplete="off"
                    placeholder="Total" required><br>

                <label>Pay</label>
                <input class="form-control" type="text" name="productname" size="50" value="" autocomplete="off"
                    value="" placeholder="Pay" required><br>

                <label>Due</label>
                <input class="form-control" type="text" name="due" size="50" value="" placeholder="Due" required><br>
                
                <label>Payment Status</label>
				<select class="form-control" type="text" name="price" value="" required><br/>
				<option value="select">Please Select</option>
                <option value="cash">Cash</option>
				<option value="cheque">Cheque</option>
				</select>
            </div>
			<a href="product-add?id=<?php //echo $product ['product_code'];?>">
                        <button class="table button" id="update">Print Invoice</button></a>
        </form>
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