<?php 
session_start();
  if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="admin") {
include 'include/header.php';
include 'dbconnect.php';

$id=$_GET['id'];
$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id WHERE items.id=:item_id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(':item_id',$id);
$stmt->execute();
$item=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
 	<h1 class="h3 mb-0 text-gray-800">Item Detail</h1>
 	<a href="itemlist.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Go Back</a>
 </div>

 <div class="container">
 	<div class="row">
 		<div class="col-md-4">
 		<img src="<?php echo $item['photo'] ?>" class="img-fluid">
 		</div>
 		<div class="col-md-8">
 			
 			<dl><dt>Item Name :<?php echo $item['name']; ?></dt></dl>
 			<dl><dt>Item Brand :<?php echo $item['brand_name']; ?></dt></dl>
 			<dl><dt>Item Subcategory :<?php echo $item['sub_name']; ?></dt></dl>
 			<dl><dt>
 				Item Price :
 				<?php
 					if ($item['discount']) {
 						echo $item['discount']."MMK";
 				
 				  ?>
 				  <del><?php echo $item['price']."MMK"; ?></del>
 				  	<?php }else{
 				  		echo $item['price']."MMK";
 				  	} ?>
 				
 			</dt></dl>
 		</div>
 	</div>
 </div>

 <?php 
include 'include/footer.php';

}else{
  header("location:../index.php");
}
  ?>