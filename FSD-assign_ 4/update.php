<?php
include "config.php";

$firstname = $lastname = $student_id = $password = $contactnumber = '';

if(isset($_POST['Update'])){
    $firstname= $_POST['first_name'];
    $lastname= $_POST['last_name'];
    $student_id= $_POST['roll_id'];
    $password= $_POST['password'];
    $contactnumber= $_POST['contact_number'];

   $sql ="UPDATE `students` SET `first_name` = '$firstname', `last_name`= '$lastname', `password`= '$password', `contact_number` = '$contactnumber' WHERE `roll_id`= '$student_id' ";


    $result= $conn->query($sql);

    if($result == TRUE){
        echo "Record updated successfully";
    }
    else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

}



if(isset($_GET['roll_id'])){
    $student_id = $_GET['roll_id'];

    $sql = "SELECT * FROM `students` WHERE `roll_id`='$student_id'";


    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row= $result->fetch_assoc()){
            $firstname= $row['first_name'];
            $lastname= $row['last_name'];
            $student_id= $row['roll_id'];
            $password= $row['password'];
            $contactnumber= $row['contact_number'];

        }
       
    }
    else{
        header('Location: view.php');
    }
}
?>

    
  
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow+Semi+Condensed:ital@0;1&display=swap" rel="stylesheet">
    </head>

      <h2> User Update Form</h2>
            <form action ="update.php" method = "post">
                <fieldset>
                    First name:<br>
                    <input type= "text" name="first_name" value="<?php echo $firstname; ?>">
                    <input type= "hidden" name="roll_id" value="<?php echo $student_id; ?>">
                    <br>

                    Last Name:<br>
                    <input type= "text" name="last_name" value="<?php echo $lastname; ?>">
                    <br>
                    Password:<br>
                    <input type= "password" name="password" value="<?php echo $password; ?>">
                    <br>
                    Contact Number:<br>
                    <input type= "text" name="contact_number" value="<?php echo $contactnumber; ?>">
                    <br>
                    <input type="submit" value="Update" name= "Update">
                </fieldset>
             </form>
    </body>
    </html>