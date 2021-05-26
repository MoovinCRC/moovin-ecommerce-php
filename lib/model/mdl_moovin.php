<?php
class mdl_moovin {

    public function __construct() {

    }

    public function auth($endpoint, $username, $password) {
        return  $this->ws($endpoint,
        array("Content-Type: application/json"),
        array("username"=>$username , "password"=> $password),
        "POST");
    }

    public function estimation($endpoint, $token, $pointcollect, $pointdelivery , $listproducts) {
        return  $this->ws($endpoint,  
        array("Content-Type: application/json","token: ".$token), 
        array("pointCollect"=>$pointcollect, "pointDelivery"=>$pointdelivery, "listProduct"=>$listproducts), 
        "POST");
   }


    public function createOrder($endpoint, $token, $params) {
        return  $this->ws($endpoint,  
        array("Content-Type: application/json","token: ".$token), 
        $params, 
        "POST");
    }

    public function orderReady($endpoint, $token, $idPackage) {
        return  $this->ws($endpoint,  
        array("Content-Type: application/json","token: ".$token), 
        array("idPackage"=>$idPackage), 
        "POST");
    }

    public function deleteOrder($endpoint, $token, $idPackage) {
        return  $this->ws($endpoint,  
        array("Content-Type: application/json","token: ".$token), 
        array("idPackage"=>$idPackage), 
        "POST");
    }

    public function checkLocationValid($endpoint, $token, $latitude , $longitude) {
        return  $this->ws($endpoint."?latitude=".$latitude."&longitude=".$longitude,  
        array("Content-Type: application/json","token: ".$token), 
        array("idPackage"=>$idPackage), 
        "GET");
    }

    public function getZoneCoverage($endpoint, $token) {
        return  $this->ws($endpoint,  
        array("Content-Type: application/json","token: ".$token), 
        array(), 
        "GET");
    }

    public function getStatusPackage($endpoint, $token, $idPackage) {
        return  $this->ws($endpoint."?idPackage=".$idPackage,  
        array("Content-Type: application/json","token: ".$token), 
        array(), 
        "GET");
    }

    function ws($url, $headers, $params, $http) {

        $ch = curl_init();
        $agent =  isset($_SERVER['HTTP_ORIGIN']) ?$_SERVER['HTTP_ORIGIN'] :"localhost";

        curl_setopt($ch, CURLOPT_URL, $url);

        if ($http == "POST") {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }else{
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $http);
        }

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout in seconds
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $result = curl_exec($ch);
        
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if(curl_error($ch)){
            $finalresult = array("content"=> array("msg"=>curl_error($ch)), "error" => true, "http_code" => $http_code);
            return $finalresult;
            die;
        }
         
        curl_close($ch);
  
        switch ($http_code) {
            case '200':
                  $finalresult = array("content"=> json_decode(utf8_encode($result), true), "error" => false, "http_code" => $http_code);
                break;
            default:
                  $finalresult = array("content"=> json_decode(utf8_encode($result), true), "error" => true, "http_code" => $http_code);
                break;
        }

       return $finalresult;    
    }

}
