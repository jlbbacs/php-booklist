<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Book List</title>
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
        if (isset($_SESSION["create"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION["create"];
                    unset($_SESSION["create"]);
                ?>
            </div>
            <?php
        }
        ?>

        <?php
        if (isset($_SESSION["edit"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION["edit"];
                    unset($_SESSION["edit"]);
                ?>
            </div>
            <?php
        }
        ?>

        <?php
        if (isset($_SESSION["delete"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION["delete"];
                    unset($_SESSION["delete"]);
                ?>
            </div>
            <?php
        }
        ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connect.php");
                    $sql = "SELECT * FROM books";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $row["id"] ?></td>
                            <td><?php echo $row["title"] ?></td>
                            <td><?php echo $row["author"] ?></td>
                            <td><?php echo $row["type"] ?></td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
                                    <a href="view.php?id=<?php echo $row["id"] ?>" class="btn btn-info btn-sm">👀 Read More</a>
                                    <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">🗑 Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "delete.php?id=" + id + "&confirm_delete=1";
            }
        }
    </script>

</body>

</html>
