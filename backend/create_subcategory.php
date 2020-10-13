<?php 

include 'include/header.php';
include 'dbconnect.php';

 ?>

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
 	<h1 class="h3 mb-0 text-gray-800">Sub Category create</h1>
 	<a href="subcategorylist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Go Back</a>
 </div>



 <div class="row">
 	<div class="offset-md-2 col-md-8">
 		<form action="addsubcategory.php" method="POST">
 			<div class="form-group">
 				<label for="name">Subcategory Name</label>
 				<input type="text" name="name" id="name" class="form-control">
 			</div>
 			<div class="form-group">
 				<label for="photo">Category</label>
 				<!-- <input type="number" name="category" class="form-control" id="category"> -->
 				<select class="form-control" name="category" id="category">
 					<option>Choose....</option>
 					<?php 
 						$sql="SELECT * FROM categories";
 						$stmt=$pdo->prepare($sql);
 						$stmt->execute();
 						$categories=$stmt->fetchAll();

 						foreach ($categories as $category) {
 					?>	
 					<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
 						<?php } ?>


 					
 					
 				</select>
 			</div>
 			<input type="submit" class="btn btn-primary float-right" value="save">
	</form>
 	</div>
 </div>
 <?php 
include 'include/footer.php';
  ?>