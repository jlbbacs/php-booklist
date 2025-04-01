<?php
include('connect.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Execute deletion only if 'confirm_delete' is present
    if (isset($_GET['confirm_delete']) && $_GET['confirm_delete'] == 1) {
        $sql = "DELETE FROM books WHERE id = '$id'";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Record Deleted Successfully'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error deleting record: " . mysqli_error($conn) . "'); window.location.href = 'index.php';</script>";
        }
    } else {
        // Redirect back if user cancels
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>
