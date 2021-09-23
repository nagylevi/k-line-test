<?php include 'inc/header.inc.php' ?>
<?php
if(!isset($_SESSION["name"])){
header("Location: login");
}
?>
<div class="container">
  <div class="row page-header-row justify-content-center align-items-center">
    <h1 class="page-title">Home page</h1>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8">	
      <p class="logout-msg">Wellcome <?php echo $_SESSION['name'] ?>! Not you? <a href="/logout">Logout</a></p>
    </div>
  </div>

  <div class="row justify-content-center align-items-center">
    <div class="col-12">
      <h4>Billing Addresses</h4>
      <table class="addresses-table">
        <tr>
          <th>Name</th>
          <th>Country</th>
          <th>City</th>
          <th>Zip code</th>
          <th>Address</th>
          <th>Tax number</th>
        </tr>
        <?php Index::getBillingAddresses(); ?>
      </table>
    </div>
  </div>

  <div class="row justify-content-center align-items-center">
    <div class="col-12">
      <h4>Delivery Addresses</h4>
      <table class="addresses-table">
        <tr>
          <th>Name</th>
          <th>Country</th>
          <th>City</th>
          <th>Zip code</th>
          <th>Address</th>
          <th>Default</th>
        </tr>
        <?php Index::getDeliveryAddresses(); ?>
      </table>
    </div>
  </div>

  <div class="row justify-content-evenly">

		<div class="col-lg-4 col-md-6 col-sm-12 border">
      <h4>Add Delivery Address</h4>
			<form action="adddelivery" method="post">
			<div class="mb-6">
				<label for="delivery-name" class="form-label">Name</label><br>
				<input type="text" id="delivery-name" name="delivery-name" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="delivery-country" class="form-label">Country</label><br>
				<input type="text" id="delivery-country" name="delivery-country" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="delivery-city" class="form-label">City</label><br>
				<input type="text" id="delivery-city" name="delivery-city" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="delivery-zip-code" class="form-label">Zip code</label><br>
				<input type="text" id="delivery-zip-code" name="delivery-zip-code" class="form-control"><br>
			</div>
      <div class="mb-6">
				<label for="delivery-address" class="form-label">Address</label><br>
				<input type="text" id="delivery-address" name="delivery-address" class="form-control"><br>
			</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Add">
			</form>
		</div>

    <div class="col-lg-4 col-md-6 col-sm-12 border">
      <h4>Add Billing Address</h4>
			<form action="addbilling" method="post">
			<div class="mb-6">
				<label for="billing-name" class="form-label">Name</label><br>
				<input type="text" id="billing-name" name="billing-name" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="billing-country" class="form-label">Country</label><br>
				<input type="text" id="billing-country" name="billing-country" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="billing-city" class="form-label">City</label><br>
				<input type="text" id="billing-city" name="billing-city" class="form-control"><br>
			</div>
			<div class="mb-6">
				<label for="billing-zip-code" class="form-label">Zip code</label><br>
				<input type="text" id="billing-zip-code" name="billing-zip-code" class="form-control"><br>
			</div>
      <div class="mb-6">
				<label for="billing-address" class="form-label">Address</label><br>
				<input type="text" id="billing-address" name="billing-address" class="form-control"><br>
			</div>
      <div class="mb-6">
				<label for="billing-tax-number" class="form-label">Tax number (opcional)</label><br>
				<input type="text" id="billing-tax-number" name="billing-tax-number" class="form-control"><br>
			</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Add">
			</form>
		</div>

	</div>
</div>
<?php include 'inc/footer.inc.php' ?>