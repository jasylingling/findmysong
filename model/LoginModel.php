<?php
  require_once(__dir__ . '/Db.php');
  class LoginModel extends Db {

    /**
      * @param string
      * @return array
      * @desc Returns a user record based on the method parameter
    **/
    public function fetchUsername(string $username) :array {
      $this->query("SELECT * FROM `users` WHERE `username` = :username");
      $this->bind('username', $username);
      $this->execute();

      $Username = $this->fetch();
      if (empty($Username)) {
        $Response = array(
          'status' => true,
          'data' => $Username
        );
     
        return $Response;
      }

      if (!empty($Username)) {
        $Response = array(
          'status' => false,
          'data' => $Username
        );
 
        return $Response;
      }
    }
  }
 ?>
