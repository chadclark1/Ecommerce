<?php var_dump($this->session->all_userdata()) ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cart | E-Commerce</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-light bg-faded">
				<h1 class="navbar-brand">Cart | E-Commerce</h1>
			</nav>
		</header>
		<div class="container">
			<h2>Checkout</h2>
			<table class="table">
				<thead>
					<th>Quantity</th>
					<th>Description</th>
					<th>Price</th>
					<th></th>
				</thead>
				<tbody>
<?php 
	$shirt = $this->session->userdata('shirt');
	$cup = $this->session->userdata('cup');
	if($shirt > 0){
?>
					<tr>
						<td><?php $shirt ?></td>
						<td>Dojo Shirt</td>
						<td><?php $shirt_total = $shirt * 19.99; echo $shirt_total; ?></td>
						<td><a href="products/delete" class="btn btn-primary">Delete</a></td>
					</tr>
<?php
	}

	if($cup > 0){
?>
					<tr>
						<td><?php $cup ?></td>
						<td>Dojo Cup</td>
						<td><?php $cup_total = "$cup * 9.99"; echo $cup_total; ?></td>
						<td><a href="products/delete" class="btn btn-primary">Delete</a></td>
					</tr>
<?php
	}
?>
					<tr>
						<td></td>
						<td><h4>Total</h4></td>
						<td><h4><?php echo $cup_total + $shirt_total; ?></h4></td>
						<td></td>
					</tr>
<?php
?>
				</tbody>
			</table>

			<div class="col-md-6 col-md-offset-2">
				<form action="/products/purchase" method="post">
					<fieldset>
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control"></input>
					</fieldset>
					<fieldset>
						<label for="address">Address:</label>
						<input type="text" name="address" class="form-control"></input>
					</fieldset>
					<fieldset>
						<label for="card">Credit Card Number:</label>
						<input type="text" name="card" class="form-control"></input>
					</fieldset>
					<button type="submit" class="btn btn-primary">Place Order</button>
				</form>
			</div>
		</div>
	</body>
</html>