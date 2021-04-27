<?php
  require_once(__dir__ . '/Controller.php');
  require_once('./model/MyProfileModel.php');
  class MyProfile extends Controller {

    private $myprofileModel;

    /**
      * @param null|void
      * @return null|void
      * @desc Checks if the user session is set and creates a new instance of the ForumModel
    **/
    public function __construct() {
      if (!isset($_SESSION['auth_status'])) header("Location: ./");
      $this->myprofileModel = new MyProfileModel();
    }

    /**
      * @param null|void
      * @return array
      * @desc Returns an array of posts by calling the ForumModel fetchPosts method
    **/
    // public function getPosts() :array {
    //   return $this->forumModel->fetchPosts();
    // }
  }
 ?>