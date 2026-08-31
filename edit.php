<?php

require "connection.php";
$id = $_GET["id"];
$result = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
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
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"> <br><br>
        Name: <input type="text" name="name" value="<?php echo $row["name"]; ?>"> <br><br>
        Email: <input type="email" name="email" value="<?php echo $row ["email"]; ?>"> <br><br>
        Own Image: <input type="file" name="ownImage" required value="<?php echo $row["ownImage"]; ?>"> <br><br>
        10th Marksheet: <input type="file" name="marksheet" required value="<?php echo $row["marksheet"];?>"> <br><br>
        12th Marksheet: <input type="file" name="marksheet2" required value="<?php echo $row["marksheet2"];?>"> <br><br>
        Upload Signature:  <input type="file" name="sign" required value="<?php echo $row["sign"];?>"> <br><br>
        <input type="submit" name="submit" value="Update Record">
        
    </form>
    
</body>
</html>