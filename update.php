<?php
include "./includes/db_connect.php";
// Pre-fill Form
$data = [];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
}

// Update Data
if (isset($_POST['update'])) {
    $id = $_POST['id'] ?? 0;
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $year_of_study = trim($_POST['year_of_study'] ?? '');
    $address = trim($_POST['address'] ?? '');

    // Validation
    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($gender)) $errors[] = "Gender is required.";
    if (empty($contact) || !preg_match("/^[0-9]{9,12}$/", $contact)) $errors[] = "Contact must be 9-12 digits.";
    if (empty($subject)) $errors[] = "Subject is required.";
    if (empty($year_of_study)) $errors[] = "Year of Study is required.";
    if (empty($address)) $errors[] = "Address is required.";

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE students SET name=?, email=?, gender=?, contact=?, subject=?, year_of_study=?, address=? WHERE id=?");
        $stmt->bind_param("sssssssi", $name, $email, $gender, $contact, $subject, $year_of_study, $address, $id);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            // echo "<script>alert('Data updated successfully!'); window.location='table.php';</script>";
            header("Location: table.php");
            exit();
        } else {
            echo "Error updating data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "<script>alert('Errors:\\n" . implode("\\n", $errors) . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Form</title>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <h2>Update Student Data</h2>
    <div class="form-container">
        <form id="contact-form" action="" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id'] ?? ''); ?>">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Enter the Name" value="<?php echo htmlspecialchars($data['name'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter the Email" 
                    value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="css-compiler">Gender</label>
                    <select id="css-compiler" name="gender" 
                    value="<?php echo htmlspecialchars($data['gender'] ?? ''); ?>">
                        <option value="0">Select the Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Contact</label>
                        <input type="text" name="contact" placeholder="Enter the Contact"
                        value="<?php echo htmlspecialchars($data['contact'] ?? ''); ?>">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="css-compiler-1">Subject</label>
                    <select id="css-compiler-1" name="subject" value="<?php echo htmlspecialchars($data['subject'] ?? ''); ?>">
                        <option value="0">Select to Subject</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Biology">Biology</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="English">English</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="css-compiler-1">Year of Study</label>
                        <select id="css-compiler-1" name="year_of_study" value="<?php echo htmlspecialchars($data['year_of_study'] ?? ''); ?>">
                            <option value="0">Select to Year</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                            <option value="5">5th Year</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="message">Address</label>
                <textarea name="address"><?php echo htmlspecialchars($data['address'] ?? ''); ?></textarea>
            </div>


            <div class="form-actions mt-2">
                <button type="submit" name="update"><i class="bi bi-database-add"></i> Input Data</button>
                <button type="reset"><i class="bi bi-escape"></i> Clear Form</button>
            </div>
        </form>

    </div>
</body>
</html>
 