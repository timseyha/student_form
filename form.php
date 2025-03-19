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
    <div class="form-container">
        <form id="contact-form" action="insert.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Enter the Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter the Email">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="css-compiler">Gender</label>
                    <select id="css-compiler" name="gender">
                        <option value="0">Select the Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Contact</label>
                        <input type="text" name="contact" placeholder="Enter your contact">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="css-compiler-1">Subject</label>
                    <select id="css-compiler-1" name="subject">
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
                        <select id="css-compiler-1" name="year_of_study">
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
                <textarea name="address" placeholder="Your address"></textarea>
            </div>


            <div class="form-actions mt-2">
                <button type="submit" name="insert"><i class="bi bi-database-add"></i> Input Data</button>
                <button type="reset"><i class="bi bi-escape"></i> Clear Form</button>
            </div>
        </form>
    </div>

   
</body>

<script src="./js/script.js"></script>

</html>