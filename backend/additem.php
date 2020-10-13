<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$brand=$_POST['brand'];
	$subcategory=$_POST['subcategory'];
	$description=$_POST['description'];
	$photo=$_FILES['photo'];
	$codeno="CODE_".mt_rand(100000,999999);
	$basepath="img/items/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);
	// echo "$name and $price and $discount and $brand and$subcategory and $description and $codeno <br>";
	// print_r($photo);

	$sql="INSERT INTO items (codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES(:item_codeno,:item_name,:item_photo,:item_price,:item_discount,:item_description,:item_brand,:item_subcategory)";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':item_codeno',$codeno);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->bindParam(':item_price',$price);
	$stmt->bindParam(':item_discount',$discount);
	$stmt->bindParam(':item_description',$description);
	$stmt->bindParam(':item_brand',$brand);
	$stmt->bindParam(':item_subcategory',$subcategory);
	$stmt->execute();
	if ($stmt->rowCount()) {
		header("location:itemlist.php");
	} else{
		echo "Error";
	}
	 



	 ?>