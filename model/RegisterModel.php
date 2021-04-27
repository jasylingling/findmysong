 <?php
  require_once(__dir__ . '/Db.php');
  class RegisterModel extends Db {

    /**
      * @param array
      * @return array
      * @desc Creates and returns a user record
    **/
    public function createUser(array $user) :array {
      $this->query("INSERT INTO `users` (username, email, password) VALUES (:username, :email, :password)");
      $this->bind('username', $user['register_username']);
      $this->bind('email', $user['register_email']);
      $this->bind('password', $user['register_password']);

      if ($this->execute()) {
        $ResponseRegister = array(
          'status' => true,
        );
        return $ResponseRegister;
      } else {
        $ResponseRegister = array(
          'status' => false
        );
        return $ResponseRegister;
      }
    }

    /**
      * @param string
      * @return array
      * @desc Returns a user record based on the method parameter
    **/
    public function fetchUser(string $register_username) :array {
      $this->query("SELECT * FROM `users` WHERE `username` = :username");
      $this->bind('username', $register_username);
      $this->execute();

      $User = $this->fetch();
      if (!empty($User)) {
        $ResponseRegister = array(
          'status' => true,
          'data' => $User
        );
        return $ResponseRegister;
      }
      return array(
        'status' => false,
        'data' => []
      );
    }
  }
 ?>
