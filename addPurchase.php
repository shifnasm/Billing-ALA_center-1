<?php 
include("db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $stmt = $conn->prepare("INSERT INTO purchase(date, total, pay, due, payment_type) VALUES (?,?,?,?,?)");

    $date = date("Y-m-d");
    $total = $_POST['total'];
    $pay = $_POST['pay'];
    $due = $_POST['due'];
    $payment_type = $_POST['payment_type'];

    $stmt->bind_param("siiis",$date, $total, $pay, $due, $payment_type);
}
if($stmt->execute())
{
    $last_id = $conn->insert_id;
}

    $relation_list = $_POST['data'];

for($x=0; $x<count($relation_list); $x++)
{
    $stmt1 = $conn->prepare("INSERT INTO purchase_item(purchase_id, product_code, buy_price, quantity, total) VALUES (?,?,?,?,?)");
    $stmt1->bind_param("iiiii",$last_id, $product_code, $buy_price, $quantity, $total);

    $product_code = $relation_list[$x]['product_code'];
    $buy_price = $relation_list[$x]['unit_price'];
    $quantity = $relation_list[$x]['quantity'];
    $total = $relation_list[$x]['amount'];

    if($stmt1->execute())
    {
   
    }
    else
    {

    }

    $stmt1->close();
}

echo json_encode(array ("last_id"=>$last_id));
$stmt->close();

?>