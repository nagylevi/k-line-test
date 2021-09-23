<?php include 'inc/header.inc.php' ?>

<div class="container">

	<div class="row page-header-row justify-content-center align-items-center">
		<h1 class="page-title">Login</h1>
	</div>

	<div class="row justify-content-center align-items-center">
		<div class="col-lg-4 col-md-6 col-sm-8 border">
			<form action="signin" method="post">
			<div class="mb-3">
				<label for="email" class="form-label">Email address</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Login">
			</form>
	
			<p>Do not have an account? <a href="/register">Register</a></p>
		</div>
	</div>
</div>

<?php include 'inc/footer.inc.php' ?>