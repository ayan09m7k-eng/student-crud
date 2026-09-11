<?php
require "connection.php";
$message = "";
$success = false;

if (isset($_POST["submit"])) {
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');

    $ownImage = time() . "_" . basename($_FILES["ownImage"]["name"] ?? '');
    $ownImage_temp = $_FILES["ownImage"]["tmp_name"] ?? '';
    $ownImage_type = strtolower($_FILES["ownImage"]["type"] ?? '');
    $ownImage_size = $_FILES["ownImage"]["size"] ?? 0;

    $marksheet = time() . "_" . basename($_FILES["marksheet"]["name"] ?? '');
    $marksheet_temp = $_FILES["marksheet"]["tmp_name"] ?? '';
    $marksheet_type = strtolower($_FILES["marksheet"]["type"] ?? '');
    $marksheet_size = $_FILES["marksheet"]["size"] ?? 0;

    $marksheet2 = time() . "_" . basename($_FILES["marksheet2"]["name"] ?? '');
    $marksheet2_temp = $_FILES["marksheet2"]["tmp_name"] ?? '';
    $marksheet2_type = strtolower($_FILES["marksheet2"]["type"] ?? '');
    $marksheet2_size = $_FILES["marksheet2"]["size"] ?? 0;

    $sign = time() . "_" . basename($_FILES["sign"]["name"] ?? '');
    $sign_temp = $_FILES["sign"]["tmp_name"] ?? '';
    $sign_type = strtolower($_FILES["sign"]["type"] ?? '');
    $sign_size = $_FILES["sign"]["size"] ?? 0;

    $allowedTypes = ["image/jpeg", "image/png", "image/jpg", "image/pjpeg"];

    if (
        !in_array($ownImage_type, $allowedTypes) ||
        !in_array($marksheet_type, $allowedTypes) ||
        !in_array($marksheet2_type, $allowedTypes) ||
        !in_array($sign_type, $allowedTypes)
    ) {
        $message = "Only JPG and PNG images are allowed.";
    } elseif (
        $ownImage_size > 2097152 ||
        $marksheet_size > 2097152 ||
        $marksheet2_size > 2097152 ||
        $sign_size > 2097152
    ) {
        $message = "Maximum size of each image must not exceed 2MB.";
    } else {
        move_uploaded_file($ownImage_temp, "uploads/" . $ownImage);
        move_uploaded_file($marksheet_temp, "uploads/" . $marksheet);
        move_uploaded_file($marksheet2_temp, "uploads/" . $marksheet2);
        move_uploaded_file($sign_temp, "uploads/" . $sign);

        $sql = "INSERT INTO students (name, email, photo1, photo2, photo3, photo4)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $ownImage, $marksheet, $marksheet2, $sign);
            if (mysqli_stmt_execute($stmt)) {
                $success = true;
                // Redirect directly to admin.admin.admin.admin.admin.admin.admin.admin.admin.view.php so the user sees their new entry in the database table
                header("Location: admin-view.php");
                exit();
            } else {
                $message = "Database Insert Error: " . mysqli_error($conn);
            }
        } else {
            // Fallback direct query if prepare fails
            $sqlRaw = "INSERT INTO students (name, email, photo1, photo2, photo3, photo4) 
                       VALUES ('$name', '$email', '$ownImage', '$marksheet', '$marksheet2', '$sign')";
            if (mysqli_query($conn, $sqlRaw)) {
                $success = true;
                header("Location: admin-view.php");
                exit();
            } else {
                $message = "Database Error: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status | St. Lawrence College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm border-0 rounded-4 p-4 text-center">
            <?php if ($success): ?>
                <div class="text-success display-4 mb-3">✓</div>
                <h4 class="fw-bold mb-2">Registration Successful!</h4>
                <p class="text-muted mb-4">Student information has been saved into the database.</p>
                <a href="admin.admin.admin.admin.admin.admin.admin.admin.admin.view.php" class="btn btn-primary px-4 py-2">View in Student Directory</a>
            <?php else: ?>
                <div class="text-danger display-4 mb-3">✕</div>
                <h4 class="fw-bold mb-2">Registration Failed</h4>
                <p class="text-muted mb-4"><?php echo htmlspecialchars($message ?: "No form data was received."); ?></p>
                <a href="form.php" class="btn btn-secondary px-4 py-2">Back to Registration Form</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>