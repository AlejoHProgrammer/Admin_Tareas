<?php

/* CONSULTA CON SENTENCIAS PREPARADAS */

/* include_once "db.php";
$conn=conn();

$description = $_POST["description"];
$date_finish = $_POST["date_finish"];
$priority = $_POST["priority"]; 

$stmt=$conn->prepare("INSERT INTO `task`(`description` , `date_finish`, `prioridad`) VALUES (?,?,?)");
$stmt->bind_param("sss",$description,$date_finish,$priority);
$stmt->execute();

$stmt->close();
$conn->close();

if ($conn) {
  echo "<script>alert('TAREA REGISTRADA')</script>"; 
   
}
 */

?>

<?php
include_once "db.php";
$conn = conn();

$description = $_POST["description"];
$date_finish = $_POST["date_finish"];
$priority = $_POST["priority"];

if (empty($priority)) {
  $priority = "Revisar";
}

$sql = "INSERT INTO `task`(`description` , `date_finish`, `prioridad`) VALUES ('$description','$date_finish', '$priority')";

$result = mysqli_query($conn, $sql) or trigger_error("error", mysqli_error($conn));

?>

