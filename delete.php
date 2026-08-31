<?php
require "connection.php";

$id = $_GET["id"];
$sql = "DELETE FROM students WHERE id=$id";
if(mysqli_query($conn, $sql)) {
    echo "Record Deleted Sucessfully";
}
else {
    echo "Delete failed";
}

header("Location:view.php");
exit();
?>