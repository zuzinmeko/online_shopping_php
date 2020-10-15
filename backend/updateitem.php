<?php 
include 'dbconnect.php';
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$brand=$_POST['brand'];
	$subcategory=$_POST['subcategory'];
	$description=$_POST['description'];
	$fullpath=$_POST['oldphoto'];
	$photo=$_FILES['photo'];
	$codeno=$_POST['codeno'];
	echo $codeno;
	if ($photo['size']>0) {
		$basepath="img/items/";
		$fullpath=$basepath.$photo['name'];
		move_uploaded_file($photo['tmp_name'], $fullpath);
	}
	$sql ="UPDATE items SET codeno=:item_codeno, name=:item_name, photo=:item_photo, price=:item_price, discount=:item_discount, description=:item_des, brand_id=:item_brand, subcategory_id=:item_sub WHERE items.id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':item_id',$id);
	$stmt->bindParam(':item_codeno',$codeno);
	$stmt->bindParam(':item_name',$name);
	$stmt->bindParam(':item_photo',$fullpath);
	$stmt->bindParam(':item_price',$price);
	$stmt->bindParam(':item_discount',$discount);
	$stmt->bindParam(':item_des',$description);
	$stmt->bindParam(':item_brand',$brand);
	$stmt->bindParam(':item_sub',$subcategory);
	$stmt->execute();
	header("location:itemlist.php");
	

	
 ?>
