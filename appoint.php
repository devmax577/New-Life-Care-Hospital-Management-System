<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lifehospital";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    $sql = "INSERT INTO appointments (name, email, doctor, appointment_date, appointment_time, message, created_at) 
            VALUES ('$name', '$email', '$doctor', '$date', '$time', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Appointment booked successfully!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        body {
            background-image: url('assets/images/b2.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
            position: relative;
            z-index: 0;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1; /* stays behind content */
        }
        .appointment-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        .appointment-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        header {
            background-color: #a8e6cf;
        }
        .header-top {
            padding: 10px 0;
            text-align: center;
        }
        .header-top ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 40px;
        }
        .header-top ul li {
            font-size: 1rem;
            color: #333;
        }
        .header-nav {
            background-color: #17a2b8;
            padding: 15px 0;
        }
        .header-nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        .nav-img img {
            width: 120px;
        }
        #menu ul {
            list-style-type: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
        }
        #menu ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }
        #menu ul li a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    
    <!-- Header -->
    <header>
        <div class="header-top">
            <ul>
                <li>Welcome to Life Hospital</li>
                <li><i class="fas fa-envelope-square"></i> Lifehospital@sl.com</li>
                <li><i class="fas fa-phone-square"></i> +94 763998720</li>
            </ul>
        </div>
        
        <nav class="header-nav">
            <div class="container">
                <div class="nav-img">
                    <img src="assets/images/logo2.bmp" alt="Life Hospital Logo">
                </div>
                <div id="menu">
                    <ul>
                        <li><a href="team.php">Home</a></li>
                        <li><a href="serch.php">View Appointments</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="appointment-form">
        <h2>Book an Appointment</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="doctor">Select Doctor:</label>
                <select id="doctor" name="doctor" class="form-control" required>
                    <option value="" disabled selected>Select a doctor</option>
                    <option value="Neurologist">Neurologist</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Obstetrician-gynecologist">Obstetrician-gynecologist</option>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Gastroenterologist">Gastroenterologist</option>
                    <option value="Oncologist">Oncologist</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Pediatrician">Pediatrician</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Appointment Date:</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time">Appointment Time:</label>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Book Appointment</button>
        </form>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

