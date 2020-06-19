<!DOCTYPE    html>
<head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <?php include 'includes/styles_js_importer.php'; ?>
</head>
<body>
    <div    class="row  bg-primary">
        <div    class="col-sm-4">
        </div>
        <div class="col-sm-4 bg-white">
               
                <p>
                    <strong style="font-size:30px">
                        How to upload a lesson
                    </strong><br><br>
                    Your lessons can be set by uploading videos or pictures containing the educational content, or a YouTube link to the video can be used.
                </p>
               <center><form  action=""   method="POST" enctype = "multipart/form-data">
                    <input type = "file" name = "image" /><br>
                    <button class="btn btn-primary" name="image" type="submit">Upload Picture</button>
                    <br><br>
                    <input type = "file" name = "video" /><br>
                    <button class="btn btn-primary" name="video" type="submit">Upload Video</button>
                    <br><br>
                    <label>Provide video link</label><br>
                    <input type = "text" name = "video_url" size="30" maxlength="100">
                    <button class="btn btn-primary" name="video_url" type="submit">Upload</button>
                    <br><br>
                    </center>
                </form>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</body>
</html>
<?php
include('db.php');
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$file_name)));
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152) {
        $errors[]='File size must be exactly 2 MB';
     }
     
     if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "Success";
     }
     else{
        print_r($errors);
     }
     $sql   =   'INSERT  INTO lesson_properties (LessonType, LessonName)  VALUES  ("$file_type","$file_name")';
  }
     elseif(isset($_FILES['video'])){
    $errors= array();
    $file_name = $_FILES['video']['name'];
    $file_size = $_FILES['video']['size'];
    $file_tmp = $_FILES['video']['tmp_name'];
    $file_type = $_FILES['video']['type'];
    $file_ext=strtolower(end(explode('.',$file_name)));
    $extensions= array("mp3","mp4");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose an MP3 or MP4 file.";
    }
    if($file_size > 2097152) {
        $errors[]='File size must be exactly 2 MB';
     }
     
     if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"videos/".$file_name);
        echo "Success";
     }
     else{
        print_r($errors);
     }
     $sql   =   'INSERT  INTO lesson_properties (LessonType, LessonName)  VALUES  ("$file_type","$file_name")';
  }
  elseif(isset($_Post['video_url'])){
    $errors= array();
    $file_name = $_POST['video_url']['name'];
    $file_size = $_POST['video_url']['size'];
    $file_tmp = $_POST['video_url']['tmp_name'];
    $file_type = $_POST['video_url']['type'];
    
    if($file_size > 2097152) {
        $errors[]='File size must be exactly 2 MB';
     }
     
     if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"Youtube_videos/".$file_name);
        echo "Success";
     }
     else{
        print_r($errors);
     }
     $sql   =   'INSERT  INTO lesson_properties (LessonType, LessonName)  VALUES  ("$file_type","$file_name")';
  }

?>