<?php

namespace App\Core;

class Request

{

	public static function uri()

	{

		return trim(

			parse_url(@$_SERVER['PATH_INFO'],PHP_URL_PATH),'/'

				);

	}
	public function method()
	
	{
		
		return $_SERVER['REQUEST_METHOD'];
	}
}