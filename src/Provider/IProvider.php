<?php
namespace Shiprocket\Provider;


interface IProvider
{
	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param string $endpoint
	 * @param array  $parameters
	 *
	 * @return array
	 */
	public function post($endpoint, $parameters);

	/**
	 * @param string $endpoint
	 * @param array  $parameters (OPTIONAL)
	 *
	 * @return array
	 */
	public function get($endpoint, $parameters = []);
}