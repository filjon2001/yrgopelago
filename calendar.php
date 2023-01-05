<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$budgetCalendar = new Calendar;
$budgetCalendar->stylesheet();

(new Calendar)->display();

$standardCalendar = new Calendar;
$standardCalendar->stylesheet();

(new Calendar)->display();

$luxuryCalendar = new Calendar;
$luxuryCalendar->stylesheet();

(new Calendar)->display();
