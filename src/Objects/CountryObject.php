<?php
namespace Shiprocket\Objects;


/**
 * Class CountryObject
 *
 * @package Shiprocket\Objects
 *
 * @property $id
 * @property $name
 * @property $iso_code_2
 * @property $iso_code_3
 * @property $address_format
 * @property $postcode_required
 * @property $status
 */
class CountryObject extends Object
{
	const ALLOWED_KEYS = ['id',
						  'name',
						  'iso_code_2',
						  'iso_code_3',
						  'address_format',
						  'postcode_required',
						  'status'];
}