<!DOCTYPE html>
<html lang="en">

<body>

  <?php
  require_once "ajax_functions.php";
  include_once "db.php";
  $conn = conn();

  /* $sql="SELECT * FROM task WHERE complete=0 ORDER BY prioridad DESC"; */

  $sql = "SELECT task.*, priority.prioridad 
          FROM task 
          JOIN priority
          ON task.prioridad = priority.id_prioridad
          WHERE complete=0 ORDER BY id_prioridad DESC";

  $result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
  ?>


  <div class="row">

    <div class="col-xl-6" id="div_card_tareas">
      <div class="card">
        <div class="card-header text-white bg-secondary py-1 h6">
          <i class="fas fa-list fa-lg"></i> Tareas <div class="float-right"><a href="#" data-toggle="tooltip" title="Minimizar!" id="toggle_agg_task"><i id="fa-window-minimize" class="fas fa-window-minimize fa-lg"></i></a></div>
        </div>
        <div class="card-body" id="div_tablero_tareas">

          <form id="edit_task">

            <button id="btn_ag_task" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="modal_task(0)"><i class="fas fa-plus"></i> AGREGAR</button>

            <button id="btn_all_task" type="button" class="btn btn-primary " onclick="show_task_complete()"><i class="fas fa-check-double"></i> FINALIZADAS</button>

            <input class="form-control bg-dark " style="color:#FFF" id="search_task" type="text" placeholder="Buscar..">


            <table id="task" class="table table-dark table-bordered table-striped">
              <thead>
                <tr>
                  <th>TAREA</th>
                  <th>PRIORIDAD</th>
                  <th>FECHA LIMITE</th>
                  <th>TERMINAR</th>
                  <th>EDITAR</th>
                  <!--               <th>BORRAR</th> -->
                </tr>
              </thead>

              <?php
              foreach ($result as $date) {
                $prioridad = $date['prioridad'];
                $clase_prioridad = '';

                if ($prioridad == 'Urgente') {
                  $clase_prioridad = 'rojo';
                } else if ($prioridad == 'Importante') {
                  $clase_prioridad = 'verde';
                } else if ($prioridad == 'Pendiente') {
                  $clase_prioridad = 'azul';
                } else {
                  $clase_prioridad = 'blanco';
                }
              ?>

                <tbody id="myTable">
                  <tr>

                    <td><?php echo $date['description'] ?></td>

                    <td class="<?php echo $clase_prioridad; ?>"><?php echo $date['prioridad'] ?></td>

                    <td><?php echo $date['date_limit'] ?></td>

                    <td><?php echo '<a id="check_tag" href="#" onclick="complete_task(' . $date['id'] . ')"><i class="fa fa-check"></i></a>' ?></td>

                    <td><?php echo '<a id="edit_tag" href="#myModal" data-toggle="modal" onclick="modal_task(' . $date['id'] . ')"><i class="fa fa-pen"></i></a>' ?></td>

                    <!--  <td><?php /* echo '<a id="delete_tag" href="#" onclick="delete_task(' . $date['id'] . ')"><i class="fa fa-trash"></i></a>' */ ?></td> -->

                  </tr>
                </tbody>

              <?php
              }
              ?>
            </table>

          </form>

        </div>
      </div>
    </div>

    <div class="col-xl-6" id="div_card_task">
      <div class="card">
        <div class="card-header text-white bg-secondary py-1 h6">
          <i class="fas fa-pen fa-lg"></i> Notas <div class="float-right"><a href="#" data-toggle="tooltip" title="Minimizar!" id="toggle_agg_note"><i id="fa-window-minimize" class="fas fa-window-minimize fa-lg"></i></a></div>
        </div>
        <div class="card-body" id="div_tablero_notes">

          <button type="button" class="btn bg-success " data-toggle="modal" data-target="#myModal" onclick=modal_tnote()><i class="fas fa-plus"></i> Agregar nota</button>
          <br><br>

          <?php
          $sql = "SELECT * FROM notes";
          $result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
          ?>

          <div class="row">
            <?php foreach ($result as $note_description) { ?>
              <div class="col-md-4">
                <form method="post" id="note_d">
                  <div class="card bg-warning">
                    <input type="hidden" value="<?php echo $note_description["id_note"] ?>">
                    <?php echo '<a id="delete_tag" href="#" onclick="delete_note(' . $note_description['id_note'] . ')"><i class="fa fa-trash"></i></a>' ?>
                    <div class="card-body text-center">
                      <p class="card-text"><?php echo $note_description["note"] ?></p>
                    </div>
                  </div>
                  <br>
                </form>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>

    <script>
      $(document).ready(function() {
        $("#toggle_agg_task").click(function() {
          $("#div_tablero_tareas").slideToggle();
        });
      });

      $(document).ready(function() {
        $("#toggle_agg_note").click(function() {
          $("#div_tablero_notes").slideToggle();
        });
      });

      $(document).ready(function() {
        $("#search_task").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>


</body>

</html>