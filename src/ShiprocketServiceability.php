<?php
namespace Shiprocket;


/**
 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
 *
 * @package Shiprocket
 */
class ShiprocketServiceability extends AbstractRequest
{
	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param int $orderID
	 *
	 * @return array
	 */
	public function checkOnOrderID($orderID)
	{
		return $this->check(['order_id' => $orderID]);
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param $pickupPostCode
	 * @param $deliveryPostCode
	 * @param $weight
	 * @param $isCOD
	 *
	 * @return array
	 */
	public function checkOnShippingDetails($pickupPostCode, $deliveryPostCode, $weight, $isCOD)
	{
		$data = ['pickup_postcode'   => $pickupPostCode,
				 'delivery_postcode' => $deliveryPostCode,
				 'weight'            => $weight,
				 'cod'               => $isCOD];

		return $this->check($data);
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	private function check(array $data)
	{
		return $this->Provider->get('courier/serviceability', $data);
	}
}