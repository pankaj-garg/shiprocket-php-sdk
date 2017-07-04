<?php
require_once 'vendor/autoload.php';

$ProviderShiprocket       = new \Shiprocket\Provider\Shiprocket('userapi@mailinator.com', '123456');
$ShiprocketOrders         = new \Shiprocket\ShiprocketOrders($ProviderShiprocket);
$ShiprocketServiceability = new \Shiprocket\ShiprocketServiceability($ProviderShiprocket);

print_r($ShiprocketServiceability->checkOnOrderID(5091));
die;


print(json_encode($ShiprocketOrders->get(5091)->getData(), JSON_PRETTY_PRINT));
