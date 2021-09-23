<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		echo 'Hello Poonam';
	}
	
	function showme($pages = 'Home')
	{
		echo view('templates/header');
		echo view('pages/'.$pages);
		echo view('templates/footer');
	}
}
