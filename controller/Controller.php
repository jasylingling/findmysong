<?php
session_start([
    'cookie_lifetime' => 7200, // set session duration to 2 hours (= 7200 seconds)
]);
class Controller {  }
// This Class doesn’t do much only that it starts or resumes an existing session which can then now be taken advantage of in other Classes or Controllers that extends the Controller.php
?>
