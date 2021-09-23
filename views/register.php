<?php include 'inc/header.inc.php' ?>

<div class="container">

	<div class="row page-header-row justify-content-center align-items-center">
		<h1 class="page-title">Register</h1>
	</div>

	<div class="row justify-content-center align-items-center">
		<div class="col-lg-4 col-md-6 col-sm-8 border">
			<form action="signup" method="post">
			<div class="mb-6">
				<label for="name" class="form-label">Name</label><br>
				<input type="text" id="name" name="name" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="email" class="form-label">Email</label><br>
				<input type="text" id="email" name="email" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="password_1" class="form-label">Password</label><br>
				<input type="password" id="password_1" name="password_1" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="password_2" class="form-label">Confirm password</label><br>
				<input type="password" id="password_2" name="password_2" class="form-control"><br>
			</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Register">

			</form>
			<p>Already have an account? <a href="/login">Login</a></p>		
		</div>
	</div>
</div>

<?php include 'inc/footer.inc.php' ?>