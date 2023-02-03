<?php

use Core\View\View;

function view(string $view, array $data = [], array $nests = [])
{
	return new View($view, $data, $nests);
}