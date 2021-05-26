<?php 

define('MOOVIN_USERNAME', "username");
define('MOOVIN_PASSWORD', "passwrod");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();


/*
Request
 "latitude" = XXXX
 "longitude" = XXX
*/

$response = $moovin->checkLocationValidMoovin($token, $latitude , $longitude);

/*
Respuesta
 {
  "status": "SUCCESS",
  "message": "Complete"
}
*/

print_r($response);


