<?php
    require_once(__dir__ . '/Db.php');
    class MyProfileModel extends Db {

      /**
        * @param null
        * @return array
        * @desc Returns an array of posts
      **/
      public function fetchPosts(string $username) :array
      {
        $this->query("SELECT * FROM `posts` WHERE username = :username ORDER BY `id` DESC");
        $this->bind('username', $username);
        $this->execute();
        $Posts = $this->fetchAll();

        if (count($Posts) > 0) {
          $Response = array(
            'status' => true,
            'data' => $Posts
          );
          return $Response;
        }

        $Response = array(
          'status' => false,
          'data' => []
        );
        return $Response;
      }


      /**
        * @param int
        * @return array
        * @desc Returns an array of posts
      **/
      public function deletePost(int $id) 
      {
        $this->query("DELETE FROM `posts` WHERE id = :id");
        $this->bind('id', $id);
        $this->execute();
      }
    }
 ?>
