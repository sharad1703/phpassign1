<?php 
if(isset($_POST['name'])){
 $server = "localhost";
 $username = "root";
 $password = "";

 $con = mysqli_connect($server, $username, $password);

 if (!$con) {
    die("connection this databse failed due to" . mysqli_connect_error());
 }
 echo "Success connect to db";

 $name  = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];
 $sql = "INSERT INTO `employee_portal`.`employees` (`name`, `email`, `phone`, `address`) VALUES ('$name', '$email', '$phone', '$address')";
//  echo $sql;

 if($con-> query($sql) == true){
    // echo 'Data Inserted';
 }
 else{
    echo 'Error' . $con-> error;
 }

 $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Portal</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Employee Portal</h1>
    <nav>
      <a href="index.php">Add Employee</a>
      <a href="data.php">View data</a>
    </nav>
  </header>

  <main>
    <form action="index.php" method="post">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email"><br>
      <label for="phone">Phone:</label><br>
      <input type="tel" id="phone" name="phone"><br>
      <label for="address">Address:</label><br>
      <input type="text" id="address" name="address"><br>
      <input type="submit" value="Submit">
    </form>
  </main>

  <footer>
    <p>Copyright 2023 Employee Portal</p>
  </footer>
</body>
</html>