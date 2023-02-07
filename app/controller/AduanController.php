<?php

namespace App\Controller;

use App\Layout\MainLayout;
use Core\Model\Aduan;

class AduanController extends Controller
{
	public function showAll()
	{
		// Middleware
		if (auth()->guest()) {
			return redirect('/login');
		}

		$aduan = (new Aduan)->get();

		return view('aduan/index', ['aduan' => $aduan])
			->useLayout(new MainLayout(), ['title' => 'Aduan']);
	}
}