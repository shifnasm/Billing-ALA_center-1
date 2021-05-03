<?php 
include("db.php");

$stmt->$conn->prepare("SELECT product_code, product_name, unit_price FROM products WHERE product_code = ? ORDER BY product_code DESC");
$product_code = $_POST["product_code"];
$stmt->bind_param("s",$product_code);

$stmt->bind_result($product_code, $product_name, $unit_price);

if($stmt->execute())
{
    while($stmt->fetch())
    {
        $output [] = array("product_code"=>$product_code, "product_name"=>$product_name, "unit_price"=>$unit_price );
    }
    echo json_encode($output);
}

$stmt->close();
?>