<?php

header('Content-Type: text/plain');

if (extension_loaded('soap')) {
    try {
        ini_set('default_socket_timeout', 5000);
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);

        $value = $_POST['value'];

        $selectedCurrency = $_POST['currency'];

        $sClient = new SoapClient('toConverter.wsdl',array(
            'trace' => true,
            'keep_alive' => true,
            'connection_timeout' => 5000,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        ));

        if ($selectedCurrency === "eurToBam") {
            $response = $sClient->Convert($value, 'eurToBam');
        } 
        else if($selectedCurrency === "bamToEur"){
            $response = $sClient->Convert($value, 'bamToEur');
        }
        else if($selectedCurrency === "bamToUsd"){
            $response = $sClient->Convert($value, 'bamToUsd');
        }
        //USD to Bam
        else {
            $response = $sClient->Convert($value, 'usdToBam');
        }
        var_dump($response);
    } catch (SoapFault $e) {
        var_dump($e);
        echo $e;
    }
}
?>