<?php 
	$db = mysqli_connect('localhost', 'root', '', 'ala_centre');

	// initialize variables
   // $id=0;
    $productcode="productcode";
	$productname="productname";
    $price="price";
	$quantity="quantity";
	$amount="total";
   // $pay="pay";
   // $due="due";

	if (isset($_POST['add'])) {
		$productcode="productcode";
	    $productname="productname";
        $price="price";
	    $quantity="quantity";
	    $amount="total";
        // $pay="pay";
        // $due="due";

		mysqli_query($db, "INSERT INTO purchase (productcode, productname, price, quantity, total) VALUES ('$productcode', '$productname', '$price', '$quantity', '$amount')"); 
		$_SESSION['message'] = "Product Added"; 
		header('location: home.php');
	}
    ?>

