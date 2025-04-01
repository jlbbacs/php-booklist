<?php
include("connect.php");

// Check if database connection is successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

session_start(); // Ensure session is started

// CREATE operation
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    // Debugging: Check if values are received
    if (empty($title) || empty($author) || empty($type) || empty($description)) {
        die("Error: All fields are required.");
    }

    $sql = "INSERT INTO books (title, author, type, description) 
            VALUES ('$title', '$author', '$type', '$description')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["create"] = "Record created successfully!";
        header("Location: index.php");
        exit;
    } else {
        die("Error inserting record: " . mysqli_error($conn)); // Debugging
    }
}

// UPDATE operation
if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    if (empty($id) || empty($title) || empty($author) || empty($type) || empty($description)) {
        die("Error: All fields are required for update.");
    }

    $sql = "UPDATE books SET 
                title='$title', 
                author='$author', 
                type='$type', 
                description='$description' 
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["edit"] = "Edit successful!";
        header("Location: index.php");
        exit;
    } else {
        die("Error updating record: " . mysqli_error($conn)); // Debugging
    }
}

// Close database connection
mysqli_close($conn);
?>
