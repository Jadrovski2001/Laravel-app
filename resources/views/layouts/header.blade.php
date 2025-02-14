<?php
// header.php

define('BASE_URL', '/php/'); // Replace with your actual app root path

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$logoAnimationClass = "animate-logo"; // Always apply the animation class
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            background: linear-gradient(135deg, #0099FF, #66CCFF) !important;
        }

        .navbar a.navbar-brand,
        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar a.navbar-brand:hover,
        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }

        .btn-outline-danger:hover {
            background-color: #f44336;
            color: white;
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: 500;
        }

        .navbar-nav .navbar-text {
            font-size: 16px;
            color: #f8f9fa;
        }

        /* Enhanced Animation for Logo */
        @keyframes logoFocus {
            0% {
                transform: scale(0.5) rotate(0deg);
                opacity: 0;
                box-shadow: 0 0 0px rgba(0, 0, 0, 0);
            }
            50% {
                transform: scale(1.2) rotate(180deg);
                opacity: 1;
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            }
            100% {
                transform: scale(1) rotate(360deg);
                opacity: 1;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            }
        }

        .animate-logo {
            animation: logoFocus 2s ease-in-out;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>welcome.php">
    <img 
    class="logo <?php echo $logoAnimationClass; ?>" 
    src="<?php echo asset('images/logo.png'); ?>" 
    alt="Logo" 
    width="70" 
    height="70">

    </a>
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>welcome.php">
        Students APP
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/dashboard')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/students')}}">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/universities')}}">Universities</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">API</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                <li class="nav-item">
                    <span class="navbar-text me-3">
                        Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="<?php echo BASE_URL; ?>logout.php">Sign Out</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="<?php echo BASE_URL; ?>login.php">Sign In</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</body>
</html>
