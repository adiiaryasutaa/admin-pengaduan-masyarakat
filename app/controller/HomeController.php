<?php

namespace App\Controller;

use App\Layout\MainLayout;

class HomeController extends Controller
{
	public function index()
	{
		// Middleware
		if (auth()->guest()) {
			return redirect('/login');
		}

		return view('dashboard')
			->useLayout(new MainLayout(), ['title' => 'Dashboard']);
	}
}