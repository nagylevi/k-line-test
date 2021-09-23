<?php
require_once('models/User_model.php');
class Index extends Controller {
	
    public static function getBillingAddresses() {

        $model = new User_model;
        $stmp = $model->getAllBillingAddressesByUserID($_SESSION['id']);
        $addresses = $stmp->fetchAll();
        if (!empty($addresses)) {
            foreach($addresses as $address){
                echo '<tr>';
                echo '<td>' . $address['name']. '</td>';
                echo '<td>' . $address['country']. '</td>';
                echo '<td>' . $address['city']. '</td>';
                echo '<td>' . $address['zip_code']. '</td>';
                echo '<td>' . $address['address']. '</td>';
                echo $address['tax_number'] == "" ? '<td>-</td>' : '<td>' . $address['tax_number'] . '</td>';
                echo '</tr>';
            }
        }
    }

    public static function getDeliveryAddresses() {

        $model = new User_model;
        $stmp = $model->getAllDeliveryAddressesByUserID($_SESSION['id']);
        $addresses = $stmp->fetchAll();
        if (!empty($addresses)) {
            foreach($addresses as $address){
                echo '<tr>';
                echo '<td>' . $address['name']. '</td>';
                echo '<td>' . $address['country']. '</td>';
                echo '<td>' . $address['city']. '</td>';
                echo '<td>' . $address['zip_code']. '</td>';
                echo '<td>' . $address['address']. '</td>';
                echo $address['is_default'] == 1 ? '<td>Yes</td>' : '<td>No</td>';
                echo '</tr>';
            }
        }
    }

    public static function addDeliveryAddress() {
        $err = array();
        
		if(isset($_POST['submit']))
		{
			$delivery_name = $_POST['delivery-name'];
			$delivery_country = $_POST['delivery-country'];
			$delivery_city = $_POST['delivery-city'];
			$delivery_zip_code = $_POST['delivery-zip-code'];
            $delivery_address = $_POST['delivery-address'];

			if (empty($delivery_name)) {
				array_push($err, "Name is required!");
			}
			if (empty($delivery_country)) {
				array_push($err, "Country is required!");
			}
			if (empty($delivery_city)) {
				array_push($err, "City is required!");
			}
			if (empty($delivery_zip_code)) {
				array_push($err, "Zip code is required!");
			}
			if (empty($delivery_address)) {
				array_push($err, "Address is required!");
			}

			if (count($err) == 0) {
                session_start();
				$model = new User_model;
                $model->addDeliveryAddress($delivery_name, $delivery_country, $delivery_city, $delivery_zip_code, $delivery_address, $_SESSION['id']);

				header("Location: ./");
			} else {
				header("Location: ./");
			}
		}
    }

    public static function addBillingAddress() {
        $err = array();

		if(isset($_POST['submit']))
		{
			$billing_name = $_POST['billing-name'];
			$billing_country = $_POST['billing-country'];
			$billing_city = $_POST['billing-city'];
			$billing_zip_code = $_POST['billing-zip-code'];
            $billing_address = $_POST['billing-address'];
            $billing_tax_number = $_POST['billing-tax-number'];

			if (empty($billing_name)) {
				array_push($err, "Name is required!");
			}
			if (empty($billing_country)) {
				array_push($err, "Country is required!");
			}
			if (empty($billing_city)) {
				array_push($err, "City is required!");
			}
			if (empty($billing_zip_code)) {
				array_push($err, "Zip code is required!");
			}
			if (empty($billing_address)) {
				array_push($err, "Address is required!");
			}

			if (count($err) == 0) {
                session_start();
				$model = new User_model;
				$model->addBillingAddress($billing_name, $billing_country, $billing_city, $billing_zip_code, $billing_address, $billing_tax_number, $_SESSION['id']);
				header("Location: ./");
			} else {
				header("Location: ./");
			}
		}
    }
}