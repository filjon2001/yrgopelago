<?php

?>

<link rel="stylesheet" type="text/css" href="css/calendar.min.css">

<form action="bookings.php" method="post">
    <div>
        <label for="name">Name:</label><br>
        <input type="text" name="name">
    </div>

    <div>
        <label for="email">E-mail:</label><br>
        <input type="text" name="email">
    </div>
    <div>

        <label for="transfer-code">Transfer code:</label><br>
        <input type="text" name="transfer-code">
    </div>

    <div>
        <label for="arrival-date"></label>
        Arrival date: <input type="date" name="arrival-date" min="2023-01-01" max="2023-01-31"><br>
    </div>

    <div>
        <label for="departure-date"></label>
        Arrival date: <input type="date" name="departure-date" min="2023-01-01" max="2023-01-31"><br>
    </div>

    <div>
        Room type:
        <input type="radio" name="room" <?php if (isset($roomType) && $roomType == "budget") echo "checked"; ?> value="budget">Budget
        <input type="radio" name="room" <?php if (isset($roomType) && $roomType == "standard") echo "checked"; ?> value="standard">Standard
        <input type="radio" name="room" <?php if (isset($roomType) && $roomType == "luxury") echo "checked"; ?> value="luxury">Luxury <br><br>
        <input type="submit">
    </div>

</form>