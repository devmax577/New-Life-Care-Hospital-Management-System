<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lifehospital";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = isset($_POST['email']) ? $_POST['email'] : '';
$records = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $email != '') {
    $sql = "SELECT * FROM records WHERE patients_email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $records = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $error_message = "No records found for the entered email.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient Records by Email</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; }

        .header-top { background-color: #d33f49; padding: 10px; color: #fff; text-align: center; }
        .header-top ul { list-style: none; display: flex; justify-content: space-around; font-weight: bold; }

        .header-nav { background-color: #f7f7f7; border-bottom: 3px solid #d33f49; padding: 15px 0; }
        .container { max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; }
        .nav-img img { width: 90px; }
        #menu ul { list-style: none; display: flex; gap: 15px; }
        #menu ul li a { color: #333; text-decoration: none; font-size: 1.1em; font-weight: 600; }
        #menu ul li a:hover { color: #d33f49; text-decoration: underline; }

        .form-container { max-width: 800px; margin: 30px auto; padding: 20px; background-color: #fffbf5; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); }
        input[type="email"], input[type="submit"] { padding: 10px; font-size: 1em; border: 1px solid #ddd; border-radius: 5px; }
        input[type="submit"] { background-color: #d33f49; color: #fff; cursor: pointer; }
        input[type="submit"]:hover { background-color: #a02935; }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; }
        th, td { padding: 15px; text-align: left; border: 1px solid #ddd; font-size: 0.9em; }
        th { background-color: #f8d7da; color: #333; font-weight: bold; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #f1e4e8; }
    </style>
</head>
<body>

<header>
    <div class="header-top">
        <ul>
            <li>Welcome to Life Hospital</li>
            <li>Lifehospital@sl.com</li>
            <li>+94 763998720</li>
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
                    <li><a href="appoint.php">Make Appointments</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="form-container">
    <form action="" method="POST">
        <label for="email">Search by Patient's Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter patient's email">
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($records)) { ?>
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Doctor</th>
                    <th>Doctor Name</th>
                    <th>Patient's Email</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record) { ?>
                    <tr>
                        <td><?php echo $record['patient_name']; ?></td>
                        <td><?php echo $record['doctor']; ?></td>
                        <td><?php echo $record['doctor_name']; ?></td>
                        <td><?php echo $record['patients_email']; ?></td>
                        <td><?php echo $record['description']; ?></td>
                        <td><?php echo $record['date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } elseif (!empty($email) && empty($records)) { ?>
        <p>No records found for the entered email.</p>
    <?php } ?>
</div>

</body>
</html>
