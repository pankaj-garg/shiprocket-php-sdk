<?php
namespace Shiprocket;


use Shiprocket\Objects\CountryObject;

/**
 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
 *
 * Class ShiprocketCountries
 *
 * @package Shiprocket
 */
class ShiprocketCountries extends AbstractRequest
{
	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array <CountryObject>
	 */
	public function getCountries()
	{
		$countries = $this->Provider->get('countries');

		$Countries = [];
		foreach ($countries['data'] as $country) {
			$Countries[] = new CountryObject($country);
		}

		return $Countries;
	}
}