<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add New Book</title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-between align-items-center my-4">
            <h1 class="h3">Add New Book</h1>  
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>     
        </header>
        
        <form action="process.php" method="post" class="p-3 border rounded bg-light">
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Book Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">Select Book Type</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="SciFi">Sci-Fi</option>
                    <option value="Horror">Horror</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success w-100" name="create" value="Add Book">
            </div>
        </form>
    </div>
</body>
</html>
