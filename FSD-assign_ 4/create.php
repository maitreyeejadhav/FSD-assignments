<?php
include "config.php";

$errors = array();

if (isset($_POST['submit'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $rollid = $_POST['roll_id'];
    $password = $_POST['password'];
    $contactnumber = $_POST['contact_number'];

    // Basic validation
    if (empty($firstname)) {
        $errors[] = "First name is required";
    }

    if (empty($lastname)) {
        $errors[] = "Last name is required";
    }

    if (empty($rollid)) {
        $errors[] = "Roll id is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($contactnumber)) {
        $errors[] = "Contact number is required";
    }

    // Check if there are no errors before inserting into the database
    if (empty($errors)) {
        $sql = "INSERT INTO `students` (`first_name`, `last_name`, `roll_id`, `password`, `contact_number`) VALUES ('$firstname', '$lastname', '$rollid','$password','$contactnumber') ";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

 <!DOCTYPE html>
 <html>
    <body>
        <head>
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow+Semi+Condensed:ital@0;1&display=swap" rel="stylesheet">
        </head>
        <h2>Student Registration Form</h2>

        <form action="" method= "POST">
            <fieldset>
                First Name:<br>
                <input type ="text" name="first_name" required>
                <br>
                Last Name:<br>
                <input type="text" name="last_name" required>
                <br>
                Roll id:<br>
                <input type="text" name="roll_id" required>
                <br>
                Password:<br>
                <input type ="password" name= "password" required>
                <br>
                Contact number:<br>
                <input type ="text" name= "contact_number" required>
                <br>
                <input type= "submit" name="submit" value="Submit">
                <br>
                <a href="view.php" class="button">View student details</a>
                <br>


                
            </fieldset>
            
        </form>

    </body>
</html>


