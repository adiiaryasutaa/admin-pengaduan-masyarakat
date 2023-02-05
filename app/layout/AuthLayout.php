<?php

namespace App\Layout;

use Core\View\LayoutContract;

class AuthLayout implements LayoutContract
{
	public function getView()
	{
		return view('layouts/auth');
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
		return [];
	}
}