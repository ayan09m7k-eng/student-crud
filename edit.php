<?php
require "connection.php";

$id = (int)($_GET["id"] ?? 0);
$result = mysqli_query($conn, "SELECT * FROM students WHERE ID='$id' OR id='$id'");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<div style='font-family:sans-serif; text-align:center; padding:50px;'>";
    echo "<h3>Student record not found.</h3>";
    echo "<a href='admin-view.php'>Return to Student Directory</a>";
    echo "</div>";
    exit();
}

$studentId = $row['ID'] ?? $row['id'] ?? 0;
$currentPhoto1 = $row['photo1'] ?? $row['ownImage'] ?? '';
$currentPhoto2 = $row['photo2'] ?? $row['marksheet'] ?? '';
$currentPhoto3 = $row['photo3'] ?? $row['marksheet2'] ?? '';
$currentPhoto4 = $row['photo4'] ?? $row['sign'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .edit-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 35px;
            max-width: 720px;
            margin: 40px auto;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
        }
        .file-preview-thumb {
            width: 46px;
            height: 46px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
        }
    </style>
</head>
<body>

    <!-- Simple Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
        <div class="container" style="max-width: 720px;">
            <a class="navbar-brand fw-bold text-primary" href="index.php">
                <i class="bi bi-mortarboard-fill me-1"></i> Student Portal
            </a>
            <div class="ms-auto">
                <a href="admin-view.php" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to Directory
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="edit-card">
            <h2 class="fw-bold mb-1">Edit Student Record</h2>
            <p class="text-muted small mb-4">Update student details or replace uploaded document files (Record #<?php echo htmlspecialchars($studentId); ?>)</p>

            <form action="update.php" method="post" enctype="multipart/form-data">
                
                <!-- Hidden fields for ID and old photos -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($studentId); ?>">
                <input type="hidden" name="old_photo1" value="<?php echo htmlspecialchars($currentPhoto1); ?>">
                <input type="hidden" name="old_photo2" value="<?php echo htmlspecialchars($currentPhoto2); ?>">
                <input type="hidden" name="old_photo3" value="<?php echo htmlspecialchars($currentPhoto3); ?>">
                <input type="hidden" name="old_photo4" value="<?php echo htmlspecialchars($currentPhoto4); ?>">

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Student Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($row["name"] ?? ''); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row["email"] ?? ''); ?>" required>
                </div>

                <hr class="my-4">
                <h6 class="fw-bold mb-3 text-secondary">Document Files (Leave empty to keep existing files):</h6>

                <!-- Photo 1: Own Image -->
                <div class="mb-3 p-3 bg-light border rounded-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label fw-semibold mb-0">Own Image (Profile Photo):</label>
                        <?php if (!empty($currentPhoto1) && file_exists("uploads/" . $currentPhoto1)): ?>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-secondary">Current File</span>
                                <img src="uploads/<?php echo htmlspecialchars($currentPhoto1); ?>" class="file-preview-thumb">
                            </div>
                        <?php endif; ?>
                    </div>
                    <input type="file" name="photo1" class="form-control" accept="image/jpeg,image/png,image/jpg">
                </div>

                <!-- Photo 2: 10th Marksheet -->
                <div class="mb-3 p-3 bg-light border rounded-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label fw-semibold mb-0">10th Marksheet:</label>
                        <?php if (!empty($currentPhoto2) && file_exists("uploads/" . $currentPhoto2)): ?>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-secondary">Current File</span>
                                <img src="uploads/<?php echo htmlspecialchars($currentPhoto2); ?>" class="file-preview-thumb">
                            </div>
                        <?php endif; ?>
                    </div>
                    <input type="file" name="photo2" class="form-control" accept="image/jpeg,image/png,image/jpg">
                </div>

                <!-- Photo 3: 12th Marksheet -->
                <div class="mb-3 p-3 bg-light border rounded-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label fw-semibold mb-0">12th Marksheet:</label>
                        <?php if (!empty($currentPhoto3) && file_exists("uploads/" . $currentPhoto3)): ?>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-secondary">Current File</span>
                                <img src="uploads/<?php echo htmlspecialchars($currentPhoto3); ?>" class="file-preview-thumb">
                            </div>
                        <?php endif; ?>
                    </div>
                    <input type="file" name="photo3" class="form-control" accept="image/jpeg,image/png,image/jpg">
                </div>

                <!-- Photo 4: Signature -->
                <div class="mb-4 p-3 bg-light border rounded-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label fw-semibold mb-0">Signature Image:</label>
                        <?php if (!empty($currentPhoto4) && file_exists("uploads/" . $currentPhoto4)): ?>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-secondary">Current File</span>
                                <img src="uploads/<?php echo htmlspecialchars($currentPhoto4); ?>" class="file-preview-thumb">
                            </div>
                        <?php endif; ?>
                    </div>
                    <input type="file" name="photo4" class="form-control" accept="image/jpeg,image/png,image/jpg">
                </div>

                <button type="submit" name="update" value="Update Record" class="btn btn-primary w-100 py-2.5 fw-bold">
                    <i class="bi bi-check-lg me-1"></i> Update Record
                </button>

            </form>
        </div>
    </div>

</body>
</html>