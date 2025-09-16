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
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM patients WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        
        header("Location: team.php");
        exit(); 
    } else {
        
        $error_message = "Invalid email or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Life Hospital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
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

        /* Header Styles */
        header {
            background-color: #333;
            color: white;
        }

        .header-top {
            background-color: #444;
            padding: 10px 0;
        }

        .header-top ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
        }

        .header-top ul li {
            margin: 0 15px;
        }

        .header-nav {
            padding: 15px 0;
            background-color: #222;
        }

        .header-nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-nav #menu ul {
            list-style-type: none;
            display: flex;
        }

        .header-nav #menu ul li {
            margin-right: 20px;
        }

        .header-nav #menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
        }

        .header-nav #menu ul li a:hover {
            color: #17a2b8;
        }

        .nav-img img {
            height: 50px;
        }

        .sign-in-form {
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

        .register-btn {
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

        .register-btn:hover {
            background-color: #218838;
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
                        <li><a href="register.php">Register</a></li>
                        <li><a href="emlogin.php">Employee LOG IN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    
    <section class="sign-in-form">
        <div class="container">
            <h2 class="form-title">Login</h2>

            <?php if (!empty($error_message)) { ?>
                <div style="color: red; text-align: center; margin-bottom: 20px;"><?php echo $error_message; ?></div>
            <?php } ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit">Login</button>

                <
                <a href="Register.php" class="register-btn">Don't have an account? Register</a>
            </form>
        </div>
    </section>

</body>
</html>
