<?php
include 'partials/header.php';

//Handle table status update
if ($_server["REQUEST_METHOD"] =="POST")
{
    $table_id = $_POST['table_id'];
    $status = $_POST['status'];
    $conn->query("UPDATE tables SET status='$status' WHERE id='table_id'");
}

//fetch all tables
$tables = $conn->query("SELECT * FROM tables");
?>
<div class="container mt-4">
    <h2>manage Tables</h2>
    <table class="table table-bordered">
        