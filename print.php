<?php 
include("db.php");

$last_id = $_GET['last_id'];

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $sql = "SELECT i.purchase_id, i.product_code, i.buy_price, i.quantity, i.total, p.date, p.total, p.pay, p.due, pr.product_name
    FROM purchase p, purchase_item i, products pr WHERE (p.id=i.purchase_id AND pr.product_code=i.product_code AND i.purchase_id=" . $last_id . ")";

    $orderResult = $conn->query($sql);
    $orderdata = $orderResult->fetch_array();

    $purchase_id = $orderdata[0];
    $product_code = $orderdata[1];
    $buy_price = $orderdata[2];
    $quantity = $orderdata[3];
    $total = $orderdata[4];
    $date = $orderdata[5];
    $subtotal = $orderdata[6];
    $pay = $orderdata[7];
    $due = $orderdata[8];
    $product_name = $orderdata[9];

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        @media print
        {
            .button
            {
                display:none;
            }
        }

        @media print {
            {
                 @page 
                 {
                     margin-top:0;
                     margin-bottom:0;
                 }
                 body
                 {
                     padding-top:72px;
                     padding-bottom:72px;
                 }
            }
        }
    </style>

</head>

<body>

    <div class="container">
    <div class="row">
        <div class="col-xs-12"> 
            <br/>
            <div class="print" style="border: 1px solid #a1a1a1; width: 88mm; background: white; padding: 10px;
                margin: 0 auto; text-align: center; ">
                <div align="center">
                    <h3>Purchase Invoice</h3>
                </div>  
                <div align="left">
                    Date <b><?php echo $date; ?></b>
                </div>  
                <div align="right">
                    Invoice No <b><?php echo $last_id; ?></b>
                </div>
                <br/>

                <table class="table table-responsive">
                    <thead> 
                    <tr>
                        <td class="text-center"><b>No</b></td>
                        <td class="text-center"><b>Product name</b></td>
                        <td class="text-center"><b>Price</b></td>
                        <td class="text-center"><b>Qty</b></td>
                        <td class="text-center"><b>Amount</b></td>
                    </tr>
                    </thead>

                    <?php 
                        $x=1;
                        $orderResult = $conn->query($sql);
                        while($row = $orderResult->fetch_array())
                        {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $x; ?></td>
                        <td class="text-center"><?php echo $row[9]; ?></td>
                        <td class="text-center"><?php echo $row[2]; ?></td>
                        <td class="text-center"><?php echo $row[3]; ?></td>
                        <td class="text-center"><?php echo $row[4]; ?></td>
                    </tr>

                    <?php $x++; } ?>
                </table>
                <div align="right">
                    Sub Total <b><?php echo $subtotal; ?></b>
                </div>
                <div align="right">
                    Pay <b><?php echo $pay; ?></b>
                </div>
                <div align="right">
                    Due <b><?php echo $due; ?></b>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="jquery/dist/jquery.js"></script>
    <script src="jquery/dist/jquery.min.js"></script>
    <script src="jquery.validation.min.js"></script>

    <script src="bootstrap/dist/js/bootstrap.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19.js/jquery.dataTables.min.js"></script>
    <!-- <script src="bower_components/jquery.validate.min.js"></script> -->
    <script src="https:code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="jquery-confirm-master.js"></script>

    <script>

    printFunction();

    function printFunction()
    {
        window.print();
    }

    window.onafterprint = function(e)
    {
        closePrintView();
    }

    function closePrintView()
    {
        window.location.href = 'home.php';
    }

    </script>

</body>
</html>

<?php } ?>