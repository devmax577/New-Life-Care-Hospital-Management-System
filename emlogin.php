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

    $sql = "SELECT * FROM employee WHERE name = '$name' AND passcode = '$passcode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['em_type'] == 'admin') {
            header("Location: ahome.php");
            exit();
        } elseif ($row['em_type'] == 'doctor') {
            header("Location: docpage.php");
            exit();
        } elseif ($row['em_type'] == 'pharmacy') {
            header("Location: cart/admin.php");
            exit();
        }
    } else {
        $error_message = "Invalid name or passcode.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login - Life Hospital</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: url('assets/images/b5.jpg') no-repeat center center fixed; background-size: cover; }
        .header-top ul { display: flex; justify-content: space-between; list-style: none; padding: 10px; background-color: #e0e0e0; }
        .header-top ul li { color: black; font-weight: bold; }
        .header-nav { background-color: red; padding: 15px 0; }
        .header-nav .container { display: flex; align-items: center; justify-content: space-between; }
        .header-nav .nav-img img { height: 50px; }
        #menu ul { display: flex; list-style: none; }
        #menu ul li { margin-left: 20px; }
        #menu ul li a { color: black; text-decoration: none; font-weight: bold; padding: 5px 10px; }
        #menu ul li a:hover { color: white; }
        .login-container { display: flex; justify-content: center; align-items: center; height: 80vh; }
        .login-form { width: 400px; background: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); }
        .login-form h2 { text-align: center; color: black; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { font-weight: bold; color: black; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button[type="submit"] { width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px; font-size: 1.1em; }
        button[type="submit"]:hover { background-color: black; }
        .error { color: red; text-align: center; margin-bottom: 20px; }
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
                    <li><a href="signin.php">Home</a></li>
                    <li><a href="appoint.php"></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="login-container">
    <div class="login-form">
        <h2>Employee Login</h2>
        <?php if (!empty($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="passcode">Passcode</label>
                <input type="password" id="passcode" name="passcode" required placeholder="Enter your passcode">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>
