<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

require __DIR__ . ('/vendor/autoload.php');
require(__DIR__ . '/functions.php');
require(__DIR__ . '/hotelFunctions.php');

// Assigns the form to variables.

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $transferCode = trim($_POST['transfer_code']);
    $arrivalDate = trim($_POST['arrival_date']);
    $departureDate = trim($_POST['departure_date']);
    $roomId = $_POST['room_id'];
    $roomId = intval($roomId);
    $totalCost = totalCost($roomId, $arrivalDate, $departureDate);
    bookings($name, $email, $transferCode, $arrivalDate, $departureDate, $roomId, $totalCost);
}
