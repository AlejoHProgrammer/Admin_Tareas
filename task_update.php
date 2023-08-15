<?php
include_once "db.php";
$conn = conn();

$id = $_POST['id'];
$description = $_POST['description'];
$date_limit = $_POST['date_limit'];
$prioridad = $_POST['prioridad'];

if ($id==0) {
  $sql = "INSERT INTO `task`(`description` , `date_limit`, `prioridad`) VALUES ('$description','$date_limit', '$prioridad')";
} else {
  $sql = "UPDATE `task` SET `complete`=0, `description`='$description', `date_limit`='$date_limit', `prioridad`='$prioridad' WHERE id='$id'";
}
if (mysqli_query($conn, $sql)) {
  echo "Actualizando datos";
  exit;
} else {
  echo "Error en actualizar los datos: " . mysqli_error($conn);
}
