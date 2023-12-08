<?php
include "config.php";

$sql = "SELECT *FROM students";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Page</title>
        <link rel ="stylesheet"
        href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow+Semi+Condensed:ital@0;1&display=swap" rel="stylesheet">
        
</head>
<body>
    <div class= "container">
        <h2>Students</h2>
    <table class= "table">
        <head>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Roll no</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
</thread>
<tbody>
    <?php
    if ($result->num_rows>0){
        while($row = $result->fetch_assoc()){
       
            
    ?>     
    
            <tr>
                <td><?php echo $row['first_name']; ?> </td>
                <td><?php echo $row['last_name']; ?> </td>
                <td><?php echo $row['roll_id']; ?> </td>
                <td><?php echo $row['contact_number']; ?> </td>
                <td><a class= "btn btn-info" href="update.php?id=<?php echo $row['roll_id']; ?>">
                Edit</a>&nbsp;<a class= "btn btn-danger" href = "delete.php?roll_id=<?php echo $row['roll_id']; ?>">
                Delete</a></td>
        </tr>
        <?php


        }
    }

    ?>
    </tbody>
</table>
</div>
</body>
</html>

