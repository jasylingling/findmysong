<?php
require_once('./controller/Forum.php');

$Forum = new Forum();
$Response = [];
$Posts = $Forum->getPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("includes/head.inc.html")?>
    <title>Forum | Find my song! - Lass die Community deinen Song finden.</title>

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

                        <h1>Poste deinen gesuchten Song</h1>

                        <!-- Bootstrap File Upload, hinzufügen dass nur gewisse Audio Typen erlaubt sind? -->
                        <form>
                            <i class="fas fa-microphone"></i> or:
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>

                        <!-- Terry kommentar-schreiben.php-Ausschnitt -->
                        <div style="border-bottom:2px solid #dddddd; margin-bottom:10px;">
                            <strong>Jenny</strong> schrieb am 21.09.2020:
                            <p>Suche Song welcher mit bludabudii anfängt.</p>
                        </div>
                        <div style="border-bottom:2px solid #dddddd; margin-bottom:10px;">
                            <strong>Franz</strong> schrieb am 23.09.2020:
                            <p>Eiffel 65 - Blue (Da Ba Dee)</p>
                        </div>
                        <h4>Kommentar schreiben</h4>
                        <form action="" method="POST">

                            <label for="fld_nachname">Name *:</label>
                            <input type="text" name="name" id="fld_name" value=""><br>

                            <label for="fld_message">Nachricht *:</label>
                            <textarea name="message" id="fld_message"></textarea>
                            <br>
                            <input type="submit">
                        </form>
                        <!-- END Terry  -->

                    </div>
                </div>
                <div class="col-lg-5 my-auto pt-5">
                    <img src="assets/img/searching_illustration.svg" alt="a girl with a flashlight searching for something illustration"
                        class="img-fluid">
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