<?php
require_once(__dir__ . '/Controller.php');
require_once('./model/PostModel.php');
class Post extends Controller {

    public function __construct() {
        if (!isset($_SESSION['auth_status'])) header("Location: ./");
        $this->postModel = new PostModel();
      }

    public function getPost(int $id) {
        return $PostRecords = $this->postModel->getPost($id);
    }

    public function getComments(int $id){
        return $commentRecords = $this->postModel->getComments($id);
    }

    public function createComment(array $data, string $username){
        // return $username;
        $Payload = array(
            'comment' => $data['comment'],
            'username' => $username,
            'id' => $data['id'] 
        );

        return $newComment = $this->postModel->createComment($Payload);
    }

    public function createProposal(array $data){
        return $proposalRecords = $this->postModel->createProposal($data);
    }

    public function getProposals(int $id){
        return $proposalRecords = $this->postModel->getProposals($id);
    }

}
?>