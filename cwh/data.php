<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "employee_portal";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to the database failed due to: " . mysqli_connect_error());
}

$sql = "SELECT * FROM employees";
$result = $con->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$con->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Portal - View Employees</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<header>
    <h1>Employee Portal</h1>
    <nav>
        <a href="index.php">Add Employee</a>
        <a href="view_data.php">View Employees</a>
    </nav>
</header>

<main>
    <h2>Employee List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<footer>
    <p>Copyright 2023 Employee Portal</p>
</footer>
</body>
</html>
