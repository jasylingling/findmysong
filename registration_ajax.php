<?php
require_once('./controller/Register.php');

$Register = new Register();
$ResponseRegister = [];

if (isset($_POST['register_submit']) && count($_POST) > 0) {
    $ResponseRegister = $Register->register($_POST);
    echo(json_encode($ResponseRegister));
}
?>