
<h1 style='text-align: center; margin-right: 100px; margin-top: 50px;'>Weather forcast Data</h1>

<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "weather_info";

// Create connection
$conn = new mysqli($server, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM weather_info";
$result = $conn->query($sql);

echo "<table style='border-collapse: collapse; margin-left: 250px; margin-top: 50px; border-radius: 50px'>";
echo "<tr>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Country</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Day</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>When</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Icon</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Description</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Temperature</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Humidity</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>Wind Speed</th>
        <th style='background-color: #00d9ff; border: 1px solid black; padding: 10px; color: black; font-size: 18px;'>City</th>
      </tr>";






while($row = $result->fetch_assoc()) {
    echo "<tr style='border: 1px solid black; background-color: wheat; color: black;'>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["country"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["Dayy"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["weather_when"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["icon"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["weather_description"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["temperature"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["humidity"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["wind_speed"]."</td>
    <td style='border: 1px solid black; padding: 5px; font-size: 17px;'>".$row["city"]."</td>
</tr>";



}

echo "</table>";

?>