<?php

namespace App\Controller;

use App\Layout\MainLayout;

class AduanController extends Controller
{
	public function showAll()
	{
		return view('aduan/index')
			->useLayout(new MainLayout(), ['title' => 'Aduan']);
	}
}