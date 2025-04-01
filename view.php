<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        body {
            background-color: #eef2f3;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 700px;
            margin-top: 40px;
        }
        .header {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            padding: 20px;
            color: white;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .book-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
        }
        .back-btn {
            background-color: #2575fc;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            transition: 0.3s;
        }
        .back-btn:hover {
            background-color: #1a5bb8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="h4">Book Details</h1>
        </div>
        
        <div class="book-card">
            <?php
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    include("connect.php");
                    $sql = "SELECT * FROM books WHERE id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
            ?>
                    <h5 class="fw-bold">Title</h5>
                    <p class="text-muted"> <?php echo htmlspecialchars($row["title"]); ?> </p>
                    
                    <h5 class="fw-bold">Description</h5>
                    <p class="text-muted"> <?php echo htmlspecialchars($row["description"]); ?> </p>
                    
                    <h5 class="fw-bold">Type</h5>
                    <p class="text-muted"> <?php echo htmlspecialchars($row["type"]); ?> </p>
                    
                    <h5 class="fw-bold">Author</h5>
                    <p class="text-muted"> <?php echo htmlspecialchars($row["author"]); ?> </p>
            <?php } ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="index.php" class="btn back-btn">Back</a>
        </div>
    </div>
</body>
</html>