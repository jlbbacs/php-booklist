<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Book List</title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-between align-items-center my-4">
            <h1 class="h3">Book List</h1>  
            <div>
                <a href="create.php" class="btn btn-primary">Add new book</a>
            </div>     
        </header>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
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
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["author"] ?></td>
                        <td><?php echo $row["type"] ?></td>
                        <td class="text-nowrap">
                            <a href="view.php?id=<?php echo $row["id"] ?>" class="btn btn-info btn-sm my-1">Read More</a>
                            <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-warning btn-sm my-1">Edit</a>
                            <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm my-1">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
