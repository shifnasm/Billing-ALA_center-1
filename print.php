<?php
    session_start();
    if(!isset($_SESSION['AdminUser'])) {
        header('Location: index.php');
        die();
    }
?>
<?php  include('act.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="style/tablestyle.css"> -->
    <!-- <link rel="stylesheet" href="style/print.css"> -->
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
    <div class="row">
        <div class="col-xs-12"> 
            <br/>
            <div class="print" style="border: 1px solid #a1a1a1; width: 88mm; background: white; padding: 10px;
                margin: 0 auto; text-align: center; ">
                <div align="center">
                    <h3>Purchase Invoice</h3>
                </div>  
                <div align="center">
                    Invoice No <b>101</b>
                </div>
                <br/>

                <!-- <?php  
                // $query = "select * from purchase WHERE productcode = ?";
                
                // $stmt = $conn->prepare($query);
                // $stmt->bind_param("i",$productcode);
        
                // if ($stmt->execute()) {
                //     $result = $stmt->get_result();
                    
                //     if ($result->num_rows >0)
                //     {
                //         return $result;
                //     }
                    
                // }else{
                //     $result = 'Error sql';
                //     return $result;
                // }

                // if(isset($this->UImsg) and !empty($this->UImsg)){
					
				// 	while($row = $this->UImsg->fetch_assoc()){           
           		 ?> -->

                <table class="table table-responsive">
                    <thead> 
                    <tr>
                        <td class="text-center"><b>Product code</b></td>
                        <td class="text-center"><b>Product name</b></td>
                        <td class="text-center"><b>Price</b></td>
                        <td class="text-center"><b>Qty</b></td>
                        <td class="text-center"><b>Amount</b></td>
                    </tr>
                    </thead>
                    <tr>
                        <td class="text-center"><?php //echo $purchase['productcode'];?>001</td>
                        <td class="text-center"><?php //echo $purchase['productname'];?>Fan</td>
                        <td class="text-center"><?php //echo $purchase['price'];?>3000</td>
                        <td class="text-center"><?php //echo $purchase['quantity'];?>10</td>
                        <td class="text-center"><?php //echo $purchase['amount'];?>30000</td>
                    </tr>
                </table>
                <div align="right">
                    Sub Total <b>30000</b>
                </div>
                <div align="right">
                    Pay <b>50000</b>
                </div>
                <div align="right">
                    Due <b>20000</b>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>