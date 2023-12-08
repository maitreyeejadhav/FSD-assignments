<?php
    include "config.php";

    if(isset($_GET['roll_id'])){
        $student_id = $_GET['roll_id'];
    
        $sql = "DELETE FROM `students` WHERE `roll_id`= '$student_id'";

        $result= $conn->query($sql);

        if($result == TRUE){
            echo "Record deleted successfully";
        }
        else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
    ?>