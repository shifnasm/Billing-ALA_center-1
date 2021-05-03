<?php
    // session_start();
    // if(!isset($_SESSION['AdminUser'])) {
    //     header('Location: index.php');
    //     die();
    // }
?>

<?php 
include('product_process.php');
if (isset($_GET['edit'])) {
    $product_code = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM products WHERE product_code='$product_code'");
    // if (!$rec) {
    //     printf("Error: %s\n", mysqli_error($db));
    //     exit();
    // }
        $record = mysqli_fetch_array($rec);
        $product_code = $record['product_code'];
        $product_name = $record['product_name'];
        $unit_price = $record['unit_price'];
        $quantity = $record['quantity'];
        
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
        <a href="product.php" class="active"><i class="fa fa-productping-bag" aria-hidden="true"></i> &#8287 Products</a>
        <a href="customer.php"><i class="fa fa-child" aria-hidden="true"></i> &#8287 Customers</a>
        <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> &#8287 Home</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="container">
    <div class="main">
        <div class="content">
                    
        <form class="form" action="product_process.php" method="post" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Add Product Details</h2><br>
            <div class="form-group">
                <label>Product Code</label>
                <input class="form-control" type="text" name="product_code" size="50" value="<?php echo $product_code; ?>" autocomplete="off"
                    placeholder="Product Code" required><br>

                <label>Product Name</label>
                <input class="form-control" type="text" name="product_name" size="50" value="<?php echo $product_name; ?>" autocomplete="off"
                    value="" placeholder="Product Name" required><br>

                <label>Price</label>
                <input class="form-control" type="text" name="unit_price" size="50" value="<?php echo $unit_price; ?>" placeholder="Price"
                    required><br>

                <label>Quantity</label>
                <input class="form-control" type="text" name="quantity" size="50" value="<?php echo $quantity; ?>" placeholder="Quantity"
                    required><br>
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
                <th colspan="6" style="background-color:black; color:white">
                    <h2>Product Details</h2>
                </th>
            </tr>
            <tr style="background-color:black; color:white">
                <th>Product Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['product_code'];?></td>
                <td><?php echo $row['product_name'];?></td>
                <td><?php echo $row['unit_price'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><a class="btn1" href="product.php?edit=<?php echo $row['product_code']; ?>"> Edit</a></td>
                <td><a class="btn" href="product_process.php?del=<?php echo $row['product_code']; ?> "> Delete</a></td>
            </tr>
            <?php } ?>
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