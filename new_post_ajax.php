<?php
require_once('./controller/CreatePost.php');

$CreatePost = new CreatePost();
$Response = [];

if (isset($_POST['create_post']) && count($_POST) > 0) {
    $Response = $CreatePost->createPost($_POST, $_FILES);
    echo(json_encode($Response));
} 
?>