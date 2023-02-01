<?php

//function that connects to the database
function factBoxRevenue() {
    $db = connect('bookings.db');
    $statement = $db->prepare("SELECT total_cost FROM bookings");
    $statement->execute();


    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);



return $bookings;

}

    ?>