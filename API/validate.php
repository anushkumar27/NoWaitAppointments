<?php
    require 'Medoo/init.php';
    
    session_start();
    // uname, pass
    extract($_POST);

    $users = $database->select("users", [
        "uid",
        "name",
        "type"
    ], [
        "AND" => [
            "uname" => $uname,
            "password" => $pass
        ]
    ]);
    
    if(sizeof($users) == 0){
        $users["status"] = "ERROR";
        echo json_encode($users);
    }else{
        if($users[0]["type"] == 0){
            $users[0]["redirect"] = "user";
        }else{
            $users[0]["redirect"] = "serviceProvider";
        }
        $_SESSION["uid"] = $users[0]['uid'];
        $users[0]["status"] = "OK";
        echo json_encode($users[0]);
    }

    
?>