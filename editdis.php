<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

$dis_id = $_GET['dis_id'];

$query = mysqli_query($conn, "SELECT * FROM distributor WHERE Distributor_ID = '$dis_id'");

$tampil = mysqli_fetch_array($query);

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
        <li class="breadcrumb-item active" aria-current="page">Edit Distributor</li>
      </ol>
    </nav>
    <br>

    <h2>Edit Distributor</h2>

    <br>

    <form class="row g-3" action="" method="post">
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Distributor name</label>
        <input type="text" class="form-control" id="inputEmail4" name="name" value="<?= $tampil['name']; ?>">
      </div>
      <div class="col-md-4">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity" name="city" value="<?= $tampil['city']; ?>">
      </div>
      <div class="col-md-4">
        <label for="inputZip" class="form-label">State/Region</label>
        <input type="text" class="form-control" id="inputZip" name="state" value="<?= $tampil['state']; ?>">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Country</label>
        <select id="inputState" class="form-select" name="country">
          <option value="Australia" <?php if ($tampil['country'] == 'Australia') echo ' selected="selected"'; ?>>
            Australia</option>
          <option value="Indonesia" <?php if ($tampil['country'] == 'Indonesia') echo ' selected="selected"'; ?>>
            Indonesia</option>
          <option value="Singapura" <?php if ($tampil['country'] == 'Singapura') echo ' selected="selected"'; ?>>
            Singapura</option>
          <option value="Malaysia" <?php if ($tampil['country'] == 'Malaysia') echo ' selected="selected"'; ?>>Malaysia
          </option>
        </select>
      </div>

      <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="text" class="form-control" id="inputPassword4" name="phone" value="<?= $tampil['phone']; ?>">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Email</label>
        <input type="text" class="form-control" id="inputAddress" name="email" value="<?= $tampil['email']; ?>">
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary" name="edit">Add</button>
      </div>
    </form>

  </div>
  <?php include 'footer.php'; ?>
</body>

</html>

<?php

if (isset($_POST['edit'])) {
  $disname = $_POST['name'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $query = "UPDATE distributor SET name = '$disname', city = '$city', state = '$state', country = '$country', phone = '$phone', email = '$email' WHERE Distributor_ID = '$dis_id'";

  $edit = mysqli_query($conn, $query);

  if ($edit) {
    echo "<script>
      alert('Data Berhasil diupdate');
      window.location.href = 'distributor.php';

    </script>";
  } else {
    echo "<script>
      alert('Data Gagal diupdate');
      window.location.href = 'editdis.php';

    </script>";
  }
}

?>