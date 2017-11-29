<?php

include("../../config.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// session_start();
// if (!isset($_SESSION['login_user'])) {
//     header("index.php");
// }
$conn = new config();
$q = $conn->_db->query("Select p.*, Group_CONCAT(DISTINCT a.auteur) as Auteur, Group_CONCAT(DISTINCT l.labo) as Labo FROM publication as p, auteur as a, labo as l WHERE a.idPub=p.id AND l.idPub=p.id GROUP BY p.id");
$outp = "";
while ($rs = $q->fetch(PDO::FETCH_ASSOC)) {
    if ($outp != "") {
        $outp .= ",";
    }    
    $y=explode(',',$rs["Labo"]);
    $x=explode(',',$rs["Auteur"]);
    $outp .= '{"NoPub":' . $rs["id"] . ',';
    $outp .= '"Auteur":' . json_encode($x) . ',';
    $outp .= '"Titre":"' . $rs["titre"] . '",';
    $outp .= '"Domaine":"' . $rs["domaine"] . '",';
    $outp .= '"Editeur":"' . $rs["editeur"] . '",';
    $outp .= '"Labo":' . json_encode($y) . ',';
    $outp .= '"Annee":"' . $rs["annee"] . '",';
    $outp .= '"Categorie":"' . $rs["categorie"] . '",';
    $outp .= '"Resume":"' . change($rs["resume"]) . '",';
    $outp .= '"Document":"' . $rs["document"] . '"}';
    }
    $outp = '{"records":[' . $outp . ']}';
    echo($outp);
?>