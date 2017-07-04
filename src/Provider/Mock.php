<?php
namespace Shiprocket\Provider;


/**
 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
 *
 * @package Shiprocket\Provider
 */
class Mock implements IProvider
{
	/** @var array */
	private $responses;

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param array $responses
	 */
	public function __construct(array $responses)
	{
		$this->responses = $responses;
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param string $endpoint
	 * @param array  $parameters
	 *
	 * @return array
	 */
	public function post($endpoint, $parameters)
	{
		return $this->responses['post.' . $endpoint] ?? null;
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param string $endpoint
	 * @param array  $parameters
	 *
	 * @return array
	 */
	public function get($endpoint, $parameters = [])
	{
		return $this->responses['get.' . $endpoint] ?? null;
	}
}