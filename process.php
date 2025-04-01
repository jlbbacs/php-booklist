<?php
include("connect.php");

// Check if database connection is successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// CREATE operation
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sql = "INSERT INTO books (title, author, type, description) 
            VALUES ('$title', '$author', '$type', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "Record successfully inserted";
    } else {
        die("Error inserting record: " . mysqli_error($conn));
    }
}

// UPDATE operation
if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sql = "UPDATE books SET 
                title='$title', 
                author='$author', 
                type='$type', 
                description='$description' 
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record Updated";
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
}

// Close database connection (optional)
mysqli_close($conn);
?>
