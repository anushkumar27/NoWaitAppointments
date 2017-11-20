<?php
    require 'Medoo/init.php';
    // suid, aDate
    extract($_GET);

    $appointment = $database->select("appointment", [
        "aid",
        "requestId",
        "appTime"
    ], [
        "AND" => [
            "closure" => 0,
            "status" => 0,
            "serviceId" => $suid
        ]
    ]);
    
   
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
    
    
    $allApp = $database->query("SELECT aid, appTime, name from appointment, users WHERE serviceId=1 AND users.uid=requestId")->fetchAll();
        
    //print_r($allApp);
    $res["appCount"] = $appCount;
    $res["pendingApproval"] = sizeOf($appointment);
    $res["calender"] = $allApp;
    $res["status"] = "OK";
    
    echo json_encode($res);
?>