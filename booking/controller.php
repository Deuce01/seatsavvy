<?php
include '../config/db.php'; // DB connection

function getAvailableTables($date, $time) {
    global $conn;
    $stmt = $conn->prepare("
        SELECT * FROM tables WHERE table_id NOT IN (
            SELECT table_id FROM bookings 
            WHERE booking_date = ? AND booking_time = ? AND status = 'confirmed'
        )
    ");
    $stmt->bind_param('ss', $date, $time);
    $stmt->execute();
    return $stmt->get_result();
}

function saveBooking($customer_id, $table_id, $date, $time) {
    global $conn;
    $stmt = $conn->prepare("
        INSERT INTO bookings (customer_id, table_id, booking_date, booking_time, status)
        VALUES (?, ?, ?, ?, 'pending')
    ");
    $stmt->bind_param("iiss", $customer_id, $table_id, $date, $time);
    return $stmt->execute();
}
