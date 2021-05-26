<?php 

define('MOOVIN_USERNAME', "username");
define('MOOVIN_PASSWORD', "passwrod");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();


/*
Request
 "token" = XXXX
*/

$response = $moovin->getZoneCoverageMoovin($token);

/*
Respuesta
 {
  "list": [
    {
      "lat": 10.062967,
      "lng": -84.128109
    },
    {
      "lat": 10.06584,
      "lng": -84.09515
    },
    {
      "lat": 10.062545,
      "lng": -84.07631
    },
    {
      "lat": 10.055192,
      "lng": -84.056441
    },
    {
      "lat": 10.048559,
      "lng": -84.040604
    },
    {
      "lat": 10.038374,
      "lng": -84.007946
    }
    ]
}
*/

print_r($response);


