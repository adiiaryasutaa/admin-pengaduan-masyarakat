<?php

namespace App\Controller;

use App\Layout\AuthLayout;

class AuthController extends Controller
{
	public function login()
	{
		return view('login')
			->useLayout(new AuthLayout(), ['title' => 'Masuk']);
	}

	public function authenticate()
	{
		$credentials = $this->request->only(['username', 'password']);

		if (auth()->attempt($credentials)) {
			return redirect('/');
		}

		return back();
	}
}