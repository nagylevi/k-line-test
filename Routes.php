<?php

//Crete the index view
Route::set('', function(){
	Index::CreateView('index');
});

//Crete the login view
Route::set('login', function(){
	Login::CreateView('login');
});

//Crete the register view
Route::set('register', function(){
	Register::CreateView('register');
});

Route::set('signup', function(){
	Register::signup();
});

Route::set('signin', function(){
	Login::signin();
});

Route::set('logout', function(){
	Login::logout();
});

Route::set('adddelivery', function(){
	Index::addDeliveryAddress();
});

Route::set('addbilling', function(){
	Index::addBillingAddress();
});