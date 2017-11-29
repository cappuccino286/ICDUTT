<?php

// include("$_SERVER[DOCUMENT_ROOT]/config.php");
include("../../config.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// session_start();
// if (!isset($_SESSION['login_user'])) {
//     header("index.php");
// }
$conn = new config();
$q = $conn->_db->query("Select id, nom, prenom, username, password,organisation, equipe FROM login");
$outp = "";
while ($rs = $q->fetch(PDO::FETCH_ASSOC)) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"ID":' . $rs["id"] . ',';
    $outp .= '"Nom":"' . $rs["nom"] . '",';
    $outp .= '"Prenom":"' . $rs["prenom"] . '",';
    $outp .= '"Username":"' . $rs["username"] . '",';
    $outp .= '"Password":"' . $rs["password"] . '",';
    $outp .= '"Organisation":"' . $rs["organisation"] . '",';
    $outp .= '"Equipe":"' . $rs["equipe"] . '"}';
}
$outp = '{"records":[' . $outp . ']}';
echo($outp);
?>