<?php

namespace Core\View;

use Core\Application;

class View
{
	protected string $view;
	protected array $data;
	protected array $nests;
	protected array $layout;

	public function __construct(string $view, array $data = [], array $nests = [], LayoutContract $layout = null)
	{
		$this->view = $view;
		$this->data = $data;
		$this->nests = $nests;
		$this->useLayout($layout);
	}

	public function render()
	{
		return $this->getContent();
	}

	protected function getContent()
	{
		if (!empty($this->layout)) {
			[$slot, $content] = $this->layout;

			$content = $content->render();
		}

		foreach ($this->data as $key => $value) {
			$$key = $value;
		}

		ob_start();
		require_once(Application::getViewPath() . '\\' . $this->view . '.view.php');
		$content = isset($slot) ? str_replace($slot, ob_get_clean(), $content) : ob_get_clean();

		foreach ($this->nests as $key => $view) {
			$content = str_replace($key, $view->render(), $content);
		}

		return $content;
	}

	public function with($keys, $value = null)
	{
		if (is_array($keys)) {
			foreach ($keys as $key => $value) {
				$this->with($key, $value);
			}
		} else {
			$this->data[$keys] = $value;
		}

		return $this;
	}

	public function nest($keys, $value = null)
	{
		if (is_array($keys)) {
			foreach ($keys as $key => $value) {
				$this->nest($key, $value);
			}
		} else {
			$this->nests[$keys] = $value;
		}

		return $this;
	}

	public function useLayout(LayoutContract $layout = null, array $data = [])
	{
		if (is_null($layout)) {
			$this->layout = [];
			return $this;
		}

		$view = $layout->getView();

		$this->layout = [
			$layout->getSlot(),
			is_string($view) ? 
			view($view, array_merge($layout->getData(), $data), $layout->getNests()) :
			$view->with(array_merge($layout->getData(), $data))->nest($layout->getNests())
		];

		return $this;
	}
}