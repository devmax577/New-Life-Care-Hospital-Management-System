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
    $name = $_POST['name'];
    $passcode = $_POST['passcode'];
    $em_type = $_POST['em_type'];

    
    $stmt = $conn->prepare("INSERT INTO employee (name, passcode, em_type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $passcode, $em_type);

    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Registration - Life Hospital</title>
    <style>
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; background-image: url('assets/images/b3.jpg'); }
        .header-top { background-color: #ff4d4d; color: black; padding: 10px 0; }
        .header-top ul { list-style: none; display: flex; justify-content: flex-end; align-items: center; }
        .header-top ul li { margin-right: 20px; font-weight: bold; }
        .header-nav { background-color: #ffffff; border-bottom: 3px solid #ff4d4d; }
        .header-nav .container { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; }
        .header-nav #menu ul { list-style: none; display: flex; }
        .header-nav #menu ul li { margin-right: 20px; }
        .header-nav #menu ul li a { color: black; text-decoration: none; font-weight: bold; }
        .header-nav #menu ul li a:hover { color: #ff4d4d; }
        .admin-portal { max-width: 600px; margin: 40px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .admin-portal h2 { color: #333; text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { font-weight: bold; display: block; margin-bottom: 5px; }
        .form-group input, .form-group select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button[type="submit"] { width: 100%; padding: 10px; background-color: #ff4d4d; color: white; border: none; border-radius: 5px; font-size: 1.2em; cursor: pointer; }
        button[type="submit"]:hover { background-color: #e60000; }
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
                    <li><a href="ahome.php">Home</a></li>
                    <li><a href="appoint.php"></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="admin-portal">
    <h2>Admin Portal Registration</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="passcode">Passcode:</label>
            <input type="password" id="passcode" name="passcode" required placeholder="Enter a passcode">
        </div>
        <div class="form-group">
            <label for="em_type">Employee Type:</label>
            <select id="em_type" name="em_type" required>
                <option value="">Select employee type</option>
                <option value="admin">Admin</option>
                <option value="doctor">Doctor</option>
                <option value="pharmacy">Pharmacy</option>
                <option value="nurses">Nurses</option>
            </select>
        </div>
        <button type="submit">Register</button>
    </form>
</section>

</body>
</html>
