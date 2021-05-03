<?php 
    session_start();

    $product_code = "";
    $product_name = "";
    $unit_price = "";
    $quantity = "";
    
    $edit_state = false;

    $db = mysqli_connect('localhost','root','','ala_center');

    if (isset($_POST['save'])){
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $unit_price = $_POST['unit_price'];
        $quantity =  $_POST['quantity'];

        $query = "INSERT INTO products (product_code, product_name, unit_price, quantity) VALUES ('$product_code','$product_name','$unit_price', '$quantity')";
        mysqli_query($db, $query);

        $_SESSION['msg'] = "New product details added successfully";

        header('location: product.php');
    }

    if (isset($_POST['update'])){
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $unit_price = $_POST['unit_price'];
        $quantity =  $_POST['quantity'];
       
        mysqli_query($db, "UPDATE products SET product_code='$product_code', product_name='$product_name', unit_price='$unit_price', quantity='$quantity' WHERE product_code='$product_code'");
        $_SESSION['msg'] = "Product Details Updated Successfully";
        header('location: product.php');
    }


    if(isset($_GET['del'])){
        $product_code=$_GET['del'];

        mysqli_query($db, "DELETE FROM products WHERE product_code = '$product_code' ");
        $_SESSION['msg'] = "Product Details Deleted Successfully";
        header('location: product.php');
    }

    $results = mysqli_query($db, "SELECT * FROM products");
?>