<?php
// Database connection
$host = "localhost";
$dbname = "db2456580";
$username = "2456580";
$password = "M.faree007@@";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Movie_name, Genre, Price, Date_of_release FROM movies";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movies List</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px 12px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>

<table>
    <tr>
        <th>Movie name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of release</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Movie_name'] . "</td>";
            echo "<td>" . $row['Genre'] . "</td>";
            echo "<td>£" . number_format($row['Price'], 2) . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($row['Date_of_release'])) . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>