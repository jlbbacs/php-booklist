<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .action-buttons {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    @media (min-width: 768px) {
      .action-buttons {
        flex-direction: row;
      }
    }
  </style>
</head>

<body class="bg-light">
  <div class="container py-3">
    <header class="d-flex flex-column flex-md-row justify-content-between align-items-center my-4">
      <h1 class="h4 text-center text-md-start">📚 Book List</h1>
      <div class="text-center text-md-end">
        <a href="create.php" class="btn btn-primary">➕ Add New Book</a>
      </div>
    </header>

    <?php
    session_start();
    $alerts = ['create', 'edit', 'delete'];
    foreach ($alerts as $alert) {
      if (isset($_SESSION[$alert])) {
        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                ' . $_SESSION[$alert] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        unset($_SESSION[$alert]);
      }
    }
    ?>

    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm align-middle">
        <thead class="table-dark text-center">
          <tr>
            <!-- Removed the # column -->
            <th>Title</th>
            <th>Author</th>
            <th>Type</th>
            <th class="d-none d-md-table-cell">Action</th> <!-- Show Action header only on desktop -->
          </tr>
        </thead>
        <tbody>
          <?php
          include("connect.php");
          $sql = "SELECT * FROM books";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <!-- First Row: Book Info -->
            <tr>
              <!-- No ID column here -->
              <td><?php echo htmlspecialchars($row["title"]); ?></td>
              <td><?php echo htmlspecialchars($row["author"]); ?></td>
              <td><?php echo htmlspecialchars($row["type"]); ?></td>
              <!-- Desktop view buttons -->
              <td class="text-center d-none d-md-table-cell">
                <div class="action-buttons justify-content-center">
                  <a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-info btn-sm">👀 Read</a>
                  <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                  <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">🗑 Delete</button>
                </div>
              </td>
            </tr>
            <!-- Second Row: Mobile buttons -->
            <tr class="d-table-row d-md-none">
              <td colspan="3" class="text-center">
                <div class="action-buttons">
                  <a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-info btn-sm w-100">👀 Read</a>
                  <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm w-100">✏️ Edit</a>
                  <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm w-100">🗑 Delete</button>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function confirmDelete(id) {
      if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = "delete.php?id=" + id + "&confirm_delete=1";
      }
    }
  </script>

</body>

</html>
