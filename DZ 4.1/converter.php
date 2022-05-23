<?php
    ini_set("soap.wsdl_cache_enabled", "0");
    ini_set('default_socket_timeout', 5000);

    $server = new SoapServer("toConverter.wsdl");


    function Convert($yourValue, $convertType)
    {
        if($convertType === "eurToBam"){
            return $yourValue * 1.96 . " BAM";
        } else if($convertType === "bamToEur"){
            return $yourValue * 0.51 . " EUR";
        } else if($convertType === "bamToUsd"){
            return $yourValue * 0.55 . " USD";
        } else {
            return $yourValue * 1.83 . " BAM";
        }
    }

    $server->AddFunction("Convert");
    $server->handle();