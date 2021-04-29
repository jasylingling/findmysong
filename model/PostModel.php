<?php
    require_once(__dir__ . '/Db.php');
    class PostModel extends Db {

      /**
        * @param null
        * @return array
        * @desc Returns an array of posts
      **/
      public function getPost(int $id) :array
      {
        $this->query("SELECT * FROM `posts` WHERE id = :id");
        $this->bind('id', $id);
        $this->execute();
        $Post = $this->fetch();

        if (count($Post) > 0) {
          $Response = array(
            'status' => true,
            'data' => $Post
          );
          return $Response;
        }

        $Response = array(
          'status' => false,
          'data' => []
        );
        return $Response;
      }

      public function getComments(int $id) :array {
        $this->query("SELECT * FROM `comments` WHERE post_id = :id ORDER BY `id` DESC");
        $this->bind('id', $id);
        $this->execute();
        $Comments = $this->fetchAll();

        
        if (count($Comments) > 0) {
          $Comments[0]['post_date'] = date("d.m.Y H:i:s", strtotime($Comments[0]['post_date']));
          $Response = array(
            'status' => true,
            'data' => $Comments
          );
          return $Response;
        }

        $Response = array(
          'status' => false,
          'data' => []
        );
        return $Response;
      }

      public function createComment(array $commentInfo) :array {
        $this->query("INSERT INTO `comments` (comment, username, post_id) VALUES (:comment, :username, :id)");
        $this->bind('comment', $commentInfo['comment']);
        $this->bind('username', $commentInfo['username']);
        $this->bind('id', $commentInfo['id']);

        if ($this->execute()) {
          $Response = array(
            'status' => true
          );
          return $Response;
        } else {
          $Response = array(
            'status' => false
          );
          return $Response;
        }
      }

      public function createProposal(array $data) :array {
        $this->query("INSERT INTO `proposals` (url, artist, song, post_id, username) VALUES (:url, :artist, :song, :post_id, :username)");
        $this->bind('url', $data['url']);
        $this->bind('artist', $data['artist']);
        $this->bind('song', $data['song']);
        $this->bind('post_id', $data['post_id']);
        $this->bind('username', $data['username']);

        if ($this->execute()) {
          $Response = array(
            'status' => true
          );
          return $Response;
        } else {
          $Response = array(
            'status' => false
          );
          return $Response;
        }
      }

      public function getProposals(int $id) :array {
        $this->query("SELECT * FROM `proposals` WHERE post_id = :id ORDER BY `id` DESC");
        $this->bind('id', $id);
        $this->execute();
        $Proposals = $this->fetchAll();


        if (count($Proposals) > 0) {
          $Proposals[0]['post_date'] = date("d.m.Y H:i:s", strtotime($Proposals[0]['post_date']));
          $Response = array(
            'status' => true,
            'data' => $Proposals
          );
          return $Response;
        }

        $Response = array(
          'status' => false,
          'data' => []
        );
        return $Response;
      }

    }
 ?>
