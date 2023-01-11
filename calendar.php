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

$roomCalendar = [
    ["room" => 1, "calendar" => $budgetCalendar],
    ["room" => 2, "calendar" => $standardCalendar],
    ["room" => 3, "calendar" => $luxuryCalendar]
];

foreach ($roomCalendar as $calendar) {
}

echo $budgetCalendar->draw(date('Y-m-d'));



$standardCalendar->display();



$luxuryCalendar->display();
