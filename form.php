<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
</head>
<body>
    <form action="form.php" method="post" enctype="multipart/form-data">
        Name:
        <input type="text" name="name" required>
        <br><br>
        Email:
        <input type="email" name="email" required>
        <br><br>
        <!-- password:
        <input type="password" name="password" required>
        <br><br> -->
        Upload Own Imgae
        <input type="file" name="ownImage" required>
        <br><br>    
        Upload 10th Marksheet Imgae
        <input type="file" name="marksheet" required>
        <br><br>    
        Upload 12th Marksheet Imgae
        <input type="file" name="marksheet2" required>
        <br><br>    
        Upload Signature Imgae
        <input type="file" name="sign" required>
        <br><br>
        <input type="submit" name="submit" value="Submit Form">
        <br><br>


    </form>
</body>
</html>