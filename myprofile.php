<?php
require_once('./controller/MyProfile.php');

$MyProfile = new MyProfile();
$Posts = $MyProfile->getPosts($_SESSION['data']['username']);

if (isset($_GET['delete'])) {
    $Delete = $MyProfile->deletePost($_GET['delete']);
}
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

    <!-- My Profile -->
    <header id="masthead-posts" class="masthead">
        <div class="container h-100 pt-5">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto mt-5">
                        <h1>Dein Profil</h1>
                        <p class="mb-4">Hier findest du die Übersicht aller deiner geposteten Beiträge. Sehe dir den Beitrag im Detail an oder lösche sie hier nach Belieben.</p>
                        <div class="row">
                            <?php if ($Posts['status']) : ?>
                                <?php  foreach ($Posts['data'] as $post) : ?>
                                    <div class="col-12">
                                        <div class="card shadow-lg p-3 mb-4 rounded bg-warning text-dark">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col post_genre_language">
                                                        <p><i class="fas fa-music pr-2"></i> <strong><?php echo ucwords($post['genre']); ?></strong> <i class="fas fa-language pr-2 pl-4"></i> <strong><?php echo ucwords($post['language']); ?></strong></p>
                                                    </div>
                                                    <div class="post_date">
                                                        <p><small>gepostet am <?php echo date("d.m.Y H:i:s", strtotime($post['post_date'])); ?></small></p>
                                                    </div>
                                                </div>
                                                <div class="post_description">
                                                    <p><?php echo $post['description']; ?></p>
                                                </div>
                                                <?=$post['audio_filename'] != "" ?  "<audio class=\"post_audio mb-1\" src=\" " . $post['audio_filename'] . "\" controls></audio>" : "<button type=\"button\" class=\"btn btn-light btn-xl btn-block mb-2 \" disabled><i class=\"fas fa-ban\"></i> Keine Audio vorhanden</button>" ?>
                                                <a href="post?id=<?=$post['id']?>" class="btn btn-primary btn-xl btn-block mb-2"><i class="far fa-eye"></i> Beitrag ansehen</a>
                                                <!-- DELETE Button trigger modal -->
                                                <button type="delete" class="btn btn-danger btn-xl btn-block mb-2" data-toggle="modal" data-target=".delete-lg"><i class="fas fa-trash-alt"></i> Löschen</button>
                                                <!-- Modal -->
                                                <div class="modal fade delete-lg" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="delete">Beitrag löschen</h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Möchtest du diesen Beitrag wirklich löschen?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="?delete=<?=$post['id']?>" class="btn btn-xl btn-danger">Löschen</a>
                                                                <button type="button" class="btn btn-xl btn-light border-secondary" data-dismiss="modal">Abbrechen</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>         
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif;?>                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-5 mt-5 pt-5 text-center">
                    <img src="https://robohash.org/<?php echo ($_SESSION['data']['username']); ?>.png?set=set4">
                    <h2 class="mt-2"><strong><?php echo ucwords($_SESSION['data']['username']); ?></strong></h2>
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