<?php
/**
 * Bootstrap 5.3 Compatible Header for CodeIgniter 4
 * Put this file in: app/Views/templates/header.php
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) : 'CodeIgniter 4 App'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="<?= base_url('css/theme.css'); ?>">
</head>
<body>

<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid px-4">
            
            <a class="navbar-brand d-flex align-items-center me-auto me-lg-4" href="<?= base_url(); ?>">
                <img src="<?= base_url('images/logo-left.png'); ?>" alt="Left Logo" class="brand-logo me-2" onerror="this.src='https://placehold.co/40x40/0d6efd/ffffff?text=L'">
                <span class="d-none d-sm-inline brand-text">BrandLeft</span>
            </a>

            <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('about'); ?>">About</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-center text-lg-start" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('services/web-dev'); ?>">Web Development</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('services/seo'); ?>">SEO Optimization</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= base_url('services/consulting'); ?>">Cloud Consulting</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-center text-lg-start" aria-labelledby="resourcesDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('blog'); ?>">Our Blog</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('documentation'); ?>">Documentation</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('faq'); ?>">FAQs</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('contact'); ?>">Contact</a>
                    </li>
                </ul>
            </div>

            <a class="navbar-brand d-flex align-items-center ms-auto ms-lg-4" href="<?= base_url(); ?>">
                <span class="d-none d-sm-inline brand-text me-2">BrandRight</span>
                <img src="<?= base_url('images/logo-right.png'); ?>" alt="Right Logo" class="brand-logo" onerror="this.src='https://placehold.co/40x40/dc3545/ffffff?text=R'">
            </a>

        </div>
    </nav>
</header>

<main class="main-content container my-5">