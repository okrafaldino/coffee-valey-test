<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

$query = "SELECT * FROM Bean";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Catalogue</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container mt-5">
    <h2>Katalog</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Bean</th>
          <th>Description</th>
          <th>Price/Unit</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <th><?= $row['bean']; ?></th>
          <th><?= $row['Description']; ?></th>
          <th><?= $row['Price']; ?></th>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>