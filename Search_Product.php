<?php

if (isset($_POST['search'])) {

	//Nhúng file kết nối với database
	include_once('connection.php');
	//Lấy dữ liệu từ file 
	$search   = $_POST['txtSearch'];
	$result = pg_query($conn, "SELECT productname,price,quantity,categoryid,image,shortdes FROM public.product WHERE productname LIKE '%{$search}%'");
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
	<div class="container">
		<table class="table table-striped table-hover">
			<thead>
				<tr>

					<th scope="col">Product Name</th>
					<th scope="col">Product Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Category ID</th>
					<th scope="col">Image</th>
					<th scope="col">Description</th>

				</tr>
			</thead>
			<tbody>
				<?php
				if ($result) {
					echo "<h2>Search with keyword: $search</h2>";
				} else
					echo "Erorr!.";
				$id = 1;
				while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
				?>
					<tr>
						<td><?php echo $row["productname"]; ?></td>
						<td><?php echo $row["price"]; ?></td>
						<td><?php echo $row["quantity"]; ?></td>
						<td><?php echo $row["categoryid"]; ?></td>
						<td>
							<img src="image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
						</td>
						<td><?php echo $row["shortdes"]; ?></td>

					</tr>
				<?php $id++;
				} ?>
			</tbody>
		</table>
	</div>

</body>

</html>