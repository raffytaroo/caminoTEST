<?php
require_once('../model/element.php');
$db = dbConnect(); //connexion BDD

$action = "list";

if (array_key_exists("action", $_GET)) {
    $action = $_GET['action'];
}

if ($action == "writeTextWritten") {
    if(!array_key_exists('id', $_POST) || !array_key_exists('textWritten', $_POST) || !array_key_exists('dateLastChange', $_POST)){
        echo json_encode(["status" => "error", "message" => "il manque id, textWritten ou dateLastChange"]);
        return;
    }
    $id= $_POST['id'];
    $textWritten= htmlspecialchars($_POST['textWritten']); //htmlspecialchars pour éviter les insertions de code html par l'utilisateur
    $dateLastChange= $_POST['dateLastChange'];

    modifyTextWritten($db, $id, $textWritten, $dateLastChange);
    echo json_encode(["status" => "success"]);
    return;
}else if($action == "writeActive"){
    if(!array_key_exists('id', $_POST) || !array_key_exists('active', $_POST) || !array_key_exists('dateLastChange', $_POST)){
        echo json_encode(["status" => "error", "message" => "il manque id, active ou dateLastChange"]);
        return;
    }
    $id= $_POST['id'];
    $active = $_POST['active'];
    $dateLastChange= $_POST['dateLastChange'];


    modifyActive($db, $id, $active, $dateLastChange);
    echo json_encode(["status" => "success"]);
    return;
}else {
    $allElements = getAllElements($db);
    echo json_encode($allElements);
}

