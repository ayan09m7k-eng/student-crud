<?php
    require "connection.php";

    $students = mysqli_query($conn, "SELECT * FROM students");
    $total = mysqli_query($conn,"SELECT * FROM students");

    
    ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Number Of Student</th>
            <th>All Students</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($students)){?>
            <tr>
                <td><?php echo $row["name"] ?></td>
                
        <tr>

        <?php } ?>
    </table>