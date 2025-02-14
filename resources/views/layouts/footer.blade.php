<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Cards</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            text-align: center;
            padding: 20px;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card.students {
            background-color: #007bff;
        }

        .card.universities {
            background-color: #28a745;
        }

        .card.courses {
            background-color: #17a2b8;
        }

        footer {
            background: linear-gradient(135deg, #0099FF, #66CCFF);
            padding: 40px;
            text-align: center;
            color: white;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            color: #0000CD;
        }

        .footer-section {
            margin: 20px;
            max-width: 300px;
        }

        .footer-section h3 {
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .footer-section a {
            display: block;
            color: #0000CD;
            text-decoration: none;
            margin: 5px 0;
        }

        .footer-section a:hover {
            color: #f8f9fa;
            text-decoration: underline;
        }

        .footer-bottom .social-icon {
            color: white;
        }

        .footer-bottom {
            color: white;
            background-color: darkblue;
            padding: 15px;
            font-size: 14px;
            font-weight: bold;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .footer-bottom i {
            margin: 0 5px;
            color: white;
            font-size: 18px;
        }

        .footer-bottom i:hover {
            color: #f8f9fa;
        }
    </style>
</head>
<body>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>ABOUT US</h3>
            <p>At Cosmic Development, we specialize in building dedicated teams and providing tailored IT and BPO services. Our approach enhances operations, driving efficiency and success for your business.</p>
        </div>
        <div class="footer-section">
            <h3>QUICK LINKS</h3>
            <a href="#">Home</a>
            <a href="#">Profile</a>
            <a href="#">Contact</a>
        </div>
        <div class="footer-section">
            <h3>FOLLOW US</h3>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Cosmic Development. All rights reserved.
        <a class="social-icon" href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a class="social-icon" href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a class="social-icon" href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html> 