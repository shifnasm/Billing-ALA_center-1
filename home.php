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
                    
        <form class="form" action="purchase_process.php" method="POST" style="position:relative; top:15px; ">
            <h2 style="text-transform: capitalize; color:black;">Payment Details</h2><br>
            <div class="form-group">
                <label>Total</label>
                <input class="form-control" id="total" type="text" name="total" placeholder="Total" disabled><br>

                <label>Pay</label>
                <input class="form-control" id="pay" type="text" name="pay" placeholder="Pay" required><br>

                <label>Due</label>
                <input class="form-control" id="due" type="text" name="due" placeholder="Due" disabled><br>
                
                <label>Payment Status</label>
                <select name="status" id="status">
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
    
    <script>

    var isNew = true;
    getProductcode();

    function getProductcode()
    {
      $("#product_code").keyup(function(e){

        $.ajax({
            type: "POST",
            url: 'getProduct.php',
            dataType: "JSON",
            data: {product_code:$("#product_code").val()},

            success: function(data)
            {
                console.log(data);

                $("#product_name").val(data[0].product_name);
                $("#unit_price").val(data[0].unit_price);
                $("#quantity").focus();

            }

            error: function(data)
            {

            }

        });
        
      });
    
    }
    
    $(function(){

        $("#unit_price, #quantity").on("keydown keyup click",quantity);

        function quantity()
        {
            var sum = ( Number("#unit_price".val()) * Number("#quantity".val()) );
            $("#amount").val(sum);
        }

    })
    
    function addProduct()
    {
        var product = {
            product_code: $("#product_code").val(),
            product_name: $("#product_name").val(),
            unit_price: $("#unit_price").val(),
            quantity: $("#quantity").val(),
            amount: $("#amount").val(),
        };
        addRow(product);
        $("#productForm") [0].reset();
    }
 
    var total = 0;
    function addRow(product)
    {
        if($('#product_code').val().length==0)
        {
            $.alert({
                title: 'Error',
                content: "Please Enter the Product Code",
                type: 'red',
                autoclose: 'ok|2000',
            });
        }
        else{

        var $tableB = $("#productlist tbody");
        var $row = $(
            "<tr>" + 
            "<td><button class="btn" type="button" onclick="deleteRow(this)">Delete</button></td>" 
            "<td>" + product.product_code + "</td>" +
            "<td>" + product.product_name + "</td>" +
            "<td>" + product.unit_price + "</td>" +
            "<td>" + product.quantity + "</td>" +
            "<td>" + product.amount + "</td>" +
            "</tr>" 
        );
        $row.data("product_code",product.product_code);
        $row.data("product_name",product.product_name);
        $row.data("unit_price",product.unit_price);
        $row.data("quantity",product.quantity);
        $row.data("amount",product.amount);

        $tableB.append($row);
        total += Number(product.amount);
        $('#total').val(total);
        }
    }
    var product_total;
    function deleteRow(e)
    {
        product_total = parseInt($(e).parent().parent().find('td:last').text(),10);
        total -= product_total;
        $('#total').val(total);
        $(e).parent().parent().remove();
    }

    $(function(){

        $("#total, #due").on("keydown keyup",total);

        function total()
        {
            var sum = ( Number("#pay".val()) - Number("#total".val()) );
            $("#due").val(sum);
        }

    })
    
    function addInvoice()
    {
        var table_data = [];

        $('#productlist tbody tr').each(function(row,tr)
        {
            var sub = {
                'product_code': $(tr).find('td:eq(1)').text(),
                'product_name': $(tr).find('td:eq(2)').text(),
                'unit_price': $(tr).find('td:eq(3)').text(),
                'quantity': $(tr).find('td:eq(4)').text(),
                'amount': $(tr).find('td:eq(5)').text(),
            };
            table_data.push(sub);
        });

       

        $.ajax({
            type: "POST",
            url: "addPurchase.php",
            dataType: "JSON",
            data: {total:$("#total").val(), pay:$("#pay").val(), due:$("#due").val(), status:$("#status").val(), data: table_data},

            success function(data)
            {
                var msg;
                if(isNew)
                {
                    msg = "Purchase Completed";
                }

                $.alert({
                title: 'Success',
                content: msg,
                type: 'Green',
                autoclose: 'ok|2000',
                )};

            last_id = data.last_id;

            window.location = "print.php?last_id=" + last_id;         

            },

            error function (xhr,status,error)
            {
                console.log(xhr.responseText);
            },

        });
       
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }


</body>

</html>