<?php

namespace App\Controller;

use App\Layout\MainLayout;

class HomeController extends Controller
{
	public function index()
	{
		return view('dashboard')
			->useLayout(new MainLayout(), ['title' => 'Dashboard']);
	}
}