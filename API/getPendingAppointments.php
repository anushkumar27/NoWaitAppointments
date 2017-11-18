<?php
    require 'Medoo/init.php';
    // uid
    extract($_GET);

    $appointment = $database->select("appointment", [
        "aid",
        "serviceId",
        "appTime",
        "status"
    ], [
        "AND" => [
            "closure" => 0,
            "requestId" => $uid
        ]
    ]);

    $res["pending"] = $appointment;
    $res["status"] = "OK";
    
    echo json_encode($res);
?>