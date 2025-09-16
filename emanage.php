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


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM employee WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $message = "Employee deleted successfully.";
    } else {
        $message = "Error deleting employee.";
    }
    $stmt->close();
}


if (isset($_POST['save_id'])) {
    $id = $_POST['save_id'];
    $name = $_POST['name'];
    $passcode = $_POST['passcode'];
    $em_type = $_POST['em_type'];

    $update_sql = "UPDATE employee SET name=?, passcode=?, em_type=? WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssi", $name, $passcode, $em_type, $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $message = "Employee updated successfully.";
    } else {
        $message = "No changes made.";
    }
    $stmt->close();
}


$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

$conn->close();

//
$edit_id = isset($_GET['edit_id']) ? $_GET['edit_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees - Life Hospital</title>
    <style>
        /* your CSS unchanged */
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

        .table-container {
            max-width: 900px;
            margin: 30px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff6666;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .delete-btn {
            background-color: #ff3333;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        .message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .update-btn {
            background-color: #0099cc;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
        }

        .update-btn:hover {
            background-color: #0077aa;
        }
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
                    <li><a href="ahome.php">Home</a></li>
                    <li><a href="portl.php">Employee Register</a></li>
                    <li><a href="emanage.php">Manage Employee</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="table-container">
    <h2>Employee List</h2>

    <?php if (!empty($message)) { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Passcode</th>
                <th>Employee Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <?php if ($edit_id == $row['id']): ?>
                            
                            <form method="post">
                                <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                                <td><input type="text" name="passcode" value="<?php echo $row['passcode']; ?>"></td>
                                <td><input type="text" name="em_type" value="<?php echo $row['em_type']; ?>"></td>
                                <td>
                                    <input type="hidden" name="save_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="update-btn">Save</button>
                                    <a href="emanage.php"><button type="button" class="delete-btn">Cancel</button></a>
                                </td>
                            </form>
                        <?php else: ?>
                        
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['passcode']; ?></td>
                            <td><?php echo $row['em_type']; ?></td>
                            <td>
                                <a href="?edit_id=<?php echo $row['id']; ?>"><button class="update-btn">Update</button></a>
                                <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?');">
                                    <button class="delete-btn">Delete</button>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">No employees found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
