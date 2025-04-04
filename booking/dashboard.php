<?php
include '../partials/header.php'; // Or path to your partial
include 'controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['check'])) {
    $date = $_POST['booking_date'];
    $time = $_POST['booking_time'];
    $availableTables = getAvailableTables($date, $time);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book'])) {
    $customer_id = $_SESSION['user_id']; // or however you store logged-in ID
    saveBooking($customer_id, $_POST['table_id'], $_POST['booking_date'], $_POST['booking_time']);
    $message = "Booking submitted!";
}
?>

<h2>Book a Table</h2>
<form method="POST">
  <label>Date:</label>
  <input type="date" name="booking_date" required>
  <label>Time:</label>
  <input type="time" name="booking_time" required>
  <button type="submit" name="check">Check Availability</button>
</form>

<?php if (isset($availableTables)) : ?>
    <h3>Available Tables</h3>
    <ul>
        <?php foreach ($availableTables as $table) : ?>
            <li>
                <?= $table['table_name'] ?> (Capacity: <?= $table['capacity'] ?>)
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="table_id" value="<?= $table['table_id'] ?>">
                    <input type="hidden" name="booking_date" value="<?= $date ?>">
                    <input type="hidden" name="booking_time" value="<?= $time ?>">
                    <button name="book">Book Now</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (isset($message)) echo "<p>$message</p>"; ?>

<?php include '../partials/footer.php'; ?>
