<?php

namespace App\Controller;

use App\Layout\AuthLayout;

class AuthController extends Controller
{
	public function login()
	{
		// Middleware
		if (auth()->user()) {
			return redirect('/');
		}

		return view('login')
			->useLayout(new AuthLayout(), ['title' => 'Masuk']);
	}

	public function authenticate()
	{
		// Middleware
		if (auth()->user()) {
			return redirect('/');
		}

		$credentials = $this->request->only(['username', 'password']);

		if (auth()->attempt($credentials)) {
			return redirect('/');
		}

		return back();
	}

	public function logout()
	{
		// Middleware
		if (auth()->guest()) {
			return redirect('/');
		}

		auth()->logout();

		return redirect('/login');
	}
}