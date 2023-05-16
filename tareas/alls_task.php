<!DOCTYPE html>
<html lang="en">

<body>


  <?php
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

    <div class="col-xl-6 py-2" id="div_card_tareas">
      <div class="card" style="background-color:#ccc">
        <div class="card-header text-white bg-secondary py-1 h6">
          <i class="fas fa-list fa-lg"></i> Tareas <div class="float-right"><a href="#" id="toggle_agg_task"><i id="open_close_window1" class="fas fa-window-minimize fa-lg"></i></a></div>
        </div>

        <div class="card-body" id="div_tablero_tareas">

          <form id="edit_task">

            <button id="btn_ag_task" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="modal_task(0)"><i class="fas fa-plus"></i> AGREGAR</button>

            <button id="btn_all_task" type="button" class="btn btn-primary " onclick="show_task_complete()"><i class="fas fa-check-double"></i> FINALIZADAS</button>

            <div class="table-wrapper-scroll-y my-custom-scrollbar">

              <table id="task" class="table table-dark table-bordered table-striped">

                <input class="form-control bg-dark " style="color:#FFF" id="search_task" type="text" placeholder="Buscar..">
                <thead>
                  <tr>
                    <th>TAREA</th>
                    <th>PRIORIDAD</th>
                    <th>INGRESO</th>
                    <th>FALTAN</th>
                    <th>LIMITE</th>
                    <th>TERMINAR</th>
                    <th>EDITAR</th>
                    <!--<th>BORRAR</th>-->
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

                      <td><?php
                          $fecha1 = new DateTime($date["date_limit"]);
                          $fecha2 = new DateTime(date('Y-m-d'));

                          $res_dias = date_diff($fecha1,$fecha2);;
                          // diff es como la diferencia que hay entre fechas como si fuera una resta 
                          $diasRestantes = $res_dias->days;

                          echo $diasRestantes <= 5 ? "<span style='color: #ff0000;font-weight: bold '>" . $diasRestantes . " dias para caducar tarea.</span>" : "Resta " . $diasRestantes . " días.";

                          /*echo "Resta " . $diasRestantes . " días.";*/ ?></td>

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
            </div>
          </form>

        </div>
      </div>
    </div>

    <br><br>

    <div class="col-xl-6 py-2" id="div_card_task">
      <div class="card" style="background-color:#ccc">
        <div class="card-header text-white bg-secondary py-1 h6">
          <i class="fas fa-pen fa-lg"></i> Notas <div class="float-right"><a href="#" data-toggle="tooltip" id="toggle_agg_note"><i id="open_close_window2" class="fas fa-window-minimize fa-lg"></i></a></div>
        </div>
        <div class="card-body" id="div_tablero_notes">

          <button type="button" class="btn bg-success " data-toggle="modal" data-target="#myModal" onclick=modal_tnote(0)><i class="fas fa-plus"></i> Agregar nota</button>
          <br><br>

          <?php
          $sql = "SELECT * FROM notes";
          $result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
          ?>

          <div id="div_notas" class="row">
            <?php foreach ($result as $note_description) { ?>

              <div class="col-md-4">

                <form method="post" id="note_d">
                  <div class="card bg-warning">
                    <input type="hidden" value="<?php echo $note_description["id"] ?>">

                    <div class="dropdown">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                      </button>
                      <div class="dropdown-menu">

                        <?php echo '<a class="dropdown-item" id="" href="#myModal" data-toggle="modal" onclick="modal_tnote(' . $note_description['id'] . ')"><i class="fa fa-pen"></i> Editar</a>' ?>

                        <?php echo '<a class="dropdown-item" id="" href="#" onclick="delete_note(' . $note_description['id'] . ')"><i class="fa fa-trash"></i> Borrar</a>' ?>
                      </div>
                    </div>
                    <?php echo ('Fecha de registro: ') . $note_description["note_registration"]; ?>
                    <hr>
                    <div id="descrip_note" class="card-body text-center">
                      <p class="card-text">
                        <?php echo $note_description["note"] ?></p>
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
  </div>

  <div class="row">

    <div class="col-xl-12 py-2" id="div_card_tareas">

      <div class="card" style="background-color:#ccc">

        <div class="card-header text-white bg-secondary py-1 h6">
        <i class="fas fa-user-clock"></i> REGISTRO DE REALIZACION DE TAREAS POR DIA<div class="float-right"></div>
        </div>

        <div class="card-body" id="div_tablero_tareas">
          <?php
          include "ctrl_task.php";
          ?>
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

    $(document).ready(function() {
      $("#toggle_agg_task").on("click", function() {
        var elemento = $("#open_close_window1");

        if (elemento.hasClass("fas fa-window-minimize fa-lg")) {
          elemento.removeClass("fas fa-window-minimize fa-lg").addClass("fas fa-window-maximize fa-lg");
        } else {
          elemento.removeClass("fas fa-window-maximize fa-lg").addClass("fas fa-window-minimize fa-lg");
        }
      });
    });

    $(document).ready(function() {
      $("#toggle_agg_note").on("click", function() {
        var elemento = $("#open_close_window2");

        if (elemento.hasClass("fas fa-window-minimize fa-lg")) {
          elemento.removeClass("fas fa-window-minimize fa-lg").addClass("fas fa-window-maximize fa-lg");
        } else {
          elemento.removeClass("fas fa-window-maximize fa-lg").addClass("fas fa-window-minimize fa-lg");
        }
      });
    });

    /* $(document).ready(function() {
          $("#toggle_agg_task").on("click", function() {
            //$("#window").text("Maximizar");
            var elemento = $("#window");
            if (elemento.text() === "Maximizar") {
              elemento.text("Minimizar");
            } else {
              elemento.text("Maximizar");
            }
          });
        }); */
  </script>

</body>

</html>