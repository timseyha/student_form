<?php
include "./includes/db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: table.php");
        exit();
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>