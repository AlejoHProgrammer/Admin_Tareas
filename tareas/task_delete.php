<?php
include_once "db.php";
$conn=conn();
 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM task WHERE id='$id'";
 
if (mysqli_query($conn, $sql)) {
    echo "Eliminado";
  } else {
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
  } 
}
