# API Ecommerce

## Introducción

Optimice sus procesos de envío y reduzca el tiempo de preparación de envíos al integrar en su negocio el servicio logístico de Moovin.

Gracias a la integración con nuestro API podrás imprimir las etiquetas y pedir la recogida de forma rápida. Podrás conocer en todo momento el estado del envío y su localización en tiempo real, enviamos tus pedidos siempre con la mejor opción de forma automática.

El API de Moovin es una API REST basada en un protocolo HTTP y las solicitudes tienen como respuesta un JSON. Esta versión del API utiliza una autentificación por medio de un token de acceso. Todas las solicitudes deben de enviarse a través de https://

Los clientes de Moovin son personas o negocios que requieren de un servicio integral y rápido de envíos, compras o mandados. Estos servicios se cancelan por medio de una tarjeta de crédito, en el caso de las personas individuales, o a través del cargo en cuenta bancaria en el caso de clientes empresariales. Otros colaboradores que utilicen nuestra API pueden crear sus propios clientes para solicitar compras y realizar cobros a través de la misma.

Para facilitar el proceso de integración, antes de solicitar las credenciales, es necesario mantener una reunión previa con el departamento comercial de Moovin. Los objetivos de esta reunión son conocer en detalle el proyecto y asesorarlos sobre las diferentes opciones de servicios.

Para ello, por favor envíenos un correo electrónico a ecommerce@moovin.me, con los siguientes datos:

Nombre y apellidos persona de contacto
Correo electrónico.
Nombre de la empresa que realiza la integración
Cliente. Empresa que requiere el servicio.
E-commece o página web del cliente.
Recomendamos que un programador en su equipo de TI o un desarrollador independiente calificado estén presentes en estas reuniones iniciales.

Luego se procedera a realizar la entrega del ID de Cliente y su Contraseña, los cuales podrá utilizar para el ambiente de sandbox

## Descarga

### Manual

Usted puede descargar el codigo de github:

`git clone https://github.com/MoovinCRC/moovin-ecommerce-php`

### Composer

`"require": { "moovin/phpecommerce": "1.0" }`

## Dependencias

PHP >= 5.3.0
PHP CURL

##Instalación
Defina en su codigo PHP las siguientes constantes

`define('MOOVIN_USERNAME', "your username");`
`define('MOOVIN_PASSWORD', "your passwrod");`
`define('MOOVIN_DEBUG', true);`
`define('MOOVIN_PROD', false);`

Si no está usando el autoload, simplemente cargue esta biblioteca en su proyecto PHP incluyendo moovin.php

`require_once "../your/project/directory/here/lib/moovin.php";`

## Ejemplo de uso

### Autenticación

```
define('MOOVIN_USERNAME', "username");
define('MOOVIN_PASSWORD', "passwrod");
define('MOOVIN_DEBUG', true);
define('MOOVIN_PROD', false);

require_once "../../lib/moovin.php";
$moovin = new Moovin();

$response = $moovin->authPartner();

```

## Estimación

Permite obtener las posibles formas de entrega con su costo y tiempo de entrega.

```
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

```

## Revisar ubicación

```
/*
Request
 "latitude" = XXXX
 "longitude" = XXX
*/

$response = $moovin->checkLocationValidMoovin($token, $latitude , $longitude);
```

## Crear Orden

_Crear una solicitud de entregas._

Cuando se crea una orden se debe generar el código QR con la respuesta de la solicitud. La información que contiene este QR es parámetro orderQR de la respuesta , la misma debe estar impresa para control el Moover (Mensajero) que la recoja y el tracking del paquete. Se requiere que se identifique imprimiendo en la boleta el número de paquete y el logo de Moovin el cual puede descargar

####Parámetros.
idEstimation: representa la respuesta del llamado de la estimación idEstimation.
idDelivery: corresponde al id de cada una de las estimaciones.

```
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


```

## Orden lista para recoger

Este método permite indicar que la orden se encuentra lista para ser recogida por un Moover (mensajero).

```
/*
Request
 "idPackage" = XXXX
*/

$response = $moovin->createOrderMoovin($token, $params);
```

## Eliminar una order

Las órdenes pueden ser eliminadas si su estado es uno de los siguientes:

Creado (INSERT)
Recoger (PICKUP)
Por preparar (PREPARE)

```
/*
Request
 "idPackage" = XXXX
*/

$response = $moovin->deleteOrderMoovin($token, $idPackage);
```

## Validar si se encuentra dentro de la zona de cobertura

Este servicio permite saber si una ubicación señalada en el mapa se encuentra dentro o fuera del área de cobertura por parte del servicio que ofrece Moovin.

```
/*
Request
 "latitude" = XXXX
 "longitude" = XXX
*/

$response = $moovin->checkLocationValidMoovin($token, $latitude , $longitude);
```

## Puntos de la zona de cobertura

Se muestra una lista de coordenadas geográficas (path de coordenadas) que corresponden a la zona de cobertura de servicios de Moovin.

```
/*
Request
 "token" = XXXX
*/

$response = $moovin->getZoneCoverageMoovin($token);
```

## Solicitud estado del paquete

Se realiza la consulta, para conocer si el paquete se ha entregado.

##### Estados

NOEXISTPACKAGE: Si el paquete no existe en el sistema.
DELIVERED:: El paquete ha sido entregado.
UNDELIVERED:: El paquete no se a entregado.

```
/*
Request
 "idPackage" = XXXX
*/

$response = $moovin->getStatusPackageMoovin($token , $idPackage);

```

Version API REST
https://api.moovin.me/

---

<div>
    <a href="https://blackfire.io/docs/introduction?utm_source=swiftmailer&utm_medium=github_readme&utm_campaign=logo">
        <img src="https://i1.wp.com/www.moovin.me/wp-content/uploads/2021/01/logotipo.png?fit=250%2C65&ssl=1" width="255px" alt="Blackfire.io">
    </a>
</div>
