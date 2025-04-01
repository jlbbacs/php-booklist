<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        .book-details {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 600px;
            margin-top: 20px;
        }
        h5 {
            color: #343a40;
            margin-bottom: 5px;
        }
        p {
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-between align-items-center my-4">
            <h1 class="h3">Book Details</h1>  
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>     
        </header>
        
        <div class="book-details my-4">
            <?php
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    include("connect.php");
                    $sql = "SELECT * FROM books WHERE id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
            ?>
                    <h5>Title</h5>
                    <p><?php echo htmlspecialchars($row["title"]); ?></p>
                    
                    <h5>Description</h5>
                    <p><?php echo htmlspecialchars($row["description"]); ?></p>
                    
                    <h5>Type</h5>
                    <p><?php echo htmlspecialchars($row["type"]); ?></p>
                    
                    <h5>Author</h5>
                    <p><?php echo htmlspecialchars($row["author"]); ?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
