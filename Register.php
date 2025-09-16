<?php

$host = 'localhost';
$dbname = 'lifehospital';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if (empty($full_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO patients (full_name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $phone, $password);

        
        if ($stmt->execute()) {
            $success_message = "Registration successful!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        
        $stmt->close();
    }
    
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Life Hospital</title>
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/images/b1.jpg'); 
            background-size: cover; 
            background-position: center center; 
            background-attachment: fixed; 
        }

        .header-top {
            background-color: rgba(248, 249, 250, 0.8); 
            padding: 15px 0;
        }

        .header-top .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .header-top ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        .header-top ul li {
            color: #000;
            font-size: 0.9em;
        }

        .header-nav {
            background-color: #17a2b8;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-nav .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
        }

        .nav-img img {
            width: 150px;
        }

        #menu ul {
            list-style-type: none;
            display: flex;
            gap: 25px;
        }

        #menu ul li a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
        }

        #menu ul li a:hover {
            color: #ddd;
        }

        
        .registration-form {
            padding: 40px 0;
            background-color: rgba(240, 248, 255, 0.9); 
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .form-title {
            color: #333;
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 1.1em;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .form-group input:focus {
            border-color: #17a2b8;
            outline: none;
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

        .sign-in-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .sign-in-btn:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .header-top .container {
                flex-direction: column;
                text-align: center;
            }

            #menu ul {
                flex-direction: column;
                gap: 10px;
            }

            .form-title {
                font-size: 1.5em;
            }

            form {
                padding: 15px;
            }

            .form-group input {
                font-size: 0.9em;
            }

            button[type="submit"] {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-top">
            <div class="container">
                <ul>
                    <li>Welcome to Life Hospital</li>
                </ul>
                <ul>
                    <li><i class="fas fa-envelope-square"></i> Lifehospital@sl.com</li>
                    <li><i class="fas fa-phone-square"></i> +94 763998720</li>
                </ul>
            </div>
        </div>
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="nav-img">
                    <img src="assets/images/logo2.bmp" alt="Life Hospital Logo">
                </div>
                <div id="menu">
                    <ul>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="gallery.php">Gallery</a></li>
                       <li><a href="about.php">About Us</a></li>
                       <li><a href="team.php">Contact Us</a></li>
                       <li><a href="contacts.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="registration-form">
        <div class="container">
            <h2 class="form-title">Patient Registration</h2>

            <?php if (isset($success_message)) { ?>
                <div style="color: green; text-align: center; margin-bottom: 20px;"><?php echo $success_message; ?></div>
            <?php } elseif (isset($error_message)) { ?>
                <div style="color: red; text-align: center; margin-bottom: 20px;"><?php echo $error_message; ?></div>
            <?php } ?>

            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required placeholder="Enter your phone number">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter a password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                </div>
                <button type="submit">Register</button>
            </form>
            <a href="signin.php" class="sign-in-btn">Already have an account? Login</a>
        </div>
    </section>

</body>
</html>
