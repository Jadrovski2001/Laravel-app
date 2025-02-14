
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .dashboard {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap; /* Ensures responsiveness */
        }
        .card {
            width: 300px;
            border: none;
            border-radius: 8px;
            color: #fff;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .students {
            background-color: #007bff; /* Blue for Students */
        }
        .universities {
            background-color: #28a745; /* Green for Universities */
        }
        .courses {
            background-color: #17a2b8; /* Teal for Courses */
        }
        .card h4 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 1rem;
            margin-bottom: 5px;
        }
        .card h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
@include('layouts.header') <!-- Include the header -->

    <div class="container text-center">
        <h1 class="my-4">Dashboard</h1>
        <div class="dashboard">
            <div class="card students">
                <h4>Students</h4>
                <p>Total Students</p>
                <h2>150</h2>
            </div>
            <div class="card universities">
                <h4>Universities</h4>
                <p>Total Universities</p>
                <h2>10</h2>
            </div>
            <div class="card courses">
                <h4>Courses</h4>
                <p>Total Courses</p>
                <h2>25</h2>
            </div>
        </div>
    </div>
    @include('layouts.footer') <!-- Include the footer -->

</body>
</html>

