<?php

declare(strict_types=1);

$database = new PDO('sqlite:bookings.db');

$statement = $database->query('SELECT * FROM bookings');

if (isset($_POST['name'], $_POST['email'], $_POST['transfer_code'], $_POST['arrival_date'], $_POST['departure_date'], $_POST['room_type'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $transferCode = trim($_POST['transfer_code']);
    $arrivalDate = trim($_POST['arrival_date']);
    $departureDate = trim($_POST['departure_date']);
    $roomType = trim($_POST['room_type']);

    $query = sprintf('INSERT INTO bookings (name, email, transfer_code, arrival_date, departure_date, room_type) VALUES (:name, :email, :transfer_code, :arrival_date, :departure_date, :room_type)');

    $statement = $database->prepare($query);

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':transfer_code', $transferCode, PDO::PARAM_STR);
    $statement->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
    $statement->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
    $statement->bindParam(':room_type', $roomType, PDO::PARAM_STR);

    $statement->execute();
}

/* $name = $_POST['name'];
$email = $_POST['email'];
$transferCode = $_POST['transfer-code'];
$arrivalDate = $_POST['arrival-date'];
$departureDate = $_POST['departure-date'];
$roomType = $_POST['room'];


$database = new PDO('sqlite:bookings.db');
$stmt = $database->prepare('insert into bookings(guest_name, email, transfer_code, arrival_date, departure_date, room_type) values(?,?,?,?,?,?)');
$stmt->bindParam("sssdds", $name, $email, $transferCode, $arrivalDate, $departureDate, $roomType);
$stmt->execute();
echo "Thank you for your booking!";
 */