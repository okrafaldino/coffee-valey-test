<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

if (isset($_POST['simpan'])) {
  $disname = $_POST['name'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $query = "INSERT INTO distributor (name, city, state, country, phone, email) VALUES ('$disname', '$city', '$state', '$country','$phone','$email')";

  $simpan = mysqli_query($conn, $query);

  if ($simpan) {
    echo "<script>
          window.location.href = 'distributor.php';
          alert('Data Berhasil disimpan');
    </script>";
  } else {
    echo "<script>
          alert('Data Gagal disimpan');
    </script>";
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
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="distributor.php">Distributor</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Distributor</li>
      </ol>
    </nav>
    <br>

    <h2>Tambah Distributor</h2>


    <br>

    <form class="row g-3" action="" method="post">
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Distributor name</label>
        <input type="text" class="form-control" id="inputEmail4" name="name">
      </div>
      <div class="col-md-4">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity" name="city">
      </div>
      <div class="col-md-4">
        <label for="inputZip" class="form-label">State/Region</label>
        <input type="text" class="form-control" id="inputZip" name="state">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Country</label>
        <select id="inputState" class="form-select" name="country">
          <option value="Australia" selected>Australia</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Singapura">Singapura</option>
          <option value="Malaysia">Malaysia</option>
        </select>
      </div>

      <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="text" class="form-control" id="inputPassword4" name="phone">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Email</label>
        <input type="text" class="form-control" id="inputAddress" name="email">
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary" name="simpan">Add</button>
      </div>
    </form>

  </div>

  <span class="w-100"></span>
  <?php include 'footer.php'; ?>
</body>

</html>