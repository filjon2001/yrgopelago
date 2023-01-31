<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$budgetCalendar = new Calendar;
$budgetCalendar->useMondayStartingDate();
$standardCalendar = new Calendar;
$standardCalendar->useMondayStartingDate();
$luxuryCalendar = new Calendar;
$luxuryCalendar->useMondayStartingDate();

// Array with three different calendars
$roomCalendar = [
    ["room" => 1, "calendar" => $budgetCalendar],
    ["room" => 2, "calendar" => $standardCalendar],
    ["room" => 3, "calendar" => $luxuryCalendar]
];

// Function that makes rooms occupied when booked.

function occupied(array $roomCalendar)
{
    $database = connect('/bookings.db');
    $stmt = $database->prepare('SELECT bookings.arrival_date, bookings.departure_date, bookings.room_id, rooms.room_type
    FROM bookings
    INNER JOIN rooms
    ON rooms.id = bookings.room_id');

    $stmt->execute();

    $notAvailable = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Making the calendar switch color when booked
    if (!empty($notAvailable)) {
        $mask = true;
    }

    foreach ($roomCalendar as $calendar) {
        foreach ($notAvailable as $event) {
            if ($event['room_id'] === $calendar['room']) {
                $calendar['calendar']->addEvent($event['arrival_date'], $event['departure_date'], "", $mask, "");
            }
        }
    }
}

occupied($roomCalendar);

?>

<img src="./images/budget.png" class="budget" alt="Budget room">
<?php
$budgetCalendar->display();
?>

<img src="./images/standard.png" class="standard" alt="Standard room">
<?php
$standardCalendar->display();
?>

<img src="./images/luxury.png" class="luxury" alt="Luxury room">
<?php
$luxuryCalendar->display();
?>