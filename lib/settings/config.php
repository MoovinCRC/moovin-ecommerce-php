<?php
$variables =  [
    'version' => "1.0",
    'debug' => defined('MOOVIN_DEBUG') ? MOOVIN_DEBUG : false
];

if( defined('MOOVIN_PROD') ? MOOVIN_PROD : false ){
    //Production
    $variables['api'] =  array(
        'login-url' => 'https://moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/login',
        'estimation-url' => 'https://moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/estimation',
        'create-order-url' => 'https://moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/createOrder',
        'complete-order-url' => "https://moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/completeOrder",
        'delete-order-url' => "https://moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/deleteOrder",
        'inside-zone-coverage-url' => "https://moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/insideZoneCoverage",
        'zone-coverage-url' => "https://moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/zoneCoverage",
        'delivered-package-url' => "https://moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/deliveredPackage", 
    );

}else{
    //Developer
    $variables['api'] =  array(
        'login-url' => 'https://developer.moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/login',
        'estimation-url' => 'https://developer.moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/estimation',
        'create-order-url' => 'https://developer.moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/createOrder',
        'complete-order-url' => "https://developer.moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/completeOrder",
        'delete-order-url' => "https://developer.moovin.me/moovinApiWebServices-1/rest/api/ecommerceExternal/deleteOrder",
        'inside-zone-coverage-url' => "https://developer.moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/insideZoneCoverage",
        'zone-coverage-url' => "https://developer.moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/zoneCoverage",
        'delivered-package-url' => "https://developer.moovin.me/moovinApiWebServices-1/rest/api/moovinEnterprise/partners/deliveredPackage", 
    );
}

return $variables;
