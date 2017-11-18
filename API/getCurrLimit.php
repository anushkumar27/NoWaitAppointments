<?php
    require 'Medoo/init.php';
    // suid, aDate
    extract($_POST);

    // Query
    // SELECT * FROM `appointment` WHERE serviceId=1 AND status=1 AND closure=0 AND (appTime >= '2017-11-18' and appTime < '2017-11-19')
    $actualDate = date_create($aDate);
    $nextDate = date_create($aDate);
    // create one day interval
    $interval = new DateInterval('P1D');
    // modify the DateTime instance
    // add one day
    $nextDate->add($interval);

    
    $appCount = $database->count("appointment", [
        "AND" => [
            "serviceId" => $suid,
            "status" => 1,
            "closure" => 0,
            "appTime[<>]" => [$actualDate->format('Y-m-d'), $nextDate->format('Y-m-d')]
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