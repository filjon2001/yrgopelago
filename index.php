<?php

use benhall14\phpCalendar\Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

require 'vendor/autoload.php';
require(__DIR__ . '/header.php');
require(__DIR__ . '/hotelFunctions.php');
require(__DIR__ . '/calendar.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="calendarstyles.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <title>El Morrobocho</title>
</head>

<body>
    <form action="bookings.php" method="post">
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name">
        </div>

        <div>
            <label for="email">E-mail:</label><br>
            <input type="text" name="email">
        </div>
        <div>

            <label for="transfer_code">Transfer code:</label><br>
            <input type="text" name="transfer_code">
        </div>
        <br>
        <div>
            <label for="arrival_date">Arrival date:</label><br>
            <input type="date" name="arrival_date" min="2023-01-01" max="2023-01-31"><br>
        </div>
        <div>
            <label for="departure_date">Departure date:</label> <br>
            <input type="date" name="departure_date" min="2023-01-01" max="2023-01-31"><br>
        </div>
        <div>
            <label for="room_id">Room type:</label> <br>
            <input type="radio" name="room_id" <?php if (isset($roomId) && $roomId == "1") echo "checked"; ?> value="1">Budget
            <input type="radio" name="room_id" <?php if (isset($roomId) && $roomId == "2") echo "checked"; ?> value="2">Standard
            <input type="radio" name="room_id" <?php if (isset($roomId) && $roomId == "3") echo "checked"; ?> value="3">Luxury <br><br>
            <input type="submit" name="submit">
        </div>
    </form>

</body>

</html>