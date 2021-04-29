<?php
require_once('./controller/Post.php');

$CreateComment = new Post();
$Response = [];

if (isset($_POST['create_comment']) && count($_POST) > 0) {
    $username = $_SESSION['data']['username'];
    $Response = $CreateComment->createComment($_POST, $username);
    echo(json_encode($Response));
} else if (isset($_POST['get_comments']) && count($_POST) > 0) {
    $Comments = new Post();
    $Comments = $Comments->getComments($_POST['id']);
    echo(json_encode($Comments)); 
} else if (isset($_POST['song_submit']) && count($_POST) > 0) {
    $username = $_SESSION['data']['username'];
    $_POST['username'] = $username;
    $Response = $CreateComment->createProposal($_POST);
    echo(json_encode($Response));
}
?>
