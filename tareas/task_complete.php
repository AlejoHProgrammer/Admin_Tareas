<?php
include_once "db.php";
$conn=conn();

/* if (isset($_GET['id'])) {
  $id = $_GET['id'];
$sql = "SELECT * from task where id=$id";
};

$result=mysqli_query($conn,$sql) or trigger_error("ERROR:",mysqli_error($conn));

foreach ($result as $dato ) {
  echo "complete=".$dato['complete'];
} */

if (isset($_GET['id'])) {
  $id = $_GET['id'];


  $sql = "UPDATE `task` SET complete = '1' , date_finish = NOW() WHERE id = $id";

   if (mysqli_query($conn, $sql)) {
    echo "Actualizada";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }  
}
