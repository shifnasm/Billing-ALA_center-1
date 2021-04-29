<?php 
    session_start();

    $shop_code = "";
    $shop_name = "";
    $owner = "";
    $contact = "";
    $address = "";

    $edit_state = false;

    $db = mysqli_connect('localhost','root','','ala_center');

    if (isset($_POST['save'])){
        $shop_code = $_POST['shop_code'];
        $shop_name = $_POST['shop_name'];
        $owner = $_POST['owner'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $query = "INSERT INTO customers (shop_code, shop_name, owner, contact, address) VALUES ('$shop_code','$shop_name','$owner','$contact','$address')";
        mysqli_query($db, $query);

        $_SESSION['msg'] = "New customer details added successfully";

        header('location: customer.php');
    }

    if (isset($_POST['update'])){
        $shop_code = $_POST['shop_code'];
        $shop_name = $_POST['shop_name'];
        $owner = $_POST['owner'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        mysqli_query($db, "UPDATE customers SET shop_code='$shop_code', shop_name='$shop_name', owner='$owner', contact='$contact', address='$address' WHERE shop_code='$shop_code'");
        $_SESSION['msg'] = "Customer Details Updated Successfully";
        header('location: customer.php');
    }


    if(isset($_GET['del'])){
        $shop_code=$_GET['del'];

        mysqli_query($db, "DELETE FROM customers WHERE shop_code = '$shop_code' ");
        $_SESSION['msg'] = "Customer Details Deleted Successfully";
        header('location: customer.php');
    }

    $results = mysqli_query($db, "SELECT * FROM customers");
?>