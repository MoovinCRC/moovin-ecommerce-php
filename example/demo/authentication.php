<?php 

define('MOOVIN_USERNAME', "username");
define('MOOVIN_PASSWORD', "passwrod");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();

/*
    Obtiene el token de acceso a la plataforma. Solicite sus credenciales a ecommerce@moovin.me
*/
$response = $moovin->authPartner();

/*
Respuesta
  {
    "token": "eyJhbGciOiJIUzI1NiIsInppcCI6IkRFRiJ9.eNqqViouTVKyUqqOUcpMcS5KTUnNK8lMzAktTi1yzStJLSooyixOjVGyMtIBKQgoyk_LzAHxTYD8UqCivMRcEDdGKSQzOT8tPy8zMUYJKFWUnwMRTkUypFZJRym1okDJytDUyNTE3NDU0KAWAAAA__8.QRHTX-tyC7l315KmR66NirRQsFY4Zoaca3tNQtXjZTM",
    "expirationDate": "2018-05-04T22:05:10Z",
    "status": "SUCCESS",
    "message": "Information User"
  }
*/

print_r($response);


