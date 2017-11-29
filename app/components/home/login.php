<?php
session_start();
$error = '';
if (isset($_POST['login'])) {
    include("$_SERVER[DOCUMENT_ROOT]/config.php");
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $conn= new config();
        $query = $conn->_db->prepare('SELECT * FROM login WHERE username=:username AND password=:password');
        $query->execute(array(':username' => $username, ':password' => $password));
        $rows = $query->rowCount();
        var_dump($rows);
        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
            $urlAdmin =  'location: http://'.$_SERVER["SERVER_NAME"].'/app/components/admin/index.php';
            $urlChercheur =  'location: http://'.$_SERVER["SERVER_NAME"].'/app/components/chercheur/index.php';
            if ($username == "syhung") { 
                header($urlAdmin);
            } else {
                header($urlChercheur);
            }
        } else {
            $error = "Username or Password is invalid";
        }
    }
}
?>
