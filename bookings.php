<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/hotelFunctions.php';

//$statement = $database->query('SELECT * FROM bookings');


$database = connect('/bookings.db');
if (isset($_POST['name'], $_POST['email'], $_POST['transfer_code'], $_POST['arrival_date'], $_POST['departure_date'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $transferCode = trim($_POST['transfer_code']);
    $arrivalDate = trim($_POST['arrival_date']);
    $departureDate = trim($_POST['departure_date']);
    $roomId = $_POST['room_id'];

    $query = 'INSERT INTO bookings (name, email, transfer_code, arrival_date, departure_date, room_id) VALUES (:name, :email, :transfer_code, :arrival_date, :departure_date, :room_id)';

    $statement = $database->prepare($query);

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':transfer_code', $transferCode, PDO::PARAM_STR);
    $statement->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
    $statement->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
    $statement->bindParam(':room_id', $roomId, PDO::PARAM_INT);


    $statement->execute();
};
