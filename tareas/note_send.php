<?php
include_once "db.php";
$conn = conn();

$description_note = $_POST["description_note"];

$sql = "INSERT INTO `notes`(`note`) VALUES ('$description_note')";

$result = mysqli_query($conn, $sql) or trigger_error("error", mysqli_error($conn));
