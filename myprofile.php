<?php
require_once('./controller/MyProfile.php');

$MyProfile = new MyProfile();
// $Response = [];
// $Posts = $Forum->getPosts();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("includes/head.inc.html")?>
    <title>My Profile | Find my song! - Lass die Community deinen Song finden.</title>

</head>

<body id="page-top">

    <!-- Navigation -->
    <?php include("includes/nav_forum.inc.php")?>

    <!-- Header -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1>Moshi moshi! Dein persönliches Profil mit Übersicht über all deine geposteten Beiträge. Editiere oder lösche sie nach Belieben.</h1>
                        <img src="https://robohash.org/username.png?set=set4">
                    </div>
                </div>
                <div class="col-lg-5 my-auto pt-5">
                    <i class="fab fa-keybase" style="font-size: 400px;"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Social Media Contact -->
    <?php include("includes/socialmedia.inc.php")?>

    <!-- Footer -->
    <?php include("includes/footer.inc.php")?>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="assets/js/new-age.min.js"></script>

</body>

</html>