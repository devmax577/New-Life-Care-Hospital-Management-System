<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lifehospital";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Appointment Search</title>
    <style>
        
        body {
            
            
            
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }
adability */
        .overlay {
            background-color: rgba(255, 255, 255, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
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

        @media (max-width: 768px) {
            .header-top ul {
                flex-direction: column;
            }

            .header-nav .container {
                flex-direction: column;
                align-items: center;
            }

            #menu ul {
                flex-direction: column;
                align-items: center;
            }

            #menu ul li {
                margin-bottom: 10px;
            }
        }
        
        .container {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>
    
    <div class="overlay"></div>

    
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
                        <li><a href="appoint.php">Make appointments</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>Your Appointments</h2>

      
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Enter your Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <?php
        if (isset($_POST['search'])) {
            $email = $_POST['email'];

            $sql = "SELECT * FROM appointments WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                echo "<table>";
                echo "<tr><th>Name</th><th>Email</th><th>Doctor</th><th>Appointment Date</th><th>Appointment Time</th><th>Message</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['doctor']}</td>
                            <td>{$row['appointment_date']}</td>
                            <td>{$row['appointment_time']}</td>
                            <td>{$row['message']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No appointments found for this email address.</p>";
            }
        }
        ?>

    </div>
</body>
</html>

<?php
$conn->close();
?>
