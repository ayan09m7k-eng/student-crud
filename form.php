<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form | St. Lawrence College</title>
    <!-- Google Fonts & Bootstrap 5.3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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

        /* Form Card */
        .form-container-card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            box-shadow: 0 10px 30px -10px rgba(15, 39, 68, 0.06);
            width: 100%;
            max-width: 760px;
            margin: 40px auto;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 7px;
            font-weight: 600;
            color: var(--text-main);
            font-size: 0.93rem;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            padding: 12px 14px;
            border: 1.5px solid var(--card-border);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus {
            outline: none;
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }

        /* Upload Grid */
        .upload-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .file-box {
            position: relative;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 24px 16px;
            text-align: center;
            background-color: #f8fafc;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .file-box:hover {
            border-color: var(--brand-blue);
            background-color: #f0f9ff;
            transform: translateY(-2px);
        }

        .file-box.has-file {
            border-color: #10b981;
            background-color: #ecfdf5;
        }

        .file-box svg {
            width: 38px;
            height: 38px;
            fill: var(--brand-blue);
            margin-bottom: 10px;
        }

        .file-box span {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .file-box input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            background-color: var(--brand-blue);
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.25);
        }

        .submit-btn:hover {
            background-color: #0369a1;
            transform: translateY(-1px);
        }

        .site-footer {
            background: var(--brand-navy);
            color: #94a3b8;
            padding: 30px 0 20px;
            font-size: 0.88rem;
            margin-top: auto;
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

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#formNavbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="formNavbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="index.php"><i class="bi bi-house-door me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="form.php"><i class="bi bi-pencil-square me-1"></i> Admission Form</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="view.php"><i class="bi bi-people me-1"></i> Student Directory</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="about.php"><i class="bi bi-info-circle me-1"></i> About Us</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <a href="view.php" class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-semibold">
                        <i class="bi bi-folder2-open me-1"></i> View Directory
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Form Container -->
    <main class="container">
        <div class="form-container-card">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-1">Student Registration</h2>
                <p class="text-muted small">Please complete the form below and attach required verification documents</p>
            </div>

            <form action="b_form.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter student's full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter valid student email address" required>
                </div>

                <label class="fw-semibold text-dark mb-2">Required Image Type(JPG / PNG):</label>
                <div class="upload-grid">
                    
                    <div class="file-box" id="box-ownImage">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        <span id="label-ownImage">Upload Own Image</span>
                        <input type="file" id="ownImage" name="ownImage" accept="image/jpeg,image/png,image/jpg" required onchange="handleFile(this, 'box-ownImage', 'label-ownImage', 'Own Image')">
                    </div>

                    <div class="file-box" id="box-marksheet">
                        <svg viewBox="0 0 24 24">
                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                        </svg>
                        <span id="label-marksheet">10th Marksheet Image</span>
                        <input type="file" id="marksheet" name="marksheet" accept="image/jpeg,image/png,image/jpg" required onchange="handleFile(this, 'box-marksheet', 'label-marksheet', '10th Marksheet')">
                    </div>

                    <div class="file-box" id="box-marksheet2">
                        <svg viewBox="0 0 24 24">
                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                        </svg>
                        <span id="label-marksheet2">12th Marksheet Image</span>
                        <input type="file" id="marksheet2" name="marksheet2" accept="image/jpeg,image/png,image/jpg" required onchange="handleFile(this, 'box-marksheet2', 'label-marksheet2', '12th Marksheet')">
                    </div>

                    <div class="file-box" id="box-sign">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                        <span id="label-sign">Upload Signature Image</span>
                        <input type="file" id="sign" name="sign" accept="image/jpeg,image/png,image/jpg" required onchange="handleFile(this, 'box-sign', 'label-sign', 'Signature')">
                    </div>

                </div>

                <input type="submit" name="submit" value="Submit Form" class="submit-btn">

            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer text-center">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> St. Lawrence College & Academy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function handleFile(input, boxId, labelId, defaultText) {
            const box = document.getElementById(boxId);
            const label = document.getElementById(labelId);
            if (input.files && input.files[0]) {
                box.classList.add('has-file');
                label.textContent = input.files[0].name;
            } else {
                box.classList.remove('has-file');
                label.textContent = defaultText;
            }
        }
    </script>
</body>
</html>