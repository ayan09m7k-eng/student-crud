<?php
     
     
     if(isset($_POST["submit"])){
        session_start();
        $admin = $_POST["admin"];
        $password = $_POST["pass"];
        if($admin == "admin" && $password == "admin123"){
            $_SESSION["admin"] = $admin;
            header("Location:admin-view.php");
        }
        else{
            echo "Invalid username or password";
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <form method="post">
    Username: 
    <input type="text" name="admin"> 
    <br> <br>
    Password
    <input type="password" name="pass">
    <br><br>
    <input type="submit" name="submit" value="Login">
     </form>
</body>
</html>