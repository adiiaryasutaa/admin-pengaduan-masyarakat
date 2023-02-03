<?php

namespace Core\View;

use Core\Application;

class View
{
	protected string $view;
	protected array $data;
	protected array $nests;

	public function __construct(string $view, array $data = [], array $nests = [])
	{
		$this->view = $view;
		$this->data = $data;
		$this->nests = $nests;
	}

	public function render()
	{
		return $this->getContent();
	}

	protected function getContent()
	{
		foreach ($this->data as $key => $value) {
			$$key = $value;
		}

		ob_start();
		require_once(Application::getViewPath() . '\\' . $this->view . '.view.php');
		$content = ob_get_clean();

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
}