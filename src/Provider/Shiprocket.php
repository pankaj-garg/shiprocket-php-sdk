<?php
namespace Shiprocket\Provider;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;


/**
 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
 *
 * @package Shiprocket
 */
class Shiprocket implements IProvider
{
	/* @var string */
	private $username;

	/* @var string */
	private $password;

	/* @var string */
	private $token;

	const ENDPOINT_PREFIX = 'https://krmct001.kartrocket.com/v1/external/';

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param string $username
	 * @param string $password
	 * @param string $token (OPTIONAL)
	 */
	public function __construct($username, $password, $token = null)
	{
		$this->setUsername($username)
			 ->setPassword($password);

		if (!is_null($token)) {
			$this->setToken($token);
		} else {
			$this->login();
		}
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return $this
	 * @throws \Exception
	 */
	private function login()
	{
		$response = $this->post('auth/login', ['email'    => $this->getUsername(),
											   'password' => $this->getPassword()]);

		if (empty($response) || empty($response['token'])) {
			throw new \Exception('Invalid credentials');
		}

		$this->setToken($response['token']);

		return $this;
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param string $endpoint
	 * @param array  $parameters
	 *
	 * @return array
	 */
	public function post($endpoint, $parameters)
	{
		$Response = (new Client())->request('POST', self::ENDPOINT_PREFIX . $endpoint, ['headers'     => $this->getHeaders(),
																						'form_params' => $parameters]);

		return $this->getResponse($Response);
	}

	/**
	 * @param string $endpoint
	 * @param array  $parameters (OPTIONAL)
	 *
	 * @return array
	 */
	public function get($endpoint, $parameters = [])
	{
		$Response = (new Client())->request('GET', self::ENDPOINT_PREFIX . $endpoint, ['headers' => $this->getHeaders(),
																					   'query'   => $parameters]);

		return $this->getResponse($Response);
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param Response $Response
	 *
	 * @return mixed
	 */
	private function getResponse(Response $Response)
	{
		echo "\n\n" . $Response->getBody()
					  ->__toString();

		return json_decode($Response->getBody()
									->__toString(), true);
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array
	 */
	private function getHeaders()
	{
		return ['Accept'        => 'application/json',
				'Authorization' => 'Bearer ' . $this->getToken()];
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $username
	 *
	 * @return Shiprocket
	 * @throws \Exception
	 */
	protected function setUsername($username)
	{
		$username = trim($username);

		if (empty($username)) {
			throw new \Exception('Username can\'t be empty');
		}

		$this->username = $username;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	private function getPassword()
	{
		return $this->password;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $password
	 *
	 * @return Shiprocket
	 * @throws \Exception
	 */
	protected function setPassword($password)
	{
		$password = trim($password);

		if (empty($password)) {
			throw new \Exception('Password can\'t be empty');
		}

		$this->password = $password;

		return $this;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @return string
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $token
	 *
	 * @return Shiprocket
	 * @throws \Exception
	 */
	protected function setToken($token)
	{
		$token = trim($token);

		if (empty($token)) {
			throw new \Exception('Empty token');
		}

		$this->token = $token;

		return $this;
	}
}