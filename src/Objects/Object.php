<?php
namespace Shiprocket\Objects;


abstract class Object
{
	protected $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @author Pankaj Garg <pankaj.garg@kartrocket.com>
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get($key)
	{
		return isset($this->data[$key]) ? $this->data[$key] : null;
	}
}