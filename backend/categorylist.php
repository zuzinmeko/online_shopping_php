<?php 

include 'include/header.php';
include 'dbconnect.php';

?>


	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Categories List</h1>
		<a href="create_category.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Category</a>
	</div>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Categories DataTables</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Category Name</th>
							<!-- <th>Logo</th> -->
							<th>Option</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Category Name</th>
							<!-- <th>Logo</th> -->
							<th>Option</th>
						</tr>
					</tfoot>
					<tbody>

						<?php 
							$sql="SELECT * FROM categories";
							$stmt=$pdo->prepare($sql);
							$stmt->execute();
							$categories=$stmt->fetchAll();

							foreach ($categories as $category) {
							
						?>
						<tr>
							<td><?php echo $category['id']; ?></td>
							<td><?php echo $category['name']; ?></td>
							<td><a href="category_edit.php?id=<?php echo $category['id'] ?>" class="btn btn-outline-warning btn-sm ml-5">Edit</a> <a href="category_delete.php?id=<?php echo $category['id'] ?>" class="btn btn-outline-danger btn-sm ml-5">Delete</a></td>

						</tr>

					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php 

include 'include/footer.php';

?>