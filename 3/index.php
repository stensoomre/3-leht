<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Download/Upload files!</title>
    <link rel="icon" href="favicon.ico">

</head>

<body>
<style>
body {
  background-color: #e6f7ff; /* light blue color */
  animation: color-transition 15s ease-in-out infinite alternate; /* add a color transition animation */
}

@keyframes color-transition {
  0% {
    background-color: #e6f7ff; /* start with a light blue color */
  }
  50% {
    background-color: #b3d9ff; /* transition to a darker blue color */
  }
  100% {
    background-color: #e6f7ff; /* return to the light blue color */
  }
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="favicon.ico" style="width:30px;" alt="logo">
        Free Download and Upload Service
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="me-auto"></ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./features.html">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./pricing.html">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./team.html">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.html">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container pt-4 pb-4" style="background-color: #F3F3F3;">
  <img style="height: 400px;" class="center"src="./900x700.png" alt=""><br>

  <?php
session_start();
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file 
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name 
    $newFileName = $fileName;
    // check if file has one of the following extensions 
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'exe', 'rar');
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved 
      $uploadFileDir = './uploads/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
}

?>
  <?php
// display the success or error message in a Bootstrap alert
if(!empty($message)){
    if(strpos($message, 'successfully')){
        echo '<div class="alert alert-success">' . $message . '</div>';
    }else{
        echo '<div class="alert alert-warning">' . $message . '</div>';
    }
}
?>
  <form method="POST" enctype="multipart/form-data" class="container text-center">
    <label class="form-label fs-1 mt-4">Upload files</label>
    <div class="input-group " style="margin-left:30%; max-width:500px;">
      <input class="form-control" type="file" name="uploadedFile">
      <button type="submit" style="color: white;" class="btn btn-info" name="uploadBtn" value="Upload"><i class="fa-solid fa-file-export"></i></button>
    </div>
    </div>
<div class="container" style="background-color:#F6F6F6;">
  </form>
</form>
    <table class="table" >
        <thead>
            <tr style="background-color:#f0f0f0;">
                <th scope="col">File Name</th>
                <th scope="col">File Type</th>
                <th scope="col">File Size (in KB)</th>
                <th scope="col">Download</th>
            </tr>
            </thead>
<tbody>
    <?php
    // show uploaded files
    $uploadFileDir = './uploads/';
    $uploadedFiles = scandir($uploadFileDir);
    foreach($uploadedFiles as $file){
        if(in_array($file, array('.', '..'))){
            continue;
        }
        $filePath = $uploadFileDir . $file;
        if(is_file($filePath)){
            $fileInfo = pathinfo($filePath);
            $fileSize = filesize($filePath) / 1024;
            ?>
            <tr>
                <td><?php echo $fileInfo['basename']; ?></td>
                <td><?php echo $fileInfo['extension']; ?></td>
                <td><?php echo round($fileSize, 2); ?></td>
                <td><a href="<?php echo $uploadFileDir . $fileInfo['basename']; ?>" download><i class="fas fa-file-download"></i></a></td>
            </tr>
            <?php
        }
    }
    ?>
</tbody>

    </table>
</div>
</div>

</body>
<?php
// Include footer
include("footer.php");
?>

</html>