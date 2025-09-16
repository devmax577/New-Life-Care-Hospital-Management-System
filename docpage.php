<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - Life Hospital</title>
    <style>
       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
             background-image: url('assets/images/b4.jpg');
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

       
        header {
            width: 100%;
            background-color: #24292e; 
            color: #fefefe;
        }

        .header-top {
            background-color: #3b4147; 
            padding: 10px;
            text-align: center;
        }

        .header-top ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
            font-size: 1em;
        }

        .header-top li {
            color: #ddd;
            display: flex;
            align-items: center;
        }

        .header-top i {
            margin-right: 8px;
            color: #ffab00; 
        }

        .header-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 40px;
        }

        .nav-img img {
            height: 50px;
        }

        #menu ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        #menu a {
            color: #ffab00; 
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        #menu a:hover {
            color: #ffffff;
        }

        
        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .welcome-message {
            font-size: 2.8em;
            font-weight: bold;
            color: #ff5722; 
            text-align: center;
            text-shadow: 1px 1px 4px #000; 
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
            <div class="nav-img">
                <img src="assets/images/logo2.bmp" alt="Life Hospital Logo">
            </div>
            <div id="menu">
                <ul>
                    <li><a href="docpage.php">Home</a></li>
                    <li><a href="precord.php">Add Patients Records</a></li>
                    <li><a href="vrecords.php">View Patients Records</a></li>
                    <li><a href="index.php">Main Menu</a></li>
                </ul>
            </div>
        </nav>
    </header>

    
    <div class="welcome-container">
        <h1 class="welcome-message">Welcome to Doctor's Portal</h1>
    </div>

</body>
</html>
