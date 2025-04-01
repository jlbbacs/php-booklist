<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f9f9f9, #e3e3e3);
        }
        .form-container {
            width: 100%;
            max-width: 600px; /* Adjust max width for larger screens */
            padding: 20px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
        }
        .btn-custom {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
        }
        @media (max-width: 768px) {
            .form-container {
                max-width: 90%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
        <div class="form-container">
            <header class="text-center mb-4">
                <h2 class="fw-bold">📚 Add New Book</h2>
            </header>

            <form action="process.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">📖 Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
                </div>
                
                <div class="mb-3">
                    <label for="author" class="form-label">✍️ Author</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" required>
                </div>
                
                <div class="mb-3">
                    <label for="type" class="form-label">📂 Book Type</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">Select Book Type</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="SciFi">Sci-Fi</option>
                        <option value="Horror">Horror</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">📝 Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
                </div>

                <div class="d-grid">
                    <input type="submit" class="btn btn-success btn-custom" name="create" value="✅ Add Book">
                </div>

                <div class="text-center mt-3">
                    <a href="index.php" class="btn btn-outline-secondary btn-custom w-100">🔙 Back to List</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
