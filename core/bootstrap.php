<?php
	
use App\Core\App;
use App\Core\Db\Connection;
use App\Models\{User,Image,Produit,Tirage};


App::bind('config' , require 'config.php');


App::bind('Image' ,  new Image(
							Connection::make(App::get('config')['database'])	
));

App::bind('User'   , new User(
							Connection::make(App::get('config')['database'])	
));

App::bind('Produit'   , new Produit(
							Connection::make(App::get('config')['database'])	
));

App::bind('Tirage'   , new Tirage(
							Connection::make(App::get('config')['database'])	
));

if (!function_exists('view')) 

{

	function view($page,$data = [])
		
	{
		extract($data);
		return require "app/views/{$page}.view.php";
	}
}
