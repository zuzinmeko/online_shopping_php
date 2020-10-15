<?php 
session_start();
  if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="admin") {
include 'include/header.php';
include 'dbconnect.php';

?>


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item List</h1>
		<a href="itemcreate.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Item</a>
	</div>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Item Name</th>
							<th>Codeno</th>
							<th>Price</th>
							<th>Option</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Item Name</th>
							<th>Codeno</th>
							<th>Price</th>
							<th>Option</th>
						</tr>
					</tfoot>
					<tbody>

						<?php 
							$sql="SELECT * FROM items";
							$stmt=$pdo->prepare($sql);
							$stmt->execute();
							$items=$stmt->fetchAll();

							foreach ($items as $item) {
							
						?>
						<tr>
							<td><?php echo $item['id']; ?></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo $item['codeno']; ?></td>
							<td>
								<?php 
									if ($item['discount']) {
								echo $item['discount']."MMK"."<br>";
								?>
					<del><?php echo $item['price']."MMK"; ?></del>
								<?php 
									}else{
									echo $item['price']."MMK";
											}
								 ?>
								
							</td>
<td><a href="itemdetail.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-primary btn-sm">Detail</a> <a href="itemedit.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a> <a href="itemdelete.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-danger btn-sm">Delete</a></td>

						</tr>

					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php 

include 'include/footer.php';
}else{
  header("location:../index.php");
}

?>