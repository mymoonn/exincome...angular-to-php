<html>
<body>
  <style>
   table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  /* font-family : inherit; */
  border-collapse: collapse;
  width: 100%;
}

 td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

 tr:nth-child(even)
{background-color: #f2f2f2;}

tr:hover 
{background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: orchid;
  color: white;
}
    </style>
<?php 
$username = "root"; 
$password = ""; 
$database = "income"; 
$con=mysqli_connect("localhost", $username, $password, $database);
$query ="INSERT INTO income (ID,AMOUNT, Action1)
VALUES ('1','1000', 'DELETE')";
if ($con->query($query) === TRUE) {
  echo "expensepage  created successfully";
} else {
  echo "Error: " . $query . "<br>" . $con->error;
}
$query = "SELECT * FROM income";
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM income");


echo "<table border='1'>
<tr>
<th>ID</th>
<th>AMOUNT</th>
<th>Action1</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] ."</td>";
echo "<td>" . $row['AMOUNT'] . "</td>";
echo "<td>" . $row['Action1'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>