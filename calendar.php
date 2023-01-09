<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$budgetCalendar = new Calendar;
$standardCalendar = new Calendar;
$luxuryCalendar = new Calendar;

$roomCalendar = [
    ["room" => 1, "calendar" => $budgetCalendar],
    ["room" => 2, "calendar" => $standardCalendar],
    ["room" => 3, "calendar" => $luxuryCalendar]
];



echo $budgetCalendar->draw(date('Y-m-d'));



$standardCalendar->display();



$luxuryCalendar->display();
