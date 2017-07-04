<?php
namespace Shiprocket;


use Shiprocket\Objects\OrderObject;


/**
 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
 *
 * Class ShiprocketOrders
 *
 * @package Shiprocket
 */
class ShiprocketOrders extends AbstractRequest
{
	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param $id
	 *
	 * @return OrderObject
	 */
	public function get($id)
	{
		$response = $this->Provider->get('orders/show/' . $id, $this->buildParameters());

		return new OrderObject($response['data']);
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array <OrderObject>
	 */
	public function getAll()
	{
		$response = $this->Provider->get('orders', $this->buildParameters());

		return $this->buildOrderObjectList($response);
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array <OrderObject>
	 */
	public function getUnProcessable()
	{
		$response = $this->Provider->get('orders/unprocessable', $this->buildParameters());

		return $this->buildOrderObjectList($response);
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array <OrderObject>
	 */
	public function getManifested()
	{
		$response = $this->Provider->get('orders/manifested', $this->buildParameters());

		return $this->buildOrderObjectList($response);
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @return array <OrderObject>
	 */
	public function getProcessable()
	{
		$response = $this->Provider->get('orders/processable', $this->buildParameters());

		return $this->buildOrderObjectList($response);
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 */
	public function syncChannelOrders()
	{
		$this->Provider->get('orders/fetch');

		return true;
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 */
	public function syncChannelStatus()
	{
		$this->Provider->get('orders/status');

		return true;
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param array $idList
	 *
	 * @return boolean
	 */
	public function cancelOrders(array $idList)
	{
		$this->Provider->post('orders/cancel', ['ids' => $idList]);

		return true;
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param OrderObject $Order
	 * @param int         $courierID (OPTIONAL)
	 *
	 * @return array
	 */
	public function generateLabel(OrderObject $Order, $courierID = null)
	{
		$response = $this->Provider->post('courier/generate/label', ['shipment_id' => [$Order->shipment_id],
																	 'courier_id'  => $courierID]);
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param array $shipmentIDList
	 *
	 * @return array
	 */
	public function bulkGenerateLabel(array $shipmentIDList)
	{
	}

	/**
	 * @author Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param OrderObject $Order
	 *
	 * @return array
	 */
	public function generatePickup(OrderObject $Order)
	{
	}

	/**
	 * @author  Pankaj Garg <garg.pankaj15@gmail.com>
	 *
	 * @param array $response
	 *
	 * @return array
	 */
	protected function buildOrderObjectList(array $response)
	{
		$Orders = [];
		foreach ($response['data'] as $order) {
			$Orders[] = new OrderObject($order);
		}

		return $Orders;
	}
}