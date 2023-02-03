<?php

namespace App\Controller;

class HomeController
{
	public function index()
	{
		return view('layouts/main')
			->nest([
				'{# sidebar #}' => view('partials/sidebar'),
				'{# top-bar #}' => view('partials/top-bar'),
				'{# body #}' => view('dashboard')
			])
			->with([
				'title' => 'Dashboard'
			]);
	}
}