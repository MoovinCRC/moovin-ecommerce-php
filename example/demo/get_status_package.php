<?php 

define('MOOVIN_USERNAME', "Moovin");
define('MOOVIN_PASSWORD', "xse4537wshHtty89");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();


/*
Request
 "idPackage" = XXXX
*/

$response = $moovin->getStatusPackageMoovin($token , $idPackage);

/*
Respuesta
 {
  "statusPackage": "DELIVERED",
  "date": "2018-08-23T11:59:28Z",
  "status": "SUCCESS",
  "message": "Complete"
}
*/

print_r($response);


