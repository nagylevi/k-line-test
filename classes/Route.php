<?php

class Route {
	
	public static $validRoutes = array();
	
	//Get the routes
	public static function set($route, $function){
		
		self::$validRoutes[] = $route;
		
		if(@$_GET['url'] == $route){
			$function->__invoke();
		}
		
		
	}
}