<?php
require_once('./controller/Post.php');

$Post = new Post();
$Comments = new Post();
$Proposals = new Post();

$Response = [];
$Post = $Post->getPost($_GET['id']);
$Comments = $Comments->getComments($_GET['id']);
$Proposals = $Proposals->getProposals($_GET['id']);
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

    <!-- Posts -->
    <header class="masthead" id="masthead-posts">
        <div class="container h-100 pt-5">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto mt-5">
                        <h1>Beitrag von <?php echo ucwords($Post['data']['username']) ?></h1>
                        <div class="row mt-3">
                            <?php if ($Post['status']) : ?>
                                <div class="col-12">
                                    <!-- Post -->
                                    <div class="card shadow-lg p-3 mb-4 rounded bg-warning text-dark">
                                        <div class="container">
                                            <div class="row mb-4 mt-1 avatar-center">
                                                <div class="col user_profilepic text-left">
                                                    <img id="profilepic" class="bg-light rounded-circle p-2" src="https://robohash.org/<?php echo $Post['data']['username']?>.png?set=set4" alt="kitty user profilepic">
                                                </div>
                                                <div class="col post_user_date text-right">
                                                    <p><strong><?php echo ucwords($Post['data']['username']); ?></strong></p>
                                                    <!-- change sql date format from YYYY-MM-DD to DD.MM.YYYY, hours, minutes, seconds -->
                                                    <p><small>gepostet am <?php echo date("d.m.Y H:i:s", strtotime($Post['data']['post_date'])); ?></small></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col post_genre_language">
                                                    <p><i class="fas fa-music pr-2"></i> <strong><?php echo ucwords($Post['data']['genre']); ?></strong> <i class="fas fa-language pr-2 pl-4"></i> <strong><?php echo ucwords($Post['data']['language']); ?></strong></p>
                                                </div>
                                            </div>
                                            <div class="post_description">
                                                <p><?php echo $Post['data']['description']; ?></p>
                                            </div>
                                            <?=$Post['data']['audio_filename'] != "" ?  "<audio class=\"post_audio mb-2\" src=\" " . $Post['data']['audio_filename'] . "\" controls></audio>" : "<button type=\"button\" class=\"btn btn-light btn-xl btn-block \" disabled><i class=\"fas fa-ban\"></i> Keine Audio vorhanden</button>" ?>
                                        </div>
                                        <!-- Comment Field -->
                                        <form action="" method="post" id="new_comment" class="card shadow-lg px-4 pt-4 pb-1 mt-3 bg-warning text-dark rounded">
                                            <div class="form-group">
                                                <label for="comment" class="sr-only">Kommentar</label>
                                                <textarea required name="comment" class="form-control border-0" id="comment" cols="30" rows="4" placeholder="Schreibe einen Kommentar..."></textarea>
                                            </div>
                                            <button type="submit" name="create_comment" class="btn btn-primary btn-xl" id="create_comment">Absenden</button>
                                            <p class="text-center mt-3 mb-2"><strong>OR</strong><p>
                                            <!-- I can name this song! - Proposal Button trigger modal -->
                                            <button type="button" class="btn btn-light btn-xl btn-block mt-2" data-toggle="modal" data-target=".proposal-sm">I can name this song!</button>
                                        </form>
                                        <!-- Modal -->
                                        <div class="modal fade proposal-sm text-center" id="proposal" tabindex="-1" role="dialog" aria-labelledby="proposal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="proposal">Songvorschlag</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" class="mt-3 mb-3" id="proposal_form">
                                                            <div class="form-group">
                                                                <label for="artist" class="sr-only">Artist</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-ninja"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="artist" id="artist" placeholder="Artist"
                                                                    aria-label="artist" aria-describedby="basic-addon1" required>
                                                                </div>
                                                                </div>
                                                            <div class="form-group">
                                                                <label for="song" class="sr-only">Song</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-music"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="song" id="song" placeholder="Song"
                                                                    aria-label="song" aria-describedby="basic-addon1" required>
                                                                </div> 
                                                                <div class="preview">
                                                                </div>
                                                            </div>
                                                            <button type="song_search" class="btn btn-outline-warning text-dark btn-xl btn-block mt-2" id="song_search" name="song_search">Suchen</button>
                                                            <button type="song_submit" class="btn btn-primary btn-xl btn-block mt-2" id="song_submit" name="song_submit">Absenden</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-xl btn-block btn-light border-secondary" data-dismiss="modal">Abbrechen</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Posted Proposal-->
                                    <div class="proposal_container">
                                        <?php if ($Proposals['status']) : ?>
                                            <h2>Proposals</h2>
                                            <?php foreach ($Proposals['data'] as $proposal) : ?>
                                                <div class="card shadow-lg p-3 mb-4 rounded text-dark bg-primary text-center">
                                                    <div class="container">
                                                        <div class="song_information mt-2"><strong><?=$proposal['artist']?> - <?=$proposal['song']?></strong>
                                                            <audio class="post_audio mt-2" controls>
                                                                <source src="<?=$proposal['url']?>" type="audio/x-m4a">
                                                            </audio>
                                                        </div>
                                                        <div class="col post_user_date text-right text-center">
                                                            <p class="mb-1"><small>gepostet am <?php echo date("d.m.Y H:i:s", strtotime($proposal['post_date'])); ?> by <strong><?php echo ucwords($proposal['username']); ?></strong></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>  
                                    </div>
                                    
                                    <!-- Posted Comments -->
                                    <div class="comment_container">
                                        <?php if ($Comments['status']) : ?>
                                            <h2>Kommentare</h2>
                                            <?php foreach ($Comments['data'] as $comment) : ?>
                                                <div class="card shadow-lg p-3 mb-4 rounded text-dark posted-comments">
                                                    <div class="container">
                                                        <div class="row mb-4 mt-1 avatar-center">
                                                            <div class="col user_profilepic text-left">
                                                                <img id="profilepic" class="bg-light rounded-circle p-2" src="https://robohash.org/<?php echo $comment['username']?>.png?set=set4" alt="kitty user profilepic">
                                                            </div>
                                                            <div class="col post_user_date text-right">
                                                                <p><strong><?php echo ucwords($comment['username']); ?></strong></p>
                                                                <!-- change sql date format from YYYY-MM-DD to DD.MM.YYYY, hours, minutes, seconds -->
                                                                <p><small>gepostet am <?php echo date("d.m.Y H:i:s", strtotime($comment['post_date'])); ?></small></p>
                                                            </div>
                                                        </div>
                                                        <div class="comment">
                                                            <p><?php echo $comment['comment']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>  
                                    </div>
                                </div>
                            <?php endif; ?>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 my-auto pl-5">
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
    <script src="assets/js/new-comment.js"></script>

    <!-- iTunes intergration -->
    <script src="assets/js/proposal.js"></script>
</body>

</html>