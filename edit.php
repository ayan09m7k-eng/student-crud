<?php

require "connection.php";
$id = $_GET["id"];
$result = mysqli_query($con,"SELECT * FROM students WHERE id='$id'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Info</title>
</head>
<body>
    <h2>Edit Student</h2>

    <form action="update.php" method="post">
        
    </form>
    
</body>
</html>