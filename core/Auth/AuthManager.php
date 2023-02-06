<?php

namespace Core\Auth;

use Core\Database\Model;
use Core\Support\Arr;
use RuntimeException;

class AuthManager
{
	protected ?string $authenticatebleModel = null;

	public function attempt(array $credentials)
	{
		if (is_null($this->authenticatebleModel)) {
			throw new RuntimeException("Authenticateable model is not set yet.");
		}

		$password = Arr::pull($credentials, 'password');

		$model = (new $this->authenticatebleModel)
			->select('password')
			->where($credentials)
			->get();

		if ($model && password_verify($password, $model->password)) {
			$this->login($model->select('id')->where($credentials)->get());
			return true;
		}

		return false;
	}

	public function login(Model $model)
	{
		if (is_null($model->id)) {
			throw new RuntimeException("The model doesn't querying id.");
		}

		session()->set('_auth.user', $model->id);
	}

	public function logout()
	{
		session()->remove('_auth.user');
	}

	public function user()
	{
		if ($this->guest()) {
			return null;
		}

		$id = session()->get('_auth.user');

		return (new $this->authenticatebleModel)->where('id', $id)->get();
	}

	public function guest()
	{
		return !session()->has('_auth.user');
	}

	public function setAuthenticatebleModel(string $className)
	{
		if (!class_exists($className)) {
			throw new RuntimeException("$className class is not found.");

		}

		$this->authenticatebleModel = $className;

		return $this;
	}
}