<?php
require_once MOOVIN_LIB_PATH."/model/mdl_moovin.php";

class Moovin extends mdl_moovin{

    public function __construct() {
        $this->config = require_once MOOVIN_LIB_PATH.'/settings/config.php';
    }

    public function authPartner(){
        if (!defined('MOOVIN_USERNAME')) {
            return array("error"=> true , "description"=> "Por favor defina la constante usuario - moovin") ;
        }

        if (!defined('MOOVIN_PASSWORD')) {
            return array("error"=> true , "description"=> "Por favor defina la constante password - moovin") ;
        }

        if (!defined('MOOVIN_PROD')) {
            return array("error"=> true , "description"=> "Por favor defina el ambiente") ;
        }

       return $this->auth($this->config["api"]["login-url"], MOOVIN_USERNAME, MOOVIN_PASSWORD);
    }

    public function estimationMoovin($token, $pointcollect, $pointdelivery , $listproducts){
        return $this->estimation($this->config["api"]["estimation-url"], $token, $pointcollect, $pointdelivery , $listproducts);
    }

    public function createOrderMoovin($token, $params){
        return $this->createOrder($this->config["api"]["create-order-url"], $token, $params);
    }

    public function orderReadyMoovin($token, $idPackage){
        return $this->orderReady($this->config["api"]["complete-order-url"], $token, $idPackage);
    }

    public function deleteOrderMoovin($token, $idPackage){
        return $this->deleteOrder($this->config["api"]["delete-order-url"], $token, $idPackage);
    }

    public function checkLocationValidMoovin($token, $latitude , $longitude){
        return $this->checkLocationValid($this->config["api"]["inside-zone-coverage-url"], $token, $latitude , $longitude);
    }

    public function getZoneCoverageMoovin($token){
        return $this->getZoneCoverage($this->config["api"]["zone-coverage-url"], $token);
    }

    public function getStatusPackageMoovin($token, $idPackage){
        return $this->getStatusPackage($this->config["api"]["delivered-package-url"], $token, $idPackage); 
    }
        
}
