<div class="row">
  <div class="col-xl-12 py-2" id="div_card_tareas">
    <div class="card" style="background-color:#ccc">
      <div class="card-header text-white bg-secondary py-1 h6">
        <i class="fas fa-list fa-lg"></i> Tareas Completas <div class="float-right"><a href="index.php?pg=task" id="toggle_agg_task"><i class="fas fa-reply fa-lg"></i></a></div>
      </div>

      <div class="card-body" id="div_tablero_tareas">

        <?php
        include_once "db.php";
        $conn = conn();
        /* $sql="SELECT * FROM task WHERE complete=1 ORDER BY prioridad DESC ";
 */
        $sql = "SELECT task.*, priority.prioridad 
                FROM task 
                JOIN priority
                ON task.prioridad = priority.id_prioridad
                WHERE complete=1 ORDER BY id_prioridad DESC";

        $result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
        ?>

        <div class="container ">


          <input class="form-control bg-dark " style="color:#FFF" id="search_task" type="text" placeholder="Buscar..">


          <form id="edit_task">

            <table id="task" class="table table-dark table-bordered table-striped">
              <thead>
                <tr>
                  <th>TAREA</th>
                  <th>PRIORIDAD</th>
                  <th>INGRESO</th>
                  <th>LIMITE</th>
                  <th>FINALIZACION</th>

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

                    <td><?php echo $date["registration_date"]; ?></td>

                    <td><?php echo $date['date_limit'] ?></td>

                    <td><?php echo $date['date_finish'] ?></td>

                    <td><?php echo '<a id="check_tag" data-toggle="tooltip" title="Volver hacer!" href="#" onclick="redo_task(' . $date['id'] . ')"><i class="fas fa-sync-alt fa-spin"></i></a>' ?></i></td>

                  </tr>
                </tbody>
              <?php
              }
              ?>
            </table>

          </form>

        </div>



        <script>
          $(document).ready(function() {
            $("#search_task").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });


          $(document).ready(function() {
            $("#check_tag").mouseenter(function() {
              $("#redo").animate({
                rotate: '-360deg',
              });
            });
          });
        </script>

      </div>