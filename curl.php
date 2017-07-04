<?php
$url = "https://apiv2.shiprocket.in/v1/external/courier/
serviceability?pickup_postcode=110058&delivery_postcode=110030&weight=1.00&
cod=0";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json',
										'Authorization: Bearer <YOUR_TOKEN_HERE>']);
$result = curl_exec($curl);
curl_close($curl);
print_r(json_decode($result, true));