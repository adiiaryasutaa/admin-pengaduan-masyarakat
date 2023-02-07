<?php

namespace App\Layout;

use Core\View\LayoutContract;

class MainLayout implements LayoutContract
{
	public function getView()
	{
		return view('layouts/main');
	}

	public function getSlot()
	{
		return '{# main #}';
	}

	public function getData()
	{
		return [];
	}

	public function getNests()
	{
		return [
			'{# sidebar #}' => view('partials/sidebar'),
			'{# top-bar #}' => view('partials/top-bar', ['user' => auth()->user()]),
		];
	}
}