<?php

include 'include/header.php';
include 'dbconnect.php';
$id=$_GET['id'];
//echo $id;

$sql="SELECT * FROM subcategories WHERE subcategories.id=:subcategory_id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':subcategory_id',$id);
$stmt->execute();
$subcategory=$stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($item);

 ?>


	 <!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Subcategory Update</h1>
	 	<a href="subcategorylist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i>Go Back</a>
	 </div>

	 <div class="row">
	 	<div class="offset-md-2 col-md-8">
	 		<form action="updatesubcategory.php" method="POST">
	 			<input type="hidden" name="id" value="<?php echo $subcategory['id']?>">
	 			<div class="form-group">
	 				<label for="name">Subcategory Name</label>
	 				<input type="text" name="name" id="name" class="form-control" value="<?php echo $subcategory['name'] ?>">
	 			</div>
	 			<div class="form-group">
	 				<label for="category">Category</label>
	 				<select class="form-control" name="category">
	 					<option>Choose..</option>

	 					<?php 

	 					$sql="SELECT * FROM categories";
	 					$stmt=$pdo->prepare($sql);
	 					$stmt->execute();
	 					$categories=$stmt->fetchAll();

	 					foreach ($categories as $category) {

	 						?>
	 						<option value="<?php echo $category['id']; ?>"<?php 
	 					 if ($category['id']==$subcategory['category_id']) {
	 					  	echo "selected";
	 					  } ?>><?php echo $category['name']; ?></option>
	 					<?php } ?>
	 				</select>
	 			</div>

	 			<input type="submit" class="btn btn-primary float-right" value="Update">
	 			
	 		</form> 
	 	</div>
	 </div>





 <?php 

include 'include/footer.php';

  ?>