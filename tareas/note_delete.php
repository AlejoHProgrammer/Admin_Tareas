<?php
include_once "db.php";
$conn = conn();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `notes` WHERE id_note='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
}
