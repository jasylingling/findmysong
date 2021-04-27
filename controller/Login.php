<?php
require_once(__dir__ . '/Controller.php');
require_once('./model/LoginModel.php');

class Login extends Controller {

  private $loginModel;

  /**
    * @param null|void
    * @return null|void
    * @desc Checks if the user session is set and creates a new instance of the LoginModel
  **/
  public function __construct() {
    if (isset($_SESSION['auth_status'])) header("Location: forum");
    $this->loginModel = new LoginModel();
  }

  /**
    * @param array
    * @return array|boolean
    * @desc Verifies and redirects a user by calling the login method on the LoginModel
  **/
  public function login(array $data) {
    $username = stripcslashes(strip_tags($data['username']));
    $password = stripcslashes(strip_tags($data['password']));

    $UsernameRecords = $this->loginModel->fetchUsername($username);

    if (!$UsernameRecords['status']) {
      if (password_verify($password, $UsernameRecords['data']['password'])) {
     
        $Response = array(
          'status' => true
        );

        $_SESSION['data'] = $UsernameRecords['data'];
        $_SESSION['auth_status'] = true;
        return $Response;
      }

      $Response = array(
        'status' => false,
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
    );
    return $Response;
  }
}
?>
