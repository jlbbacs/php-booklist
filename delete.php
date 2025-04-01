<?php
include('connect.php');
session_start(); 

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

  
    if (isset($_GET['confirm_delete']) && $_GET['confirm_delete'] == 1) {
        $sql = "DELETE FROM books WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            $_SESSION["delete"] = "Deleted successfully!";
            header("Location: index.php");
            exit;
        } else {
            $_SESSION["delete"] = "Error deleting record: " . mysqli_error($conn);
            header("Location: index.php");
            exit;
        }
    } else {
        
        header("Location: index.php");
        exit;
    }
}
?>
