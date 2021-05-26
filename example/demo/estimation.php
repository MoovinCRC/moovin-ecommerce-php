<?php 

define('MOOVIN_USERNAME', "username");
define('MOOVIN_PASSWORD', "passwrod");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();


/*
Request
{
	"pointCollect":{
		"latitude":9.929652,
		"longitude":-84.134719
	},
	"pointDelivery":{
		"latitude":9.969548,
		"longitude":-84.123881
	},
	"listProduct":
		[
			{
				"quantity":1,
				"nameProduct":"Samsumg",
				"description":"Galaxy S7",
				"size":"S",
				"weight":0.4,
				"price":200000,
				"codeProduct":"234234234234"
			},
			{
				"quantity":1,
				"nameProduct": "clock",
				"description":"LG color Rojo",
				"size":"S",
				"weight":0.1,
				"price":12000,
				"codeProduct":"234234234234"
			}
		],
	"ensure":true
}
*/

$response = $moovin->estimationMoovin($token, $pointcollect, $pointdelivery , $listproducts);

print_r($response);


