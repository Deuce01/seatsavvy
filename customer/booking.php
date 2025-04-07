<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure the booking_date and booking_time fields are set
    if (isset($_POST['booking_date']) && isset($_POST['booking_time'])) {
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $booking_date = $_POST['booking_date'];  // Date
        $booking_time = $_POST['booking_time'];  // Time
        $table_id = $_POST['table_id'];
        $created_at = date('Y-m-d H:i:s');

        // Combine date and time into a single datetime value
        $full_booking_datetime = $booking_date . ' ' . $booking_time;

        // Validate if the booking date and time are not in the past
        if (strtotime($full_booking_datetime) < time()) {
            $error = "Booking date and time cannot be in the past!";
        } else {
            // Check if the table has already been booked for that date and time
            $query = "SELECT * FROM bookings WHERE table_id = ? AND booking_date = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("is", $table_id, $full_booking_datetime);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "This table is already booked for the selected date and time!";
            } else {
                // Proceed with booking
                $insert = "INSERT INTO bookings (customer_name, customer_phone, table_id, booking_date, created_at) 
                           VALUES (?, ?, ?, ?, ?)";
                $stmt = $mysqli->prepare($insert);
                $stmt->bind_param("ssiss", $customer_name, $customer_phone, $table_id, $full_booking_datetime, $created_at);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $success = "Booking successfully made!";
                } else {
                    $error = "There was an error while making the booking. Please try again.";
                }
            }
        }
    } else {
        $error = "Please ensure both date and time are selected!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - SeatSavvy</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f7fafc;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: 50px auto;
        }

        .button {
            background-color: #6366f1;
            color: #fff;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #4f46e5;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .input-field:focus {
            outline: none;
            border-color: #6366f1;
        }
    </style>
</head>

<body class="font-sans bg-gradient-to-br from-white to-gray-100">

    <div class="card">
        <h2 class="text-center text-3xl font-bold mb-4">Table Reservation</h2>

        <!-- Display Error or Success Messages -->
        <?php if (isset($error)) { ?>
            <div class="bg-red-500 text-white p-4 mb-4 rounded-md text-center">
                <strong>Error!</strong> <?php echo $error; ?>
            </div>
        <?php } ?>

        <?php if (isset($success)) { ?>
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md text-center">
                <strong>Success!</strong> <?php echo $success; ?>
            </div>
        <?php } ?>

        <!-- Reservation Form -->
        <form action="booking.php" method="POST">
            <!-- Customer Name -->
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-semibold">Your Name</label>
                <input type="text" id="customer_name" name="customer_name" class="input-field" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="customer_phone" class="block text-sm font-semibold">Phone Number</label>
                <input type="tel" id="customer_phone" name="customer_phone" class="input-field" required>
            </div>

            <!-- Reservation Date -->
            <div class="mb-4">
                <label for="booking_date" class="block text-sm font-semibold">Reservation Date</label>
                <input type="date" id="booking_date" name="booking_date" class="input-field" required>
            </div>

            <!-- Reservation Time -->
            <div class="mb-4">
                <label for="booking_time" class="block text-sm font-semibold">Reservation Time</label>
                <input type="time" id="booking_time" name="booking_time" class="input-field" required>
            </div>

            <!-- Table Selection -->
            <div class="mb-4">
                <label for="table_id" class="block text-sm font-semibold">Choose a Table</label>
                <select id="table_id" name="table_id" class="input-field" required>
                    <option value="" disabled selected>Select Table</option>
                    <!-- Dynamically load tables from the database -->
                    <?php
                    $query = "SELECT * FROM rpos_tables";
                    $result = $mysqli->query($query);
                    while ($table = $result->fetch_object()) {
                        echo "<option value='{$table->id}'>Table {$table->id}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="button">Reserve Table</button>
        </form>
    </div>

</body>

</html>
