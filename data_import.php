<h1>Weather data imported successfully!!!</h1>
<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "weather_info";

// Connect to database
$mysqli = new mysqli($server, $user, $password, $db);

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

// Select weather data for given parameters
$sql = "SELECT *
        FROM weather_info
        WHERE city = 'Gorkha'
        AND weather_when >= DATE_SUB(NOW(), INTERVAL 3600 SECOND)
        ORDER BY weather_when DESC limit 1";

$result = $mysqli -> query($sql);

// If a record is found, do nothing
if ($result->num_rows > 0) {
    exit();
}

// If 0 record found, insert data
else {

    $url = 'https://api.openweathermap.org/data/2.5/weather?q=Gorkha,Nepal&appid=4cc5c70bf777ab4c13445b90fd278b07&units=metric';

    // Get data from openweathermap and store in JSON object
    $data = file_get_contents($url);
    $json = json_decode($data, true);

    // Fetch required fields
    $day = date("l");
    $country = $json['sys']['country'];
    $weather_when = date("Y-m-d H:i:s"); // now
    $icon = $json['weather'][0]['icon'];
    $weather_description = $json['weather'][0]['description'];
    $weather_temperature = $json['main']['temp'];
    $humidity = $json['main'] ['humidity'];
    $weather_wind = $json['wind']['speed'];
    $city = $json['name'];

    // Check if the record already exists in the database
    $sql = "SELECT * FROM weather_info WHERE weather_when >= CURDATE() AND city = 'Gorkha'";
    $result = $mysqli -> query($sql);

    // If a record is found, update it
    if ($result->num_rows > 0) {
        $sql = "UPDATE `weather_info` SET `country`='{$country}',`Dayy`='{$day}',`weather_when`='{$weather_when}',`icon`='{$icon}',`weather_description`='{$weather_description}',`temperature`='{$weather_temperature}',`humidity`='{$humidity}',`wind_speed`='{$weather_wind}',`city`='{$city}' WHERE weather_when >= CURDATE() AND city = 'Gorkha'";

        // Run SQL statement and report errors
        if (!$mysqli -> query($sql)) {
            echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
        }
    }

    // If no record is found, insert a new record
    else {
        $sql = "INSERT INTO weather_info (country, Dayy, weather_when, icon, weather_description, temperature, humidity, wind_speed, city)
        VALUES('{$country}', '{$day}', '{$weather_when}', '{$icon}', '{$weather_description}', {$weather_temperature}, {$humidity}, {$weather_wind}, '{$city}')";

        // Run SQL statement and report errors
        if (!$mysqli -> query($sql)) {
            echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
        }
    }
}

?>