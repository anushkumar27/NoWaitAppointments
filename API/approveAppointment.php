<?php
    // technically should have used PUT to update
    require 'Medoo/init.php';
    // aid
    extract($_POST);

    $app = $database->update("appointment", [
        "status" => 1
    ], [
        "AND"=>[
            "aid" => $aid,
            "closure" => 0
        ]
    ]);
    
    if( $app->rowCount() != 1){
        $res["status"] = "ERROR";
    }else{
        $res["status"] = "OK";
    }

    echo json_encode($res);
?>