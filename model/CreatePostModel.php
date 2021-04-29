<?php
  require_once(__dir__ . '/Db.php');
  class CreatePostModel extends Db {

    public function createPost (array $post) :array {
        $this->query("INSERT INTO `posts` (description, genre, language, audio_filename, username) VALUES (:description, :genre, :language, :audio_filename, :username)");
        $this->bind('description', $post['description']);
        $this->bind('genre', $post['genre']);
        $this->bind('language', $post['language']);
        $this->bind('audio_filename', $post['audio_filename']);
        $this->bind('username', $post['username']);
  
        if ($this->execute()) {
          $Response = array(
            'status' => true,
          );
          return $Response;
        } else {
          $Response = array(
            'status' => false
          );
          return $Response;
        }
    }
  }
 ?>
