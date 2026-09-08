<?php
require "connection.php";

if (isset($_POST["update"]) || isset($_POST["submit"])) {
    $id = (int)($_POST["id"] ?? 0);
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');

    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // Helper function to handle new file upload or fallback to existing
    function getUpdatedPhoto($fileKey, $oldKey) {
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]["error"] === UPLOAD_ERR_OK && !empty($_FILES[$fileKey]["name"])) {
            $fileName = time() . "_" . basename($_FILES[$fileKey]["name"]);
            $destination = "uploads/" . $fileName;
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $destination)) {
                return $fileName;
            }
        }
        return $_POST[$oldKey] ?? '';
    }

    $photo1 = getUpdatedPhoto("photo1", "old_photo1");
    $photo2 = getUpdatedPhoto("photo2", "old_photo2");
    $photo3 = getUpdatedPhoto("photo3", "old_photo3");
    $photo4 = getUpdatedPhoto("photo4", "old_photo4");

    $sql = "UPDATE students 
            SET name = ?,
                email = ?,
                photo1 = ?, 
                photo2 = ?, 
                photo3 = ?, 
                photo4 = ?
            WHERE ID = ? OR id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssii", $name, $email, $photo1, $photo2, $photo3, $photo4, $id, $id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: view.php");
            exit();
        } else {
            echo "Failed to update record: " . mysqli_error($conn);
        }
    } else {
        // Direct query fallback
        $sqlRaw = "UPDATE students 
                   SET name = '$name',
                       email = '$email',
                       photo1 = '$photo1', 
                       photo2 = '$photo2', 
                       photo3 = '$photo3', 
                       photo4 = '$photo4'
                   WHERE ID = $id OR id = $id";
        if (mysqli_query($conn, $sqlRaw)) {
            header("Location: view.php");
            exit();
        } else {
            echo "Failed to update record: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: view.php");
    exit();
}
?>
