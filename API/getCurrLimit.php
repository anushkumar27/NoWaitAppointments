<?php
    //TODO check for timestamp format from Client JS
    //TODO accomadate for a perticular date
    require 'Medoo/init.php';
    // suid
    extract($_GET);

    $appCount = $database->count("appointment", [
        "AND" => [
            "serviceId" => $suid,
            "status" => 1,
            "closure" => 0
        ]
    ]);

    $limit = $database->select("serviceprofile", [
        "limit"
    ], [
        "uid" => $suid
    ]);
    
    $res["status"] = "OK";
    $res["currLimit"] = $limit[0]["limit"] - $appCount;

    echo json_encode($res);
?>