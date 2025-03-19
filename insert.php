<?php
include "./includes/db_connect.php";

if (isset($_POST['insert'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $year_of_study = $_POST['year_of_study'] ?? '';
    $address = $_POST['address'] ?? '';

    $stmt = $conn->prepare("INSERT INTO students (name, email, gender, contact, subject, year_of_study, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $gender, $contact, $subject, $year_of_study, $address);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: table.php");
        exit();
    } else {
        echo "Error inserting data: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

?>