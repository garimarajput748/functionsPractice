<?php
    $target_dir = "uploads/";
    
    if(isset($_FILES["fileToUpload"]["name"])){

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
   
 // Check if image file is a actual image or fake image   

if(isset($_POST['submit']) && $_POST['submit'] == 'UPLOAD'){
    if(isset($imageFileType) && !empty($imageFileType)){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
          } else {
            $err =  "File is not an image.";
            $uploadOk = 0;
          }
    }
    else {
        $err =  'Please Select Image';
    }
}

// Allow certain file formats
    if(!empty($imageFileType)){
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "webp" ) {
        $err =  "Sorry, only JPG, JPEG, PNG & WEBP files are allowed.";
        $uploadOk = 0;
        }
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 1600000) {
        $err =  "Sorry, your file is too large. Max Size can be 2 MB";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if(isset($err)) echo $err ;
        else echo  "Sorry, your file was not uploaded.";
    }

// if everything is ok,then upload file
  else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        header('Location: '.$_SERVER['PHP_SELF']);
    } else {
      echo "Sorry, there was an error uploading your file.";
      return;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>File Upload</title>
</head>
<body>
    <div class="container mt-5">
        <h4>Upload File </h4>
        <form class="w-50" method="POST" enctype="multipart/form-data">
            <!-- <label for="fileName">FileName::</label> -->
            <input  type="file" id="file" name="fileToUpload" class="form-control" required>
            <input type="submit" name="submit" class="btn btn-success mt-4" value="UPLOAD">
            <input type="reset" class="btn btn-danger mt-4 ms-5" value="RESET">
        </form>
    </div>
</body>
</html>