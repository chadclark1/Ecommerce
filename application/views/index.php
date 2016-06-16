<?php var_dump($this->session->all_userdata()) ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Store | E-Commerce</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-light bg-faded">
				<h1 class="navbar-brand">E-Commerce</h1>
			</nav>
		</header>
		<div class="container">
			<h2>Products</h2>
			<h4 class="text-right"><a href="products/cart" >Cart(<?php echo $cart ?>)</a></h4>
			<table class="table">
				<thead>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
					<th></th>
				</thead>
				<tbody>
<?php 

	

	foreach ($products as $product) {
?>
					<tr>
						<form action= "/products/add/<?php echo $product['id']; ?>" method="post">
							<td><?php echo $product['description']; ?></td>
							<td>$<?php echo $product['price']; ?></td>
							<td>
								<select class="form-control" name="<?php echo $product['id']; ?>">
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								</select>
							</td>
							<td><button type="submit" class="btn btn-primary">Add to Cart</button></td>
						</form>
					</tr>
<?php
		
	}
?>

				</tbody>
			</table>
		</div>

	</body>
</html>