<div class="modal-header">
  <h4 class="modal-title">Notas</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
  <?php
  include_once "db.php";
  $conn = conn();
  if (isset($_GET["id"])) {
    $id = $_GET['id'];

    if ($id > 0) {

      $sql = "SELECT * FROM notes WHERE id = $id";

      $result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
    } else {
      $result[0]['id'] = 0;
      $result[0]['note'] = "";
    }
  }
  ?>
  <form id="text_note" action="" method="post">
    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">

    <?php

    foreach ($result as $notes) {
    ?>
      <textarea class="form form-control" name="description_note" id="agg_note" cols="30" rows="10" placeholder="Escribe tus apuntes"><?php echo $notes["note"] ?></textarea>
</div>
<button class="btn btn-success" onclick="agg_note()">Enviar</button>
<?php

    }
?>
</form>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>