<?php

class User_model extends Database {
	
	public static function registerUser($name, $email, $pass){
        self::query("INSERT INTO user (name, password, email) VALUES ('$name', '$pass', '$email')");
    }

    public static function loginUser($email, $pass){
        return self::query("SELECT * FROM user WHERE email = '$email' AND password = '$pass'");
    }

    public static function getAllBillingAddressesByUserID($id){
        return self::query("SELECT * FROM billing_address JOIN jnct_billing_user ON billing_address.billing_address_id = jnct_billing_user.billing_address_id WHERE jnct_billing_user.user_id = $id");
    }

    public static function getAllDeliveryAddressesByUserID($id){
        return self::query("SELECT * FROM delivery_address JOIN jnct_delivery_user ON delivery_address.delivery_address_id = jnct_delivery_user.delivery_address_id WHERE jnct_delivery_user.user_id = $id");
    }

    public static function addDeliveryAddress($delivery_name, $delivery_country, $delivery_city, $delivery_zip_code, $delivery_address, $userID){
        self::query("INSERT INTO delivery_address (name, country, city, zip_code, address) VALUES ('$delivery_name', '$delivery_country', '$delivery_city', '$delivery_zip_code', '$delivery_address')");
        $result = self::query("SELECT delivery_address_id FROM delivery_address ORDER BY delivery_address_id DESC");
        $delivery = $result->fetch();
        $deliveryID = $delivery['delivery_address_id'];
        self::query("INSERT INTO jnct_delivery_user (user_id, delivery_address_id) VALUES ('$userID', '$deliveryID')");
    }
    public static function addBillingAddress($billing_name, $billing_country, $billing_city, $billing_zip_code, $billing_address, $billing_tax_number, $userID){
        self::query("INSERT INTO billing_address (name, country, city, zip_code, address, tax_number) VALUES ('$billing_name', '$billing_country', '$billing_city', '$billing_zip_code', '$billing_address', '$billing_tax_number')");
        $result = self::query("SELECT billing_address_id FROM billing_address ORDER BY billing_address_id DESC");
        $billing = $result->fetch();
        $billingID = $billing['billing_address_id'];
        self::query("INSERT INTO jnct_billing_user (user_id, billing_address_id) VALUES ('$userID', '$billingID')");
    }
}
