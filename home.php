<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

$query = "SELECT b.Description,b.bean,db.Sale_Price FROM Bean b JOIN DailyBean db ON b.Bean_ID = db.Bean_ID WHERE db.Sale_Price >= 0.00";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>



<body>
  <?php include 'header.php'; ?>
  <div class="container mt-5">
    <h2 class="">Home</h2>
    <hr class="mb-3">

    <?php while ($row = $result->fetch_assoc()) : ?>
    <h4>Bean Of The Day</h4>
    <p><?= $row['bean']; ?></p>
    <h4>Sale Price</h4>
    <p>$ <?= $row['Sale_Price']; ?></p>
    <h4>Description</h4>
    <p><?= $row['Description']; ?></p>
    <?php endwhile; ?>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>