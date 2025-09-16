<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Life Hospital</title>
    <style>
                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/images/b3.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }

        header {
            background-color: #ff3333;
            color: black;
            padding: 10px 0;
            border-bottom: 2px solid #ff6666;
        }

        .header-top {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            font-size: 0.9em;
        }

        .header-top ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .header-top ul li {
            color: #ffffff;
        }

        .header-nav {
            background-color: #ffffff;
            padding: 15px 0;
            border-bottom: 2px solid #ff3333;
        }

        .header-nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-nav .nav-img img {
            width: 60px;
            height: auto;
        }

        .header-nav #menu ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .header-nav #menu ul li {
            display: inline;
        }

        .header-nav #menu ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 1em;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
        }

        .header-nav #menu ul li a:hover {
            background-color: #ffcccc;
            border-radius: 5px;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center;
        }

        .welcome-message {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome-message h1 {
            font-size: 2.5em;
            color: #333;
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
                    <li><a href="ahome.php">Home</a></li>
                    <li><a href="portl.php">Employee Register</a></li>
                    <li><a href="emanage.php">Manage Employee</a></li>
                    
                    <li><a href="index.php">Main Menu</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="content">
    <div class="welcome-message">
        <h1>Welcome, Admin!</h1>
    </div>
</div>

</body>
</html>
