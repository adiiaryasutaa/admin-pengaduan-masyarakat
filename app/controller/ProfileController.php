<?php

namespace App\Controller;

use App\Layout\MainLayout;

class ProfileController extends Controller
{
	public function index()
	{
		// Middleware
		if (auth()->guest()) {
			return redirect('/login');
		}

		return view('profile/index', ['user' => auth()->user()])
			->useLayout(new MainLayout());
	}
}