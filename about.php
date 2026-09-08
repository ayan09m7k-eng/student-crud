<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | St. Lawrence College</title>
    <!-- Google Fonts & Bootstrap 5.3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --brand-navy: #0f2744;
            --brand-blue: #0284c7;
            --brand-gold: #f59e0b;
            --bg-light: #f8fafc;
            --card-border: #e2e8f0;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--brand-navy);
        }

        /* Navigation Bar */
        .main-navbar {
            background: #ffffff;
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.08);
            padding: 14px 0;
        }

        .brand-badge {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--brand-navy), var(--brand-blue));
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .brand-title {
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--brand-navy);
            letter-spacing: -0.5px;
            line-height: 1.1;
        }

        .brand-sub {
            font-size: 0.72rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .nav-link-custom {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text-muted);
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: var(--brand-blue);
            background-color: #f0f9ff;
        }

        .about-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 10px 30px -10px rgba(15, 39, 68, 0.08);
        }

        .site-footer {
            background: var(--brand-navy);
            color: #94a3b8;
            padding: 40px 0 20px;
            font-size: 0.88rem;
            margin-top: auto;
        }

        .site-footer a {
            color: #cbd5e1;
            text-decoration: none;
        }

        .site-footer a:hover {
            color: #38bdf8;
        }
    </style>
</head>
<body>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg main-navbar sticky-top">
        <div class="container" style="max-width: 1240px;">
            <a class="navbar-brand d-flex align-items-center gap-3 text-decoration-none" href="index.php">
                <div class="brand-badge">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div>
                    <div class="brand-title">ST. LAWRENCE</div>
                    <div class="brand-sub">College & Academy</div>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#aboutNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="aboutNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="index.php"><i class="bi bi-house-door me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="form.php"><i class="bi bi-pencil-square me-1"></i> Admission Form</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="view.php"><i class="bi bi-people me-1"></i> Student Directory</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="about.php"><i class="bi bi-info-circle me-1"></i> About Us</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <a href="form.php" class="btn btn-primary px-4 py-2 rounded-3 fw-bold" style="background-color: var(--brand-blue); border: none;">
                        <i class="bi bi-file-earmark-person me-1"></i> Add Student
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-5" style="max-width: 900px;">
        <div class="about-card text-center">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-3" style="font-size: 0.82rem;">
                <i class="bi bi-shield-check me-1"></i> Cyber Security
            </span>

            <h1 class="display-6 fw-extrabold text-dark mb-4">
                WE Make Normal Hacker to White Hat Hackers
            </h1>

            <hr class="my-4 mx-auto" style="max-width: 140px; border-top: 3px solid var(--brand-blue); opacity: 0.8;">

            <h2 class="h4 text-muted fw-semibold mb-4 leading-relaxed">
                WE Have Created More Than 600+ White Hat Hacker within a year
            </h2>

            <div class="mt-5 d-flex justify-content-center gap-3">
                <a href="form.php" class="btn btn-primary px-4 py-2 rounded-3 fw-bold" style="background-color: var(--brand-blue); border: none;">
                    <i class="bi bi-pencil-square me-1"></i> Add Student
                </a>
                <!-- <a href="view.php" class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-semibold">
                    <i class="bi bi-people me-1"></i> View Student Roster
                </a> -->
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer text-center">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> St. Lawrence College & Academy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>