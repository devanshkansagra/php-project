<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  <!-- Boxicons CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css">
  <script src="../js/script.js"></script>
</head>
<?php 
  include('./config.php');
?>
<body data-bs-theme="dark">
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand">Admin</a>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="d-flex justify-content-between">
      <div>
        <a href="./generatePDF.php" class="btn btn-success">Export as PDF&nbsp;<i class='bx bx-export'></i></a>
      </div>
      <div>
        <form action="./deleteAll.php" method="post">
          <input type="submit" class="btn btn-danger" value="Delete All" id="deleteAll">
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col mt-3">
        <table class="table" id="dataTable" border=1>
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Last Login/Signup</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $result = mysqli_query($conn, 'SELECT * FROM movieUsers');
              $id = 1;
              while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $data["Name"] . "</td>";
                echo "<td>" . $data["Email"] . "</td>";
                echo "<td>" . $data["Password"] . "</td>";
                echo "<td>" . $data["LastLogin"] . "</td>";
                echo '<td><a href="./delete.php?id=' . $data['id'] . '" class="btn btn-danger" id="deleteBtn">Delete <i class="bx bx-trash"></i></a></td>';
                echo "</tr>";
                $id += 1;
              }
            ?>
          </tbody>
          <a href="./delete.php/?$data['id']"></a>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  
</body>
</html>