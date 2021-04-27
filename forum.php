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

    <!-- Posts -->
    <header class="masthead" id="masthead-posts">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto mt-5">
                        <h1 class="pt-5">Neueste Beiträge</h1>
                        <a href="create_post" class="btn btn-primary btn-xl mt-2 mb-4"><i class="fas fa-plus"></i> Neuer Post</a>
                        <div class="row">
                            <?php if ($Posts['status']) : ?>
                                <?php foreach ($Posts['data'] as $post) : ?>
                                    <div class="col-12">
                                        <div class="card shadow-lg p-3 mb-4 rounded bg-warning text-dark">
                                            <div class="container">
                                                <div class="row mb-4 mt-1 avatar-center">
                                                    <div class="col user_profilepic text-left">
                                                        <img id="profilepic" class="bg-light rounded-circle p-2" src="https://robohash.org/<?php echo $post['username']?>.png?set=set4" alt="kitty user profilepic">
                                                    </div>
                                                    <div class="col post_user_date text-right">
                                                        <p><strong><?php echo ucwords($post['username']); ?></strong></p>
                                                        <p><small>gepostet am <?php echo ucwords($post['post_date']); ?></small></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col post_genre_language">
                                                        <p><i class="fas fa-music"></i> <?php echo ucwords($post['genre']); ?> <i class="fas fa-language"></i> <?php echo ucwords($post['language']); ?></p>
                                                    </div>
                                                </div>
                                                <div class="post_description">
                                                    <p><?php echo $post['description']; ?></p>
                                                </div>
                                            </div>
                                            <!-- <div class="user_profilepic">
                                                <?php echo "<img id=\"profilepic\" class=\"bg-light rounded-circle p-2\" src=\"https://robohash.org/" . $post['username'] . ".png?set=set4\" alt=\"kitty user profilepic\">" ?>
                                            </div>
                                            <div class="post_username">
                                                <h2><?php echo ucwords($post['username']); ?></h2>
                                            </div>
                                            <div class="post_date">
                                                <h2><?php echo ucwords($post['post_date']); ?></h2>
                                            </div> -->
                                            <!-- <div class="post_genre_language">
                                                <h2><i class="fas fa-music"></i> <?php echo ucwords($post['genre']); ?></h2>
                                            </div> -->
                                            <!-- <div class="post_language">
                                                <h2><i class="fas fa-language"></i> <?php echo ucwords($post['language']); ?></h2>
                                            </div> -->
                                            <!-- <div class="post_description">
                                                <p><?php echo $post['description']; ?></p>
                                            </div> -->
                                            <a href="javascript:void(0)" class="btn btn-primary btn-xl js-scroll-trigger mr-2 mb-2"><i class="fas fa-play-circle"></i> Anhören</a>
                                            <a href="create_post" class="btn btn-light btn-xl js-scroll-trigger mr-2 mb-2"><i class="fas fa-comment-dots"></i> Antworten</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>                            
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Zurück</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Weiter</a></li>
                            </ul>
                        </nav>
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