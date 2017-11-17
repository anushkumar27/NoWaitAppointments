<?php
    require 'Medoo/init.php';
    // catId
    extract($_GET);

    $res = $database->select("category", [
        "name",
        "description"
    ], [
        "categoryId" => $catId
    ]);
    
    if(sizeof($res) == 0){
        $res["status"] = "ERROR";
        echo json_encode($res);
    }else{
        $res[0]["status"] = "OK";
        echo json_encode($res[0]);
    }

    
?>