<?php
require_once('../conf/conf.php');
$db = dbConnect();

//fonction qui récupère tout les éléments dans la base
function getAllElements($db)
{
    $req = $db->prepare("SELECT * FROM element");
    $req->execute([]) or die(print_r($req->errorInfo()));
    $res = $req->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

//fonction qui modifie un élement dans la base de donnée ou qui le crée si celui-ci n'existe pas (De cette manière, si l'on ajoute un element html, il sera ajouté automatiquement dans la base lorsqu'on l'utilisera)
function setOrModifyElement($db, $id, $textWritten, $active, $dateLastChange)
{
    //verifie si il l'element est déja présent
    $allElements = getAllElements($db);
    $present = false;

    foreach($allElements as $element){
        if($element['id'] === $id){
            $present = !$present;
        }
    }

    if ($present) { //si oui, alors modify
        
        $req = $db->prepare("UPDATE element SET textWritten = :textWritten, active = :active, dateLastChange = :dateLastChange WHERE id = :id");
        $req->execute([
            ':id' => $id,
            ':textWritten' => $textWritten,
            ':active' => $active,
            ':dateLastChange' => $dateLastChange
        ]) or die(print_r($req->errorInfo(),true));            

    } else { //si non, alors insert

        $req = $db->prepare("INSERT INTO element(id, textWritten, active, dateLastChange) VALUES (:id, :textWritten, :active, :dateLastChange)");
        $req->execute([
            ':id' => $id,
            ':textWritten' => $textWritten,
            ':active' => $active,
            ':dateLastChange' => $dateLastChange
        ]) or die(print_r($req->errorInfo(),true));
    }
}


//fonction qui modifie juste active dans la table element
function modifyActive($db, $id, $active, $dateLastChange)
{
    $req = $db->prepare("UPDATE element SET active = :active, dateLastChange = :dateLastChange WHERE id = :id");
    $req->execute([
        ':id' => $id,
        ':active' => $active,
        ':dateLastChange' => $dateLastChange
    ]) or die(print_r($req->errorInfo(),true));    
}

//fonction qui modifie juste textWritten dans la table element
function modifyTextWritten($db, $id, $textWritten, $dateLastChange)
{
    $req = $db->prepare("UPDATE element SET textWritten = :textWritten, dateLastChange = :dateLastChange WHERE id = :id");
    $req->execute([
        ':id' => $id,
        ':textWritten' => $textWritten,
        ':dateLastChange' => $dateLastChange
    ]) or die(print_r($req->errorInfo(),true));    
}