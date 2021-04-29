<?php 
require_once('./controller/Login.php');
require_once('./controller/Register.php');

$Login = new Login();
$Register = new Register();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("includes/head.inc.html")?>
  <title>Find my song! - Lass die Community deinen Song finden.</title>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top logo" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" id="logo" href="#page-top">Find my song! <i class="fas fa-search"></i>
        <i class="fas fa-music"></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation"><i class="fas fa-bars" id="menu-toggle"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#login">Log in / Sign up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5">Geht dir ein Lied nicht mehr aus dem Kopf, aber weder deine Freunde noch
              Musikerkennung-Tools können dir den Songnamen sagen? Dann zähle auf die Hilfe unserer Musikliebhaber!</h1>
            <a href="#login" class="btn btn-primary btn-xl js-scroll-trigger mr-2 mb-2">Jetzt anmelden</a>
            <a href="#about" class="btn btn-outline btn-xl js-scroll-trigger mr-2 mb-2">Mehr erfahren</a>
          </div>
        </div>
        <div class="col-lg-5 my-auto pt-5">
          <img src="assets/img/listening_illustration.svg" alt="a girl listening to music illustration" class="img-fluid">
        </div>
      </div>
    </div>
  </header>

  <!-- About -->
  <section class="features" id="about">
    <div class="container">
      <div class="section-heading text-center">
        <h2>Suche - finde - helfe</h2>
        <p class="text-muted">Was ist "Find my song!"? Ein kurzer Überblick.</p>
        <hr>
      </div>
      <div class="row">
        <div class="col-lg-12 my-auto">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4">
                <div class="feature-item">
                  <i class="fas fa-microphone"></i>
                  <h3>Song aufnehmen</h3>
                  <p class="text-muted">Singe, summe oder nehme deinen Ohrwurm auf.</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="feature-item">
                  <i class="fas fa-pen"></i>
                  <h3>Lied beschreiben</h3>
                  <p class="text-muted">Kannst du dich noch an einige Textstellen des Songs erinnern? Anstatt zu singen
                    versuche es in Worte zu fassen.</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="feature-item">
                  <i class="fas fa-hands-helping"></i>
                  <h3>Help a brother out!</h3>
                  <p class="text-muted">Helfe anderen mit deinem Musikwissen bei der Suche nach ihrem Song.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="support bg-primary" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-10 mx-auto">
          <h2>Fragen, Anregungen, Hilfe?</h2>
          <p>Hinterlasse uns eine Nachricht und wir melden uns schnellstmöglich bei dir!</p>
          <form class="mt-4" id="contactForm" novalidate>
            <div class="form-group">
              <label for="name" class="sr-only">Name</label>
              <input type="text" class="form-control border-0" id="name" placeholder="Name" required
                data-validation-required-message="Bitte gib deinen Namen ein.">
              <p class="help-block text-danger mt-2" id="contact-validation-error"></p>
            </div>
            <div class="form-group">
              <label for="email" class="sr-only">E-Mail-Adresse</label>
              <input type="email" class="form-control border-0" id="email" placeholder="E-Mail-Adresse" required
                data-validation-required-message="Bitte gib deine E-Mail-Adresse ein.">
              <p class="help-block text-danger mt-2" id="contact-validation-error"></p>
            </div>
            <div class="form-group">
              <label for="message" class="sr-only">Message</label>
              <textarea name="message" class="form-control border-0" id="message" cols="30" rows="10"
                placeholder="Tippe was... :)" required
                data-validation-required-message="Bitte gib eine Nachricht ein - wir können leider nicht hellsehen was du uns zu sagen hast. ;)"></textarea>
              <p class="help-block text-danger mt-2" id="contact-validation-error"></p>
            </div>
            <div id="success"></div>
            <button type="submit" class="btn btn-primary btn-xl mt-2" id="sendMessageButton">Absenden</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Log in / Sign up -->
  <section class="cta" id="login">
    <div class="cta-content">
      <div class="container">
        <h2 class="mb-5">
          Auf geht's!
          <br>
          Finde dein Songglück.
        </h2>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="container p-5 rounded shadow-lg" id="login-container">
      <div class="row">
        <!-- Login Form -->
        <div class="col-lg-5 col-md-10 mx-auto">
          <h3 id="login_heading" class="text-center">Login</h3>
          <form action="" method="post" class="mt-3 mb-5" id="login_form">
            <div class="form-group">
              <label for="username" class="sr-only">Username</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-ninja"></i></span>
                </div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                  aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Passwort</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="password" id="password"
                  placeholder="Passwort" aria-label="Passwort" aria-describedby="basic-addon1" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-xl btn-block mt-2" name="login_submit">Anmelden</button>
          </form>
        </div>
        <!-- Register Form -->
        <div class="col-lg-5 col-md-10 mx-auto">
          <h3 id="registration_heading" class="text-center">Registration</h3>
          <form action="" method="post" class="mt-3" id="register_form">
            <div class="form-group">
              <label for="username" class="sr-only">Username</label>
              <div class="input_username input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-ninja"></i></span>
                </div>
                <input type="text" class="form-control" name="register_username" id="register_username"
                  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="sr-only">E-Mail-Adresse</label>
              <div class="input_email input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1-env"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" name="register_email" id="register_email"
                  placeholder="E-Mail-Adresse" aria-label="E-Mail-Adresse" aria-describedby="basic-addon1-env" required>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Passwort</label>
              <div class="input_password input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                </div>
                <input type="password" class="form-control" name="register_password" id="register_password"
                  placeholder="Passwort" aria-label="Passwort" aria-describedby="basic-addon1" required>
              </div>
            </div>
            <div class="form-group">
              <label for="confirm_password" class="sr-only">Passwort bestätigen</label>
              <div class="input_confirm_password input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                  placeholder="Passwort bestätigen" aria-label="Passwort bestätigen" aria-describedby="basic-addon1" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-xl btn-block mt-2" name="register_submit">Registrieren</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Social Media Contact -->
  <?php include("includes/socialmedia.inc.php")?>

  <!-- Footer -->
  <?php include("includes/footer.inc.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="assets/js/jqBootstrapValidation.js"></script>
  <script src="assets/js/contact.js"></script>

  <!-- Log in / Sign up Form JavaScript -->
  <script src="assets/js/login_signup.js"></script>

  <!-- Custom scripts for this template -->
  <script src="assets/js/new-age.min.js"></script>

</body>

</html>
