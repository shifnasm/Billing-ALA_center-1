<?php
    // session_start();
    // if(!isset($_SESSION['AdminUser'])) {
    //     header('Location: index.php');
    //     die();
    // }
?>

<?php 
include('db.php');
//include('purchase_process.php');
// if (isset($_GET['edit'])) {
//     $product_code = $_GET['edit'];
//     $edit_state = true;
//     $rec = mysqli_query($db, "SELECT * FROM purchase WHERE product_code='$product_code'");

//         $record = mysqli_fetch_array($rec);
//         $product_code = $record['product_code'];
//         $product_name = $record['product_name'];
//         $unit_price = $record['unit_price'];
//         $quantity= $record['quantity'];
// 	    $total= $record['total'];
//     }

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
        <form id = "productForm">
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
                <td><input style="border-bottom:none;" type="text" id="product_code" name="product_code" placeholder="code" required></td>
                <td><input style="border-bottom:none;" type="text" id="product_name" name="product_name" placeholder="name" disabled></td>
                <td><input style="border-bottom:none;" type="text" id="unit_price" name="unit_price" placeholder="price" disabled></td>
                <td><input style="border-bottom:none;" type="number" id="quantity" name="quantity" placeholder="quantity" min="1" value="1" required></td>
                <td><input style="border-bottom:none;" type="text" id="amount" name="amount" placeholder="amount" disabled></td>
                <td><button class="btn1" type="button" onclick="addProduct()">Add</button></td>
            </tr>
        </table>
        </form>
    </div>
    </form>
    

<div class="tableview">
        <table class="table" id="productlist" style="position:relative; left:40px; top:20px;">
            <thead>
            <tr>
                <th colspan="7" style="background-color:black; color:white">
                    <h2>Purchase Details</h2>
                </th>
            </tr>
                <tr style="background-color:black; color:white">
                <th>Action</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            </thead>
            <?php //while ($row = mysqli_fetch_array($results)){ ?>
            <tbody>
            <tr>
                <!-- <td><?php //echo $row['product_code'];?></td>
                <td><?php// echo $row['product_name'];?></td>
                <td><?php //echo $row['unit_price'];?></td>
                <td><?php //echo $row['quantity'];?></td>
                <td><?php //echo $row['total'];?></td>
                <td><a class="btn1" href="home.php?edit=<?php //echo $row['product_code']; ?>"> Edit</a></td>
                <td><a class="btn" href="purchase_process.php?del=<?php //echo $row['product_code']; ?> "> Delete</a></td>     -->
            </tr> 
            </tbody>
            <?php// } ?>
        </table>
    </div>
    </div>
</div>
                    
        <form class="form" method="POST" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Payment Details</h2><br>
            <div class="form-group">
                <label>Total</label>
                <input class="form-control" id="total" type="text" name="total" placeholder="Total" disabled><br>

                <label>Pay</label>
                <input class="form-control" id="pay" type="text" name="pay" placeholder="Pay" required><br>

                <label>Due</label>
                <input class="form-control" id="due" type="text" name="due" placeholder="Due" disabled><br>
                
                <label>Payment Status</label>
                <select name="payment_type" id="payment_type">
                    <option value="select">Please Select</option>
                    <option value="cash">Cash</option>
                    <option value="cheque">Cheque</option>
                </select><br>
            </div>
            <button class="button" type="button" onclick="addInvoice()">Print Invoice</button>
            <!-- <input class="button" type="submit" name='submit2' value="Print">
            <input class="button" type="reset" value="Reset"> -->
        </form>
    </div>

    <script src="jquery/dist/jquery.js"></script>
    <script src="jquery/dist/jquery.min.js"></script>
    <script src="jquery.validate.min.js"></script>

    <script src="bootstrap/dist/js/bootstrap.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.10.19.js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="bower_components/jquery.validate.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="jquery-confirm-master.js"></script>
    
    <script src="script.js"></script>

</body>

</html>