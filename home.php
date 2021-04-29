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
	
   
<div class="container">
    <div class="main">
        <div class="content">
<div class="tableview">
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
            <?php //foreach($products as $product) { ?>
            <tr>
                <td><input style="border-bottom:none;" type="text" name="productcode" placeholder="" value=""></td>
                <td><input style="border-bottom:none;" type="text" name="productname" placeholder="" value=""></td>
                <td><input style="border-bottom:none;" type="text" name="price" placeholder="" value=""><?php// echo $product['price'];?></td>
                <td><input style="border-bottom:none;" type="text" name="quantity" placeholder="" value=""><?php// echo $product['quantity'];?></td>
                <td><input style="border-bottom:none;" type="text" name="amount" placeholder="" value=""><?php// echo $product['amount'];?></td>
                <td><a class="btn1" href="product.php?edit=<?php echo $row['product_code']; ?>"> Add</a></td>
            </tr>
            <?php // } ?>
        </table>
    </div>

<div class="tableview">
        <table class="table" style="position:relative; left:40px; top:20px;">
            <tr>
                <th colspan="7" style="background-color:black; color:white">
                    <h2>Purchase Details</h2>
                </th>
            </tr>
                      <tr style="background-color:black; color:white">
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th colspan="2">Action</th>
            </tr>
            <?php //foreach($products as $product) { ?>
            <tr>
                <td><?php// echo $product['product_code'];?></td>
                <td><?php// echo $product['product_name'];?></td>
                <td><?php// echo $product['price'];?></td>
                <td><?php// echo $product['quantity'];?></td>
                <td><?php// echo $product['amount'];?></td>
                <td><a class="btn1" href="product.php?edit=<?php echo $row['product_code']; ?>"> Edit</a></td>
                <td><a class="btn" href="product_process.php?del=<?php echo $row['product_code']; ?> "> Delete</a></td>
            
            </tr>
            <?php // } ?>
        </table>
    </div>
    </div>
</div>
                    
        <form class="form" action="" method="post" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Add Customer Details</h2><br>
            <div class="form-group">
                <label>Shop Code</label>
                <input class="form-control" type="text" name="Product_code" size="50" value="" autocomplete="off"
                    placeholder="Shop Code" required><br>

                <label>Shop Name</label>
                <input class="form-control" type="text" name="Product_name" size="50" value="" autocomplete="off"
                    value="" placeholder="Shop Name" required><br>

                <label>Owner name</label>
                <input class="form-control" type="text" name="price" size="50" value="" placeholder="Owner" required><br>
                
                <label>Contact No</label>
                <input class="form-control" type="text" name="price" size="50" value="" placeholder="Contact Number" required><br>

                <label>Address</label>
                <input class="form-control" type="text" name="price" size="50" value="" placeholder="Address" required><br>
            </div>
            <input class="button" type="submit" name='submit2' value="Submit">
            <input class="button" type="reset" value="Reset">
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