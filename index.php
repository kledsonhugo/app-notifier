<?php include "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      padding: 40px;
    }
    .container {
      max-width: 800px;
      margin: auto;
    }
    .footer {
      font-size: 0.8em;
      text-align: center;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mb-4 text-primary">Add Contact</h1>

    <?php
      $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
      if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

      $database = mysqli_select_db($connection, DB_DATABASE);
      VerifyUsersTable($connection, DB_DATABASE);

      $user_name = htmlentities($_POST['NAME']);
      $user_cellphone = htmlentities($_POST['CELLPHONE']);

      if (strlen($user_name) || strlen($user_cellphone)) {
        AddUser($connection, $user_name, $user_cellphone);
      }
    ?>

    <!-- Formulário de cadastro -->
    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" class="mb-4">
      <div class="row g-3 align-items-end">
        <div class="col-md-6">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="NAME" maxlength="45" required>
        </div>
        <div class="col-md-6">
          <label for="cellphone" class="form-label">Cellphone</label>
          <input type="text" class="form-control" name="CELLPHONE" maxlength="90" required>
        </div>
      </div>
      <button type="submit" class="btn btn-success mt-3">Add Contact</button>
    </form>

    <!-- Lista de contatos -->
    <h2 class="text-primary">Contact List</h2>
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Cellphone</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $result = mysqli_query($connection, "SELECT * FROM USERS");
          while($query_data = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td align=\"center\">$query_data[0]</td>";
            echo "<td>$query_data[1]</td>";
            echo "<td>$query_data[2]</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>

    <?php
      mysqli_free_result($result);
      mysqli_close($connection);
    ?>

    <div class="footer text-muted">
      All rights reserved. Please contact <a href="mailto:kledsonhugo@gmail.com">Kledson Basso</a> for questions.
    </div>
  </div>

</body>
</html>
