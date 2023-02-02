<?php

namespace Core\Http;

class Response
{
	protected $original;
	protected string $content;
	protected int $status;

	public function __construct($content, int $status = 200)
	{
		$this->setContent($content);
		$this->setStatus($status);
	}

	public function setContent($content)
	{
		$this->original = $content;

		$this->content = $content;
	}

	public function setStatus(int $status)
	{
		$this->status = $status;
	}

	public function send()
	{
		http_response_code($this->status);
		echo $this->content;
	}
}