<?php 
session_start();
  if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="admin") {
include 'include/header.php';
include 'dbconnect.php';

 ?>

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
 	<h1 class="h3 mb-0 text-gray-800">Item create</h1>
 	<a href="itemlist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Go Back</a>
 </div>



 <div class="row">
 	<div class="offset-md-2 col-md-8">
 		<form action="additem.php" method="POST" enctype="multipart/form-data">
 			<div class="form-group">
 				<label for="name">Item Name</label>
 				<input type="text" name="name" id="name" class="form-control">
 			</div>
 			<div class="form-group">
 				<label for="photo">Item Photo</label>
 				<input type="file" name="photo" id="photo" class="form-control-file" accept="images/*">
 			</div>
 			<ul class="nav nav-tabs" id="myTab" role="tablist">
 				<li class="nav-item" role="presentation">
 					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#price" role="tab" aria-controls="home" aria-selected="true">Price</a>
 				</li>
 				<li class="nav-item" role="presentation">
 					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="profile" aria-selected="false">Discount Price</a>
 				</li>
 				
 			</ul>
 			<div class="tab-content" id="myTabContent">
 				<div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="home-tab">
 					<input type="number" name="price" class="form-control mt-3" placeholder="Unit Price">
 				</div>
 				<div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="profile-tab">
 					<input type="number" name="discount" class="form-control mt-3" placeholder="Discount Price">
 				</div>
 			</div>
 			<div class="form-group">
 				<label for="brand">Brand</label>
 				<select class="form-control" name="brand" id="brand">
 					<option>Choose....</option>
 					<?php 
 						$sql="SELECT * FROM brands";
 						$stmt=$pdo->prepare($sql);
 						$stmt->execute();
 						$brands=$stmt->fetchAll();

 						foreach ($brands as $brand) {
 					?>	
 					<option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>
 						<?php } ?>


 					
 					
 				</select>
 			</div>
 			<div class="form-group">
 				<label for="subcategory">Sub Categories</label>
 				<select class="form-control" name="subcategory">
 					<option>Choose...</option>
 					<?php 
 						$sql="SELECT * FROM subcategories";
 						$stmt=$pdo->prepare($sql);
 						$stmt->execute();
 						$subcategories=$stmt->fetchAll();

 						foreach ($subcategories as $subcategory) {
 					?>
 					<option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></option>
 						<?php } ?>
 					 
 				</select>
 			</div>
 			<div class="form-group">
 				<label for="description">Description</label>
 				<textarea class="form-control" name="description" id="description"></textarea>
 			</div>
 			<input type="submit" class="btn btn-primary float-right" value="save">
	</form>
 	</div>
 </div>
 <?php 
include 'include/footer.php';
}else{
  header("location:../index.php");
}
  ?>