<?php
session_start();

$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "lifehospital";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $doctor = $_POST['doctor'];
    $doctor_name = $_POST['doctor_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $patients_email = $_POST['patients_email'];

    $sql = "INSERT INTO records (patient_name, doctor, doctor_name, description, date, patients_email)
            VALUES ('$patient_name', '$doctor', '$doctor_name', '$description', '$date', '$patients_email')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Record - Life Hospital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-image: url('assets/images/b5.jpg');
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        header {
            background: linear-gradient(135deg, #d1e9ff, #b3d4fc);
            padding: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header-top {
            display: flex;
            justify-content: center;
            padding: 5px 0;
            background-color: #eff7ff;
            font-size: 0.9em;
            color: #555;
        }
        .header-top ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        .header-top li {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .header-nav {
            display: flex;
            align-items: center;
            padding: 10px 0;
        }
        .header-nav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            padding: 0 15px;
        }
        .nav-img img {
            width: 80px;
            height: auto;
        }
        #menu ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        #menu ul li a {
            text-decoration: none;
            color: #0056b3;
            font-weight: bold;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
        }
        #menu ul li a:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
        .form-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            font-size: 1.1em;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: #17a2b8;
            outline: none;
        }
        .form-group textarea {
            height: 150px;
            resize: vertical;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #17a2b8;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>

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
                    <li><a href="docpage.php">Home</a></li>
                    <li><a href="appoint.php"></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="form-container">
    <h2 class="form-title">Patient's Record</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="patient_name">Patient's Name:</label>
            <input type="text" id="patient_name" name="patient_name" required>
        </div>
        <div class="form-group">
            <label for="doctor">Doctor:</label>
            <select name="doctor" id="doctor" required>
                 <option value="Dermatologist">Dermatologist</option>
                 <option value="Neurologist">Neurologist</option>
                <option value="Obstetrician-gynecologist">Obstetrician-gynecologist</option>
                <option value="Cardiologist">Cardiologist</option>
                <option value="Gastroenterologist">Gastroenterologist</option>
                <option value="Oncologist">Oncologist</option>
                <option value="Psychiatrist">Psychiatrist</option>
                <option value="Pediatrician">Pediatrician</option>
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_name">Doctor's Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" required>
        </div>
        <div class="form-group">
            <label for="patients_email">Patient's Email:</label>
            <input type="email" id="patients_email" name="patients_email" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
