<?php

require __DIR__ . "/header.php";
require __DIR__ . "/hotelFunctions.php";
require __DIR__ . '/factbox.php';

$jsonData= file_get_contents(__DIR__ . "/logbook.json");
$bookings= json_decode($jsonData, true);
?>

<head>
    <link rel="stylesheet" href="styles.css">
</head>
<main>
    <h2 class="header-hotels"> Hotels visited:</h2>
    <?php
            foreach ($bookings as $key => $bookingInfos) :
                foreach ($bookingInfos as $bookingInfo) :
                ?>

    <section class="cards">
        <div class="card">
            <?php
             $island= $bookingInfo["island"];
             $hotel = $bookingInfo["hotel"];

             echo "<h3> Visit to " . $hotel . " at " . $island . "</h3>"?>

            <p>Arrival Date: <?= $bookingInfo["arrival_date"] ?></p>
            <p>Departure Date: <?= $bookingInfo["departure_date"] ?></p>
            <p>Total Cost: <?= $bookingInfo["total_cost"] ?>$</p>
            <p> Stars: <?= $bookingInfo['stars'] ?> </p>
            <p> Additional info: <?=$bookingInfo['additional_info'];?> </p>
        </div>
    </section>
    <?php
                endforeach;
            endforeach;
            ?>

    <section class="factbox">
        <h2>El Morrobocho factbox:</h2>
        <div class="fact-card">

            <?php $bookings = factBoxRevenue();

            $totalCost = 0;
            foreach ($bookings as $booking) {
                    $totalCost += $booking['total_cost'];
                }
                $average = $totalCost / count($bookings);
               ?>

            <p>Total revenue of the hotel: <?= $totalCost . "$"?>
            <p> Average cost per booking: <?= $average . "$"?> <br>
        </div>

        <a href="index.php"><button class="homepage">Homepage</button></a>
        </div>
    </section>