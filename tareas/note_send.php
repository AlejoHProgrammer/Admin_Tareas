<?php
include_once "db.php";
$conn = conn();

/* $description_note = $_POST["description_note"];

$sql = "INSERT INTO `notes`(`note`) VALUES ('$description_note')";

$result = mysqli_query($conn, $sql) or trigger_error("error", mysqli_error($conn));
 */
$id = $_POST['id'];
$description_note = $_POST['description_note'];

if ($id==0) {
    $sql = "INSERT INTO `notes`(`note`) VALUES ('$description_note')";

} else {
  $sql = "UPDATE `notes` SET `note`='$description_note' WHERE id='$id'";
}
if (mysqli_query($conn, $sql)) {
  echo "Actualizando datos note_send";
  exit;
} else {
  echo "Error en actualizar los datos: " . mysqli_error($conn);
}
