<?php

namespace App\Controllers;

use App\Core\App;

class PagesController

{

	public function login()
	
	{
		session_start();

		if($_SESSION['admin'] == FALSE)
			return view('login');

		else
		   	echo 	"<script type='text/javascript'>
		      		function Redirect() 
		      		{  
		      		window.location='/home'; 
		      		} 
		      		setTimeout('Redirect()', 0);  
		    		</script>";
	}

	public function home()
	
	{
		
		session_start();

		if($_SESSION['admin'] == FALSE)
			return view('login');
		
		else

		{
			$produits = App::get('Produit')->selectAll();
			$imgid = App::get('Image')->arrayImageOfIdAndName();
			return view('index',compact('produits','imgid'));
		}
	}

	public function logout()
	
	{
		
		session_start();

		if($_SESSION['admin'] != FALSE)
		{

			$_SESSION['admin'] = FALSE;

		   	echo 	"<script type='text/javascript'>
		      		function Redirect() 
		      		{  
		      		window.location='/'; 
		      		} 
		      		setTimeout('Redirect()', 2000);  
		    		</script>";
		}
	}
}