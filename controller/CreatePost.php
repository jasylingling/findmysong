<?php
  require_once(__dir__ . '/Controller.php');
  require_once('./model/CreatePostModel.php');
  class CreatePost extends Controller {

    private $createPostModel;

    /**
      * @param null|void
      * @return null|void
      * @desc Checks if the user session is set and creates a new instance of the CreatePostModel
    **/
    public function __construct() {
      if (!isset($_SESSION['auth_status'])) header("Location: ./");
      $this->createPostModel = new CreatePostModel();
    }

    /**
      * @param array
      * @return array|boolean
      * @desc Verifies and creates a post by calling the createPost method on the CreatePostModel
    **/
    public function createPost(array $data, array $files) {
      $recording;
      $path_filename_ext;
      $genre = stripcslashes(strip_tags($data['genre']));
      $language = stripcslashes(strip_tags($data['language']));
      $description = stripcslashes(strip_tags($data['description']));
      
      if (array_key_exists('soundBlob', $files)) {
        $recording = $files['soundBlob'];
      } else {
        $files['soundBlob']["error"] = 4;
        $files['soundBlob']["name"] = "";
      }

      $Error = array(
        'condition' => '',
        'status' => false
      );

      // check if user provide at least a record/an upload audiofile OR a description
      if (empty($description) && $files['soundBlob']["error"] > 0 && $files['upload_audiofile']["error"] > 0  ) {
        $Error['condition'] = "Bitte nimm dich entweder auf bzw. lade eine Audiodatei hoch ODER verfasse eine Songbeschreibung.";
        return $Error;
      }

      // check if user record and upload audiofile in the same form 
      if ($files['soundBlob']["error"] == 0 && $files['upload_audiofile']["error"] == 0){
        $Error['condition'] = "Bitte nimm dich entweder auf ODER lade eine Audiodatei hoch, nicht beides.";
        return $Error;
      }
      
      // if user didn't fill out genre, language or description, insert a placeholder
      if (empty($genre)) {
        $genre = "Unbekannt";
      }

      if (empty($language)) {
        $language = "Unbekannt";
      }

      if (empty($description)) {
        $description = "Keine Beschreibung";
      }



      // Now save the audio file 
      // generate file name 
      $fileToUpload = $files['soundBlob']['name']!="" ? $files['soundBlob'] : $files['upload_audiofile'];
      if (!$fileToUpload['error'] == 4){
        // where the file is going to be stored
        $target_dir = "uploads/";
        $file = $fileToUpload['name'];
        $path = pathinfo($file);

        $date = new DateTime();
        $filename = md5($path['filename'] . $date->getTimestamp());
        $ext = 'wav';
        $temp_name = $fileToUpload['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        
    
        // check if file already exists
        if (file_exists($path_filename_ext)) {
          $Error['condition'] = "Sorry, file already exists.";
          return $Error['condition'];
        }else{
        move_uploaded_file($temp_name,$path_filename_ext);
          // return "Congratulations! File Uploaded Successfully.";
        }
      }else {
        $path_filename_ext = '';
      }
   
      $Payload = array(
        'genre' => $genre,
        'language' => $language,
        'description' => $description,
        'audio_filename' => $path_filename_ext,
        'username' => $_SESSION['data']['username']
      );

      
      $ResponseCreatePost = $this->createPostModel->createPost($Payload);
        
      if ( $ResponseCreatePost['status'] ) {
        $Response = array(
          'status' => true,
        );
        return $Response;
      } else {
        $Response = array(
          'status' => false,
          'condition' => 'Database Error'
        );
      } 
      
    }
  }
 ?>
