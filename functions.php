<?php

declare(strict_types=1);

function bookings($name, $email, $transferCode, $arrivalDate, $departureDate, $room_id, $totalCost)
{
    $database = connect('/bookings.db');
    if (isset($_POST['name'], $_POST['email'], $_POST['transfer_code'], $_POST['arrival_date'], $_POST['departure_date'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $transferCode = trim($_POST['transfer_code']);
        $arrivalDate = trim($_POST['arrival_date']);
        $departureDate = trim($_POST['departure_date']);
        $roomId = $_POST['room_id'];
        $roomId = intval($roomId);

        $totalCost = totalCost($roomId, $arrivalDate, $departureDate);

        $query = 'INSERT INTO bookings (name, email, transfer_code, arrival_date, departure_date, room_id, total_cost) VALUES (:name, :email, :transfer_code, :arrival_date, :departure_date, :room_id, :total_cost)';

        $statement = $database->prepare($query);

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':transfer_code', $transferCode, PDO::PARAM_STR);
        $statement->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
        $statement->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
        $statement->bindParam(':room_id', $roomId, PDO::PARAM_INT);
        $statement->bindParam(':total_cost', $totalCost, PDO::PARAM_INT);

        $statement->execute();
    }
};

// Calculating the total cost of every stay.

function totalCost(int $room_id, string $arrivalDate, string $departureDate)
{
    $database = connect('/bookings.db');
    $stmt = $database->prepare('SELECT price FROM rooms WHERE id = :room_id');
    $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
    $stmt->execute();

    $roomCost = $stmt->fetch(PDO::FETCH_ASSOC);
    $roomCost = $roomCost['price'];

    $totalCost = (((strtotime($departureDate) - strtotime($arrivalDate)) / 86400) * $roomCost);
    return $totalCost;
}

// Shows in the calendar if a room is occupied.

function occupied(int $room_id, string $arrivalDate, string $departureDate)
{
    $database = connect('/bookings.db');
    $stmt = $database->prepare('SELECT arrival_date, departure_date 
    FROM bookings
    WHERE id = :room_id
    AND (arrival_date <= :arrival_date
    OR arrival_date < :departure_date)
    AND
    (departure_date > :arrival_date
    OR
    departure_date > :departure_date)');

    $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
    $stmt->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_INT);
    $stmt->bindParam(':departure_date', $departureDate, PDO::PARAM_INT);

    $stmt->execute();

    $isAvailable = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($arrivalDate) && $departureDate > $arrivalDate) {
        return true;
    } else {
        return false;
    }

    function generateReceipt(string $name, string $email, string $transferCode, int $arrivalDate, int $departureDate, int $room_id, int $totalCost)
    {
    }
}
