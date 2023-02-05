<?php

namespace App\Controller;

use Core\Application;
use Core\Http\Request;

abstract class Controller
{
	protected Request $request;

	public function __construct()
	{
		$this->request = Application::getRequest();
	}
}