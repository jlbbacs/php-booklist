<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Book</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary, .btn-success {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <header class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 text-primary">Edit Book</h2>  
                <a href="index.php" class="btn btn-outline-primary">Back</a>
            </header>
            <?php
                if(isset($_GET["id"])){
                    $id= $_GET["id"];
                    include("connect.php");
                    $sql = "SELECT * FROM books WHERE id = $id";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
            ?>
            <form action="process.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'] ?>" placeholder="Enter book title" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $row['author']?>" placeholder="Enter author name" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Book Type</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">Select Book Type</option>
                        <option value="Adventure" <?php if($row['type'] == "Adventure") {echo "selected";} ?>>Adventure</option>
                        <option value="Fantasy" <?php if($row['type'] == "Fantasy") {echo "selected";} ?>>Fantasy</option>
                        <option value="Sci-Fi" <?php if($row['type'] == "Sci-Fi") {echo "selected";} ?>>Sci-Fi</option>
                        <option value="Horror" <?php if($row['type'] == "Horror") {echo "selected";} ?>>Horror</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required><?php echo $row["description"]?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="text-center">
                    <input type="submit" class="btn btn-success w-100" name="edit" value="Update">
                </div>
            </form>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
