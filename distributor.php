<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

$query = "SELECT * FROM distributor";
$result = $conn->query($query);

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
    <h2>Distributor</h2>


    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Distributor name</th>
          <th>City</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?= $row['name']; ?></td>
          <td><?= $row['city']; ?></td>
          <td>
            <a class="btn btn-primary" href="editdis.php?dis_id=<?php echo $row["Distributor_ID"]; ?>">Edit</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>

    </table>

    <a class="btn btn-secondary" href="tambahdis.php">Add</a>

  </div>

  <div class="mb-70"></div>
  <?php include 'footer.php'; ?>
</body>

</html>