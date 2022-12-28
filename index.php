<?php

?>

<form action="bookings.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Transfer code: <input type="text" name="transfer-code"><br>
    Arrival date: <input type="date" name="arrival-date" min="2023-01-01" max="2023-01-31"><br>
    Departure date: <input type="date" name="departure-date" min="2023-01-01" max="2023-01-31"><br>
    Room type:
    <input type="radio" name="room" <?php if (isset($roomType) && $roomType == "budget") echo "checked"; ?> value="budget">Budget
    <input type="radio" name="room" <?php if (isset($roomType) && $roomType == "standard") echo "checked"; ?> value="standard">Standard
    <input type="radio" name="room" <?php if (isset($roomType) && $roomType == "luxury") echo "checked"; ?> value="luxury">Luxury <br><br>
    <input type="submit">
</form>