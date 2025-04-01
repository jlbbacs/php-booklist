<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        .book-details{
            background-color: #f5f5f5;
            padding:50px;
        }
    </style>
</head>
<body>
    <div class="container">
    <header class="d-flex flex-wrap justify-content-between align-items-center my-4">
            <h1>Book Details</h1>  
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>     
        </header>
        <div class="book-details my-4">
            <?php
                if(isset( $_GET["id"])) {
                    $id = $_GET["id"];
                    include("connect.php");
                    $sql = "SELECT * FROM books WHERE id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    
                    ?>

                    <h5>Title</h5>
                    <p><?php echo $row["title"];?></p>
                    
                    <h5>Description</h5>
                    <p><?php echo $row["description"];?></p>

                    <h5>Type</h5>
                    <p><?php echo $row["type"];?></p>

                    <h5>Author</h5>
                    <p><?php echo $row["author"];?></p>
                    <?php

                }


                
               
            ?>
        </div>
    </div>
    
</body>
</html>