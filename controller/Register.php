<?php
  require_once(__dir__ . '/Controller.php');
  require_once('./model/RegisterModel.php');
  class Register extends Controller {

    private $registerModel;

    /**
      * @param null|void
      * @return null|void
      * @desc Checks if the user session is set and creates a new instance of the RegisterModel
    **/
    public function __construct() {
      if (isset($_SESSION['auth_status'])) header("Location: forum");
      $this->registerModel = new RegisterModel();
    }

    /**
      * @param array
      * @return array|boolean
      * @desc Verifies, Creates, and returns a user by calling the register method on the RegisterModel
    **/
    public function register(array $data) {
      $register_username = stripcslashes(strip_tags($data['register_username']));
      $register_email = stripcslashes(strip_tags($data['register_email']));
      $register_password = stripcslashes(strip_tags($data['register_password']));
      $confirm_password = stripcslashes(strip_tags($data['confirm_password']));
      
  
      $UsernameStatus = $this->registerModel->fetchUser($register_username)['status'];
      
      $Error = array(
        'register_username' => '',
        'register_email' => '',
        'register_password' => '',
        'confirm_password' => '',
        'status' => false
      );

      // check if username contains illegal characters  
      if (!preg_match('/^[-a-z0-9_]+$/i', $register_username))  {
        $Error['register_username'] = "Der Username darf keine Sonderzeichen beinhalten, nur Bindestrich (-) oder Unterstrich (_) sind erlaubt.";
        // return $Error;
      } else if (strlen($register_username) < 3 || strlen($register_username) > 30) {
        $Error['register_username'] = "Der Username muss mindestens 3 und darf höchstens 30 Zeichen lang sein.";
        // return $Error; 
      // check if username is already taken
      } else if (!empty($UsernameStatus)) {
        $Error['register_username'] = "Sorry, dieser Username ist bereits vergeben!";
        // return $Error;
      }

      // check if email address is valid
      if (!filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
        $Error['register_email'] = "Bitte gib eine gültige E-Mail-Adresse ein.";
        // return $Error;
      }
    
      // check if password contains at least one letter, at least one number, and be longer than six characters - source regex: https://regexlib.com/REDetails.aspx?regexp_id=770
      if (!preg_match('/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,50}$/', $register_password)) {
        $Error['register_password'] = "Passwort muss mindestens 6 Zeichen lang sein und mindestens eine Zahl enthalten.";
        // return $Error;
      }

      // check if password and confirm_password matches
      if ($register_password !== $confirm_password) {
        $Error['confirm_password'] = "Whoops, die Passwörter stimmen nicht überein!";
        // return $Error;
      }

      // return all errors above to the user
      if (!empty($Error['register_username']) || !empty($Error['register_email']) || !empty($Error['register_password']) || !empty($Error['confirm_password'])) {
        return $Error;
      }

      $Payload = array(
        'register_username' => $register_username,
        'register_email' => $register_email,
        'register_password' => password_hash($register_password, PASSWORD_BCRYPT) // create a password hash 
      );

      $ResponseRegister = $this->registerModel->createUser($Payload);
     
      $Data = $this->registerModel->fetchUser($register_username)['data'];
      unset($Data['register_password']); // get rid of any critical information like password

      if (!$ResponseRegister['status']) {
        $ResponseRegister['status'] = "Sorry, ein unerwarteter Fehler ist aufgetreten - die Registration konnte nicht abgeschlossen werden! :(";
        return $ResponseRegister;
      }

      $_SESSION['data'] = $Data;
      $_SESSION['auth_status'] = true;

      $Response = array(
        'status' => true,
      );
      return $Response;
      // header("Location: forum");
     
    }
  }
 ?>
