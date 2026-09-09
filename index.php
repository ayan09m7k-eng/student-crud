<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. Lawrence College & Academy | Excellence in Education</title>
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
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--brand-navy);
        }

        /* Top Bar */
        .top-info-bar {
            background: var(--brand-navy);
            color: #cbd5e1;
            font-size: 0.84rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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

        /* Hero Carousel */
        .hero-carousel {
            position: relative;
            box-shadow: 0 15px 35px -10px rgba(15, 39, 68, 0.15);
        }

        .carousel-slide-bg {
            height: 580px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero-gradient-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 39, 68, 0.45) 0%, rgba(15, 39, 68, 0.9) 100%);
            display: flex;
            align-items: center;
        }

        .badge-notice {
            background: var(--brand-gold);
            color: #000000;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 6px 16px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Campus Quick Stats */
        .stat-card-custom {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.04);
            transition: transform 0.25s ease;
        }

        .stat-card-custom:hover {
            transform: translateY(-4px);
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--brand-navy);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 0.88rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Campus Gallery Cards */
        .gallery-card {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            height: 280px;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--card-border);
        }

        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.45s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.07);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 39, 68, 0.85) 0%, transparent 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            color: #ffffff;
        }

        /* Feature Pillars */
        .pillar-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 30px 24px;
            transition: all 0.25s ease;
            height: 100%;
        }

        .pillar-card:hover {
            transform: translateY(-4px);
            border-color: #bae6fd;
            box-shadow: 0 15px 30px -10px rgba(2, 132, 199, 0.12);
        }

        .pillar-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: #e0f2fe;
            color: var(--brand-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 18px;
        }

        /* CTA Banner */
        .admission-cta-banner {
            background: linear-gradient(135deg, var(--brand-navy) 0%, #0369a1 100%);
            border-radius: 20px;
            padding: 50px 40px;
            color: #ffffff;
            box-shadow: 0 15px 35px -10px rgba(3, 105, 161, 0.35);
        }

        /* Footer */
        .site-footer {
            background: var(--brand-navy);
            color: #94a3b8;
            padding: 50px 0 25px;
            font-size: 0.9rem;
            margin-top: 70px;
        }

        .site-footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .site-footer a:hover {
            color: #38bdf8;
        }
    </style>
</head>
<body>

    <!-- Top Contact Bar -->
    <div class="top-info-bar">
        <div class="container d-flex flex-wrap justify-content-between align-items-center" style="max-width: 1240px;">
            <div>
                <i class="bi bi-bell-fill text-warning me-2"></i>
                Admissions are now open for the Academic Year 2026-2027!
            </div>
            <div class="d-none d-md-flex align-items-center gap-4">
                <span><i class="bi bi-telephone-fill me-1 text-warning"></i> +1 (800) 245-8890</span>
                <span><i class="bi bi-envelope-fill me-1 text-warning"></i> info@lawrencecollege.edu</span>
            </div>
        </div>
    </div>

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

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="index.php"><i class="bi bi-house-door me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="form.php"><i class="bi bi-pencil-square me-1"></i> Admission Form</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="view.php"><i class="bi bi-people me-1"></i> Student Directory</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="about.php"><i class="bi bi-info-circle me-1"></i> About Us</a>
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

    <!-- Hero Image Carousel -->
    <section class="hero-carousel">
        <div id="collegeHeroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4500">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#collegeHeroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#collegeHeroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#collegeHeroCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                
                <!-- Slide 1: University Main Hall -->
                <div class="carousel-item active">
                    <div class="carousel-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=80');">
                        <div class="hero-gradient-overlay">
                            <div class="container text-white" style="max-width: 1240px;">
                                <div class="badge-notice mb-3">
                                    <i class="bi bi-award-fill"></i> Premier Academic Institution
                                </div>
                                <h1 class="display-4 fw-extrabold text-white mb-3" style="max-width: 780px;">
                                    Inspiring Minds, Building Futures & Shaping Global Leaders
                                </h1>
                                <p class="lead text-light opacity-90 mb-4" style="max-width: 640px; font-size: 1.15rem;">
                                    Offering internationally accredited programs, world-class faculty, and innovative research laboratories spanning 100+ green acres.
                                </p>
                                <div class="d-flex flex-wrap gap-3">
                                    <a href="form.php" class="btn btn-warning px-4 py-3 fw-bold rounded-3 shadow">
                                        <i class="bi bi-pencil-fill me-2"></i> Fill Admission Form 
                                    </a>
                                    <!-- <a href="view.php" class="btn btn-outline-light px-4 py-3 fw-semibold rounded-3">
                                        <i class="bi bi-people-fill me-2"></i> Student Directory (view.php)
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Modern University Library -->
                <div class="carousel-item">
                    <div class="carousel-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=1600&q=80');">
                        <div class="hero-gradient-overlay">
                            <div class="container text-white" style="max-width: 1240px;">
                                <div class="badge-notice mb-3" style="background-color: #38bdf8; color: #0f172a;">
                                    <i class="bi bi-book-half"></i> Comprehensive Learning Resources
                                </div>
                                <h1 class="display-4 fw-extrabold text-white mb-3" style="max-width: 780px;">
                                    State-of-the-Art Libraries & 24/7 Digital Research Commons
                                </h1>
                                <p class="lead text-light opacity-90 mb-4" style="max-width: 640px; font-size: 1.15rem;">
                                    Discover over 200,000 academic titles, online peer journals, and collaborative group study pods equipped with fiber connectivity.
                                </p>
                                <div class="d-flex flex-wrap gap-3">
                                    <a href="form.php" class="btn btn-warning px-4 py-3 fw-bold rounded-3 shadow">
                                        <i class="bi bi-person-plus-fill me-2"></i> Apply for Admission
                                    </a>
                                    <a href="about.php" class="btn btn-outline-light px-4 py-3 fw-semibold rounded-3">
                                        <i class="bi bi-info-circle me-2"></i> Learn About Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Collaborative Campus Life -->
                <div class="carousel-item">
                    <div class="carousel-slide-bg" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1600&q=80');">
                        <div class="hero-gradient-overlay">
                            <div class="container text-white" style="max-width: 1240px;">
                                <div class="badge-notice mb-3" style="background-color: #34d399; color: #064e3b;">
                                    <i class="bi bi-stars"></i> Thriving Student Life
                                </div>
                                <h1 class="display-4 fw-extrabold text-white mb-3" style="max-width: 780px;">
                                    An Inclusive Community Where Every Passion Flourishes
                                </h1>
                                <p class="lead text-light opacity-90 mb-4" style="max-width: 640px; font-size: 1.15rem;">
                                    Participate in varsity athletic teams, robotics clubs, creative arts ensembles, and international exchange programs.
                                </p>
                                <div class="d-flex flex-wrap gap-3">
                                    <a href="form.php" class="btn btn-warning px-4 py-3 fw-bold rounded-3 shadow">
                                        <i class="bi bi-check2-circle me-2"></i> Register Online
                                    </a>
                                    <!-- <a href="view.php" class="btn btn-outline-light px-4 py-3 fw-semibold rounded-3">
                                        <i class="bi bi-search me-2"></i> View Records
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#collegeHeroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#collegeHeroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Key Highlights / Stat Chips -->
    <section class="container my-5" style="max-width: 1240px;">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="stat-card-custom">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Academic Disciplines</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-custom">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Graduate Placement Rate</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-custom">
                    <div class="stat-number">120+</div>
                    <div class="stat-label">Distinguished Professors</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-custom">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Acre Modern Campus</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Campus Image Gallery Section -->
    <section class="container py-4" style="max-width: 1240px;">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.8px;">
                Campus Infrastructure
            </span>
            <h2 class="display-6 fw-extrabold mt-2">Life Across Our Campus</h2>
            <p class="text-muted mx-auto" style="max-width: 620px;">
                Explore modern laboratories, historic academic halls, sports centers, and vibrant student spaces.
            </p>
        </div>

        <div class="row g-4">
            
            <!-- Gallery Item 1: Main Historic Quad -->
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=800&q=80" alt="Main College Quad">
                    <div class="gallery-overlay">
                        <span class="badge bg-primary w-auto align-self-start mb-2">Central Quad</span>
                        <h5 class="fw-bold mb-1">Founder's Hall</h5>
                        <p class="small text-white-50 mb-0">Historic architecture housing administrative and lecture halls.</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 2: Modern Science Lab -->
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80" alt="Science Laboratory">
                    <div class="gallery-overlay">
                        <span class="badge bg-success w-auto align-self-start mb-2">STEM Research</span>
                        <h5 class="fw-bold mb-1">Advanced Bio & Chemistry Lab</h5>
                        <p class="small text-white-50 mb-0">Equipped for advanced experiments and student research projects.</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 3: Lecture Amphitheater -->
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80" alt="Auditorium">
                    <div class="gallery-overlay">
                        <span class="badge bg-info w-auto align-self-start mb-2">Auditorium</span>
                        <h5 class="fw-bold mb-1">Main Amphitheater</h5>
                        <p class="small text-white-50 mb-0">Host to guest symposiums, academic debates, and ceremonies.</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 4: Grand Reading Hall -->
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=800&q=80" alt="Library Hall">
                    <div class="gallery-overlay">
                        <span class="badge bg-warning text-dark w-auto align-self-start mb-2">Archives</span>
                        <h5 class="fw-bold mb-1">Central University Library</h5>
                        <p class="small text-white-50 mb-0">Quiet study zones and reference collections open to all students.</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 5: Sports & Athletics -->
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=800&q=80" alt="Athletic Complex">
                    <div class="gallery-overlay">
                        <span class="badge bg-danger w-auto align-self-start mb-2">Recreation</span>
                        <h5 class="fw-bold mb-1">Sports & Athletic Complex</h5>
                        <p class="small text-white-50 mb-0">Full-court basketball, indoor track, and fitness centers.</p>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 6: Graduation & Commencement -->
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=800&q=80" alt="Graduation">
                    <div class="gallery-overlay">
                        <span class="badge bg-secondary w-auto align-self-start mb-2">Achievement</span>
                        <h5 class="fw-bold mb-1">Convocation & Career</h5>
                        <p class="small text-white-50 mb-0">Over 15,000 alumni thriving across global organizations.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Academic Pillars -->
    <section class="container py-5" style="max-width: 1240px;">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-extrabold">Why Choose St. Lawrence College?</h2>
            <p class="text-muted">A dedicated commitment to scholarship, community, and personal growth</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="pillar-card">
                    <div class="pillar-icon-box">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <h4>World-Renowned Faculty</h4>
                    <p class="text-muted small">Learn directly from passionate professors, researchers, and industry pioneers dedicated to student success.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="pillar-card">
                    <div class="pillar-icon-box" style="background-color: #ecfdf5; color: #10b981;">
                        <i class="bi bi-folder-check"></i>
                    </div>
                    <h4>Direct Document Verification</h4>
                    <p class="text-muted small">Seamless digital onboarding with instant marksheet and signature document management.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="pillar-card">
                    <div class="pillar-icon-box" style="background-color: #fef3c7; color: #d97706;">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                    <h4>Global Career Pathways</h4>
                    <p class="text-muted small">Our dedicated career cell connects students with internships, co-ops, and direct campus recruiting opportunities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Admission CTA Banner -->
    <section class="container my-5" style="max-width: 1240px;">
        <div class="admission-cta-banner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-extrabold text-white mb-2">Begin Your Journey Today</h2>
                    <p class="lead text-white-50 mb-0" style="font-size: 1.05rem;">
                        Ready to apply? Submit your application form, academic marksheets, and personal documents online.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="form.php" class="btn btn-warning px-4 py-3 fw-bold rounded-3 shadow">
                        <i class="bi bi-pencil-square me-1"></i> Fil Student Form
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container" style="max-width: 1240px;">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="brand-badge" style="width: 36px; height: 36px; font-size: 1.1rem;">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <span class="text-white fw-bold fs-5">ST. LAWRENCE COLLEGE</span>
                    </div>
                    <p class="small text-secondary">
                        Dedicated to academic excellence, leadership development, and fostering an inclusive student community.
                    </p>
                </div>

                <div class="col-6 col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Quick Navigation</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="index.php"><i class="bi bi-chevron-right me-1"></i> Home</a></li>
                        <li class="mb-2"><a href="form.php"><i class="bi bi-chevron-right me-1"></i> Admission Form</a></li>
                        <li class="mb-2"><a href="view.php"><i class="bi bi-chevron-right me-1"></i> Student Directory</a></li>
                        <li class="mb-2"><a href="about.php"><i class="bi bi-chevron-right me-1"></i> About Us</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="text-white fw-bold mb-3">Student Portal</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="form.php">New Registration</a></li>
                        <li class="mb-2"><a href="view.php">Record Search</a></li>
                        <li class="mb-2"><a href="view.php">Document Viewer</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Campus Contact</h6>
                    <p class="small text-secondary mb-1"><i class="bi bi-geo-alt-fill me-2 text-warning"></i> 500 University Avenue, Academic Park</p>
                    <p class="small text-secondary mb-1"><i class="bi bi-telephone-fill me-2 text-warning"></i> +1 (800) 245-8890</p>
                    <p class="small text-secondary"><i class="bi bi-envelope-fill me-2 text-warning"></i> admissions@lawrencecollege.edu</p>
                </div>
            </div>

            <div class="pt-3 border-top border-secondary border-opacity-25 text-center small text-secondary">
                &copy; <?php echo date("Y"); ?> St. Lawrence College & Academy. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>