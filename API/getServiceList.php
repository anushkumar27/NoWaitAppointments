<?php
    require 'Medoo/init.php';

    $serviceProviders = $database->select("users", [
        "name",
        "uid",
        "address"
    ], [
        "type" => 1
    ]);
    
    if(sizeof($serviceProviders) == 0){
        $res["status"] = "ERROR";
    }else{
        $res["status"] = "OK";
        $res["services"] = $serviceProviders; 
    }

    echo json_encode($res);
?>