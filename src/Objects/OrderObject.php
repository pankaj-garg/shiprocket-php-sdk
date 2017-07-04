<?php
namespace Shiprocket\Objects;


/**
 * Class CountryObject
 *
 * @package Shiprocket\Objects
 */
class OrderObject extends Object
{
	const ALLOWED_KEYS = ['id',
						  'name',
						  'iso_code_2',
						  'iso_code_3',
						  'address_format',
						  'postcode_required',
						  'status'];
}