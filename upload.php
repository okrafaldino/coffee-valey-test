<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $filename = $_FILES['file']['name'];
  $filetmp = $_FILES['file']['tmp_name'];
  $filePath = 'uploads/' . $filename;

  // Move the uploaded file to the uploads directory
  if (move_uploaded_file($filetmp, $filePath)) {
    $query = "INSERT INTO upload (title, author, Filename, Path) VALUES ('$title', '$author', '$filename', '$filePath')";

    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
      echo "<script>
            window.location.href = 'upload.php';
            alert('Data Berhasil disimpan');
      </script>";
    } else {
      echo "<script>
            alert('Data Gagal disimpan');
      </script>";
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Distributor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container mt-5">
    <h2>Upload</h2>

    <br>


    <form class="row g-3" enctype="multipart/form-data" action="" method="post">
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Title</label>
        <input type="text" class="form-control" id="inputEmail4" name="title">
      </div>
      <div class="col-md-6">
        <label for="formFile" class="form-label">Document File</label>
        <input class="form-control" type="file" id="formFile" name="file">
      </div>
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Author</label>
        <input type="text" class="form-control" id="inputEmail4" name="author">
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary" name="simpan">Add Document</button>
      </div>
    </form>



  </div>
  <?php include 'footer.php'; ?>
</body>

</html>