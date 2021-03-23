<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exincome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO incomeexpense (TYPE,DESCRIPTION,AMOUNT,ACTION)
VALUES ('income','food','1000','delete')";
$sql = "INSERT INTO incomeexpense (TYPE,DESCRIPTION,AMOUNT,ACTION)
VALUES ('expense','dress','100','delete')";

$sql = "INSERT INTO incomeexpense (TYPE,DESCRIPTION,AMOUNT,ACTION)
VALUES ('income','salary','10000','delete')";
if ($conn->multi_query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
