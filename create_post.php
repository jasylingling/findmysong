<?php
require_once('./controller/CreatePost.php');

$CreatePost = new CreatePost();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("includes/head.inc.html")?>
    <title>Neuer Post | Find my song! - Lass die Community deinen Song finden.</title>

</head>

<body id="page-top">

    <!-- Navigation -->
    <?php include("includes/nav_forum.inc.php")?>

    <!-- Create Post Form -->
    <header class="masthead" id="masthead-createpost">
        <div class="container h-100 pt-5">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1 id="post_heading" class="pt-5">Poste deinen gesuchten Song</h1>
                        <form action="" method="post" id="new_post" class="px-5 py-4 mt-3 mb-5 bg-warning text-dark rounded">
                            <div class="form-group">
                                <label for="record_audio"><i class="fas fa-microphone pr-1"></i> Singe, summe oder nehme deinen Song auf:</label>
                                <div class="controlls-container">
                                    <div class="record btn btn-primary btn-xl mr-2 mb-2">Record</div>
                                    <div class="play btn btn-outline-light btn-xl mr-2 mb-2">Play & Save</div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="upload_audiofile"><i class="fas fa-upload pr-1"></i> <u>Oder</u> lade den bereits vorhandenen Song hoch:</label>
                                <input type="file" accept="audio/*" class="form-control-file" id="upload_audiofile" name="upload_audiofile">
                            </div>
                            <div class="form-group">
                                <label for="genre" class="sr-only">Genre</label>
                                <input type="text" class="form-control border-0" id="genre" name="genre" placeholder="Genre">
                            </div>
                            <div class="form-group">
                                <label for="language" class="sr-only">Sprache</label>
                                <input type="language" class="form-control border-0" id="language" name="language" placeholder="Sprache">
                            </div>
                            <div class="form-group">
                                <label for="description" class="sr-only">Beschreibung</label>
                                <textarea name="description" class="form-control border-0" id="description" cols="30" rows="8" placeholder="Keine Aufnahme vorhanden oder etwas zu ergänzen? Versuche deinen Song oder Textstellen zu beschreiben, an welche du dich noch erinnern magst..."></textarea>
                            </div>
                            <button type="submit" name="create_post" class="btn btn-primary btn-xl mr-2 mb-2" id="create_post">Absenden</button>
                            <!-- CANCEL Button trigger modal -->
                            <button type="cancel" class="btn btn-outline-light btn-xl mr-2 mb-2" data-toggle="modal" data-target=".cancel-lg">Abbrechen</button>
                            <!-- Modal -->
                            <div class="modal fade cancel-lg" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="cancel">Vorgang abbrechen</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Möchtest du wirklich abbrechen? Der neue Post wird nicht gespeichert!
                                        </div>
                                        <div class="modal-footer">
                                            <a href="forum" class="btn btn-xl btn-danger">Ja, zurück zur Übersicht</a>
                                            <button type="button" class="btn btn-xl btn-light border-secondary" data-dismiss="modal">Nein, nicht abbrechen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>             
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 my-auto pt-5 pl-5">
                    <img src="assets/img/searching_illustration.svg" alt="a girl with a flashlight searching for something illustration" class="img-fluid">
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

    <!-- Create Post Form JavaScript --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.3.1/p5.min.js" integrity="sha512-gQVBYBvfC+uyor5Teonjr9nmY1bN+DlOCezkhzg4ShpC5q81ogvFsr5IV4xXAj6HEtG7M1Pb2JCha97tVFItYQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.3.1/addons/p5.sound.min.js" integrity="sha512-wM+t5MzLiNHl2fwT5rWSXr2JMeymTtixiw2lWyVk1JK/jDM4RBSFoH4J8LjucwlDdY6Mu84Kj0gPXp7rLGaDyA==" crossorigin="anonymous"></script>
    <script src="assets/js/new-post.js"></script>
   
</body>

</html>