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
	"idEstimation":3045,
	"idDelivery":4,
	"idOrder":"343842390jdsh3ju03424",
	"email":"ejimenez@moovin.me",
	"emailAccount":"moovin@movin.me",
	"prepared":false,
	"pointCollect":{
		"latitude":9.929652,
		"longitude":-84.134719,
		"locationAlias":"Moovin",
		"name":"Edward",
    	"phone":"8798**8684",
		"notes":"Decirle que es fragil"
	},
	"pointDelivery":{
		"latitude":9.929652,
		"longitude":-84.134719,
		"locationAlias":"Autopista 27",
		"name":"Daniel Somlo",
    	"phone":"8917**41",
		"notes":"Casa de color amarilla",
		"documents":[  
                  {  
                     "name":"Cédula",
                     "fields":[  
                        {  
                           "name":"Cédula frontal",
                           "type":"image",
                           "description":"Que la cédula se encuentre en perfecto estado",
                           "url":"Información sobre prodecimiento"
                        },
                        {  
                           "name":"Cédula reverso",
                           "type":"image",
                           "description":"Que la cédula se encuentre en perfecto estado",
                           "url":"Información sobre prodecimiento"
                        }
                     ]
                  },
                  {  
                     "name":"Contancia salarial",
                     "fields":[  
                        {  
                           "name":"Constancia al día",
                           "type":"document",
                           "description":"Recoger contancia salarial con 30 días de vigencia"
                        }
                     ]
                  }
               ],
        "listPayment": [
			{
			    "description":"Total de cobro",
			    "amount":1000,
			    "currency":"colones",
			    "method":"cash"
			 }
		]
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

$response = $moovin->createOrderMoovin($token, $params);

print_r($response);


