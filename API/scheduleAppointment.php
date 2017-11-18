<?php
    // here we assume that limit is verified for the day
    require 'Medoo/init.php';
    // userId, serviceId, appointmentTime
    
    // uid, suid, appTime, appDateTime
    extract($_POST);

    // checking if time is fine
    $serviceTiming = $database->select("serviceprofile", [
        "durationStart",
        "durationStop"
    ], [
        "uid" => $suid
    ]);

    $dateTime = $appTime;
    // converting to PHP date objects
    $startTime = new DateTime($serviceTiming[0]["durationStart"]);
    $stopTime = new DateTime($serviceTiming[0]["durationStop"]);
    $appTime = new DateTime($appTime);

    // comparing time, that is checking if requested time is within working hours
    if( ( $appTime->format('H:i:s') >= $startTime->format('H:i:s') )
        && 
        ( $appTime->format('H:i:s') <= $stopTime->format('H:i:s') )
      ){
        $database->insert("appointment", [
            "requestId" => $uid,
            "serviceId" => $suid,
            "appTime" => $dateTime
        ]);
        $res["status"] = "OK";
    }else{
        // TODO send error
        $res["status"] = "ERROR";
        $res["message"] = "Time not is not within working hours";
    }
    
    echo json_encode($res);

?>