<?php
    require 'Medoo/init.php';
    // suid
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

    $res["approval"] = $appointment;
    $res["status"] = "OK";
    
    echo json_encode($res);
?>