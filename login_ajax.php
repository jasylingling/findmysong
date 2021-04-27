<?php
require_once('./controller/Login.php');

$Login = new Login();
$Response = [];

if (isset($_POST['login_submit']) && count($_POST) > 0){
    $Response = $Login->login($_POST);
    echo(json_encode($Response));
} 
?>