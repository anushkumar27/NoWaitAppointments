<?php
    // users need to login to view/change their profile
    require 'Medoo/init.php';
    // uid
    extract($_GET);

    $res = null;

    $type = $database->select("users", [
        "name",
        "address",
        "type"
    ], [
        "uid" => $uid
    ]);
    
    if(sizeof($type) == 0){
        $res["Status"] = "ERROR";
    }else if($type[0]["type"] == 0) {
        $profile = $database->select("userprofile", [
            "dob",
            "currentLat",
            "currentLong"
        ], [
            "uid" => $uid
        ]);
        $res["status"] = "OK";  
        $res = array_merge($profile[0], $res);
        $res = array_merge($type[0], $res);
    }else{
        $profile = $database->select("serviceprofile", [
            "price",
            "currentLat",
            "currentLong",
            "limit",
            "durationStart",
            "durationStop",
            "rating",
            "categoryId"
        ], [
            "uid" => $uid
        ]);
        $res["status"] = "OK";  
        $res = array_merge($profile[0], $res);
        $res = array_merge($type[0], $res);
    }

    echo json_encode($res);
?>