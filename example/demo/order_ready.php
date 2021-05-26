<?php 

define('MOOVIN_USERNAME', "username");
define('MOOVIN_PASSWORD', "passwrod");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();


/*
Request
 "idPackage" = XXXX
*/

$response = $moovin->createOrderMoovin($token, $params);


/*
Respuesta
 {
  "status": "SUCCESS",
  "message": "Complete"
}
*/

print_r($response);


