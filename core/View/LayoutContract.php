<?php

namespace Core\View;

interface LayoutContract
{
	public function getView();

	public function getSlot();

	public function getData();

	public function getNests();
}