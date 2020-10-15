<?php

include 'include/header.php';
include 'dbconnect.php';

$id=$_GET['id'];
//echo $id;

$sql="SELECT * FROM brands WHERE brands.id=:brand_id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':brand_id',$id);
$stmt->execute();
$brand=$stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($item);

 ?>


	 <!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Brand edit</h1>
	 	<a href="brandlist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i>Go Back</a>
	 </div>

	 <div class="row">
	 	<div class="offset-md-2 col-md-8">
	 		<form action="updatebrand.php" method="POST" enctype="multipart/form-data">
	 			<input type="hidden" name="id" value="<?php echo $brand['id']?>">
	 			<div class="form-group">
	 				<label for="name">Brand Name</label>
	 				<input type="text" name="name" id="name" class="form-control" value="<?php echo $brand['name'] ?>">
	 			</div>
	 			<div class="form-group">
	 				<label for="photo">Brand Photo</label>
	 				<input type="file" name="photo" id="photo" class="form-control-file" accept="image/*" value="<?php echo $brand['name'] ?>">
	 				<img src="<?php echo $brand['photo']?>" width="150" height="150">
	 			</div>

	 			<input type="submit" class="btn btn-primary float-right" value="Update">
	 		</form> 
	 	</div>
	 </div>





 <?php 

include 'include/footer.php';

  ?>