<?php
require "connection.php";

/*----------------------------------------Search------------------------------------------*/
$search = "";
if (isset($_GET["search"])) {
    $search = trim($_GET["search"]);
}

/*----------------------------------Sorting--------------------------------------------*/
$sort = "ASC";
if (isset($_GET["sort"]) && strtolower($_GET["sort"]) === "desc") {
    $sort = "DESC";
}

/*----------------------------------Pagination--------------------------------------*/
$limit = 5;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

/*---------------------------------------Total Records -----------------------------------*/
$searchParam = "%" . $search . "%";

$countSql = "SELECT COUNT(*) AS total FROM students WHERE name LIKE ? OR email LIKE ?";
$stmtCount = mysqli_prepare($conn, $countSql);
mysqli_stmt_bind_param($stmtCount, "ss", $searchParam, $searchParam);
mysqli_stmt_execute($stmtCount);
$countResult = mysqli_stmt_get_result($stmtCount);
$totalRecords = mysqli_fetch_assoc($countResult)["total"];
$totalPages = ceil($totalRecords / $limit);

/*------------------------------------Main Query-----------------------------------------*/
$sql = "SELECT * FROM students WHERE name LIKE ? OR email LIKE ? ORDER BY name $sort LIMIT $limit OFFSET $offset";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $searchParam, $searchParam);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records Management</title>
    <!-- Google Fonts & Bootstrap Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --bg-body: #f8fafc;
            --card-border: #e2e8f0;
            --primary-accent: #3b82f6;
            --primary-hover: #2563eb;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
        }

        .main-card {
            border: 1px solid var(--card-border);
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.03), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            background: #ffffff;
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 1px solid var(--card-border);
            padding: 28px 32px;
        }

        .avatar-img {
            width: 42px;
            height: 42px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .avatar-img:hover {
            transform: scale(1.08);
        }

        .doc-preview-wrapper {
            position: relative;
            display: inline-block;
        }

        .doc-thumbnail {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .doc-thumbnail:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-accent);
        }

        .table-custom {
            margin-bottom: 0;
        }

        .table-custom th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 700;
            padding: 16px;
            border-bottom: 1px solid var(--card-border);
        }

        .table-custom td {
            padding: 16px;
            vertical-align: middle;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-custom tbody tr {
            transition: background-color 0.15s ease;
        }

        .table-custom tbody tr:hover {
            background-color: #f8fafc;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-action:hover {
            transform: translateY(-1px);
        }

        .badge-na {
            background-color: #f1f5f9;
            color: #94a3b8;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
        }
    </style>
</head>
<body class="py-5">

    <div class="container-fluid px-4" style="max-width: 1240px;">
        <div class="main-card">
            
            <!-- Header Section -->
            <div class="card-header-custom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h3 class="fw-bold text-dark mb-1">Student Directory</h3>
                    <p class="text-muted small mb-0">Manage registered profiles and inspect uploaded credentials</p>
                </div>
                <a href="form.php" class="btn btn-primary px-4 py-2 rounded-3 fw-semibold shadow-sm">
                    <i class="bi bi-person-plus-fill me-2"></i>Add Student
                </a>
            </div>

            <!-- Controls (Search & Sort) -->
            <div class="p-4 border-bottom bg-light bg-opacity-25">
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <form method="GET" action="view.php" class="d-flex gap-2">
                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                <span class="input-group-text bg-white border-end-0 ps-3"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" name="search" class="form-control border-start-0 ps-0 py-2" placeholder="Search by name or email..." value="<?php echo htmlspecialchars($search); ?>">
                                <input type="hidden" name="sort" value="<?php echo strtolower($sort); ?>">
                                <button class="btn btn-primary px-4 fw-semibold" type="submit">Search</button>
                            </div>
                            <?php if (!empty($search)): ?>
                                <a href="view.php" class="btn btn-outline-secondary d-flex align-items-center rounded-3" title="Reset Search"><i class="bi bi-x-lg"></i></a>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end align-items-center gap-2">
                        <span class="text-muted small fw-semibold me-2">Sort Order:</span>
                        <div class="btn-group shadow-sm" role="group">
                            <a href="view.php?search=<?php echo urlencode($search); ?>&sort=asc" class="btn btn-sm btn-outline-secondary px-3 py-2 <?php echo ($sort === 'ASC') ? 'active fw-bold' : ''; ?>">
                                <i class="bi bi-sort-alpha-down me-1"></i> A-Z
                            </a>
                            <a href="view.php?search=<?php echo urlencode($search); ?>&sort=desc" class="btn btn-sm btn-outline-secondary px-3 py-2 <?php echo ($sort === 'DESC') ? 'active fw-bold' : ''; ?>">
                                <i class="bi bi-sort-alpha-up-alt me-1"></i> Z-A
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table View -->
            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th>Student</th>
                            <th>Email</th>
                            <th class="text-center">10th Marksheet</th>
                            <th class="text-center">12th Marksheet</th>
                            <th class="text-center">Signature</th>
                            <th class="text-end" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <?php 
                                    $studentId = $row['ID'] ?? $row['id'] ?? $row['student_id'] ?? reset($row); 
                                ?>
                                <tr>
                                    <td class="text-center fw-bold text-muted"><?php echo htmlspecialchars($studentId); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <?php 
                                                $ownImg = $row["photo1"] ?? $row["ownImage"] ?? '';
                                                $hasUserImg = (!empty($ownImg) && file_exists("uploads/" . $ownImg));
                                                $userImg = $hasUserImg 
                                                    ? "uploads/" . htmlspecialchars($ownImg) 
                                                    : "https://via.placeholder.com/150/3b82f6/ffffff?text=" . strtoupper(substr($row["name"] ?? 'S', 0, 1));
                                            ?>
                                            <img src="<?php echo $userImg; ?>" class="avatar-img" alt="Profile" <?php if($hasUserImg): ?>onclick="previewImage('<?php echo $userImg; ?>', '<?php echo htmlspecialchars($row["name"] ?? 'Student'); ?> - Profile')"<?php endif; ?>>
                                            <span class="fw-semibold text-dark"><?php echo htmlspecialchars($row["name"] ?? ''); ?></span>
                                        </div>
                                    </td>
                                    <td class="text-muted"><?php echo htmlspecialchars($row["email"] ?? ''); ?></td>
                                    
                                    <!-- 10th Marksheet -->
                                    <td class="text-center">
                                        <?php 
                                            $doc10 = $row["photo2"] ?? $row["marksheet"] ?? '';
                                            if (!empty($doc10) && file_exists("uploads/" . $doc10)): 
                                                $file10 = "uploads/" . htmlspecialchars($doc10);
                                        ?>
                                            <div class="doc-preview-wrapper">
                                                <img src="<?php echo $file10; ?>" class="doc-thumbnail" title="Click to expand" onclick="previewImage('<?php echo $file10; ?>', '10th Marksheet - <?php echo htmlspecialchars($row["name"] ?? ''); ?>')">
                                            </div>
                                        <?php else: ?>
                                            <span class="badge-na">N/A</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- 12th Marksheet -->
                                    <td class="text-center">
                                        <?php 
                                            $doc12 = $row["photo3"] ?? $row["marksheet2"] ?? '';
                                            if (!empty($doc12) && file_exists("uploads/" . $doc12)): 
                                                $file12 = "uploads/" . htmlspecialchars($doc12);
                                        ?>
                                            <div class="doc-preview-wrapper">
                                                <img src="<?php echo $file12; ?>" class="doc-thumbnail" title="Click to expand" onclick="previewImage('<?php echo $file12; ?>', '12th Marksheet - <?php echo htmlspecialchars($row["name"] ?? ''); ?>')">
                                            </div>
                                        <?php else: ?>
                                            <span class="badge-na">N/A</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Signature -->
                                    <td class="text-center">
                                        <?php 
                                            $docSign = $row["photo4"] ?? $row["sign"] ?? '';
                                            if (!empty($docSign) && file_exists("uploads/" . $docSign)): 
                                                $fileSign = "uploads/" . htmlspecialchars($docSign);
                                        ?>
                                            <div class="doc-preview-wrapper">
                                                <img src="<?php echo $fileSign; ?>" class="doc-thumbnail" title="Click to expand" onclick="previewImage('<?php echo $fileSign; ?>', 'Signature - <?php echo htmlspecialchars($row["name"] ?? ''); ?>')">
                                            </div>
                                        <?php else: ?>
                                            <span class="badge-na">N/A</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <a href="edit.php?id=<?php echo urlencode($studentId); ?>" class="btn btn-action btn-outline-warning me-1" title="Edit Record">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="delete.php?id=<?php echo urlencode($studentId); ?>" class="btn btn-action btn-outline-danger" onclick="return confirm('Delete this record permanently?')" title="Delete Record">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x display-5 d-block mb-2 text-secondary opacity-50"></i>
                                    <span class="fw-semibold">No student records found.</span>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Footer & Pagination -->
            <div class="p-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 border-top">
                <p class="text-muted small mb-0">
                    Showing total <strong><?php echo $totalRecords; ?></strong> registered students
                </p>
                <?php if ($totalPages > 1): ?>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&sort=<?php echo strtolower($sort); ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 overflow-hidden shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold" id="imagePreviewTitle">Document Preview</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <img id="previewModalImage" src="" class="img-fluid rounded-3 shadow-sm" style="max-height: 75vh; object-fit: contain;">
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center">
                    <a id="downloadImageBtn" href="" target="_blank" class="btn btn-sm btn-outline-primary px-3 rounded-2">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Open Original
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(src, title) {
            document.getElementById('previewModalImage').src = src;
            document.getElementById('imagePreviewTitle').textContent = title;
            document.getElementById('downloadImageBtn').href = src;
            
            const imageModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            imageModal.show();
        }
    </script>
</body>
</html>