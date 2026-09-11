<?php

    session_start();
if(!isset($_SESSION["admin"])){
header("Location:admin-login.php");
};

    require "connection.php";


    $totalQuery = "SELECT COUNT(*) AS total FROM students";
    $totalResult = mysqli_query($conn, $totalQuery);
    $totalStudents = mysqli_fetch_assoc($totalResult) ["total"];

    // echo $totalStudents;

    $students = mysqli_query($conn, "SELECT * FROM students");
    
    $studentResult= mysqli_query($conn,"SELECT * FROM students");  

    
    ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name Of Student</th>
            <th>Student's Email</th>
        </tr>
        
        <?php while ($row = mysqli_fetch_assoc($students)){?>
        <tr>
            <td><?php echo $row["name"] ?></td>
            <td> <?php  echo $row["email"]; ?> </td>
            
            
            
            
            <?php } ?>
        </tr>
        <form action="admin-view.php" method="GET">
    <button type="submit">Admin Go</button>
</form> 

        <p style="color: red; font-size: large;" >Total Numbers Of Students : <?php echo $totalStudents?></p>
    </table>