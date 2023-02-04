<?php

namespace App\Controller;

use App\Layout\MainLayout;

class HomeController
{
	public function index()
	{
		return view('dashboard')
			->useLayout(new MainLayout(), ['title' => 'Dashboard']);
	}
}