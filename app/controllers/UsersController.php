<?php 

namespace App\Controllers;

use App\Core\App;
use App\Core\Db\Connection;

class UsersController

{

	public function login()
	
	{
		if($_POST['login'])
		
		{

			if(empty($_POST['username']) || empty($_POST['password']))
				die("Error");

			$_user = Connection::make(App::get('config')['database'])->quote($_POST['username']);
			$_pass = Connection::make(App::get('config')['database'])->quote(md5($_POST['password']));
			
			$users = App::get('User')->selectAll("WHERE `username` = {$_user} AND `password` = {$_pass}");
			
			session_start();

		    if($users != NULL)

		    {

		    	$_SESSION['admin'] = $users[0];
		   		echo 	"<script type='text/javascript'>
			      		function Redirect() 
			      		{  
			      		window.location='/home'; 
			      		} 
			      		setTimeout('Redirect()', 0);  
			    		</script>";		    	
		    }
		    else

		    {

		    	$_SESSION['admin'] = FALSE;
		    	echo "Erreur dans les données";
		   		echo 	"<script type='text/javascript'>
			      		function Redirect() 
			      		{  
			      		window.location='/'; 
			      		} 
			      		setTimeout('Redirect()', 1000);  
			    		</script>";			    	
		    }

		}


	}
}
?>