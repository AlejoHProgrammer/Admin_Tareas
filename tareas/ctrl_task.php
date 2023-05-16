<?php
include_once "db.php";
$conn = conn();
$fecha = "2023-05-16"; // Fecha específica, puedes modificarla según tus necesidades

$sql = "SELECT * FROM task WHERE complete = 1 ORDER BY date_finish ASC" ;

$result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
?>
<!-- <input class="form-control bg-dark " style="color:#FFF" id="search_task" type="text" placeholder="Buscar">
 -->

<form id="edit_task">
    <table id="task" class="table table-dark table-bordered table-striped">
        <table id="task" class="table table-dark table-bordered table-striped">
            <thead>
                <tr>
                    <th>FECHA DE FINALIZACION</th>
                    <th>TAREAS REALIZADAS</th>

                </tr>
            </thead>
            <tbody id="myTable">
                <?php

                $group_tasks = array();//array para las tareas finalizadas

                foreach ($result as $date) {
                    $fecha = $date['date_finish'];
                    $description = $date['description'];


                    if (isset($group_tasks[$fecha])) {
                        $group_tasks[$fecha][] = $description;
                    } else {
                        // Si la fecha no está en el array, crea un nuevo grupo con la descripción de la tarea
                        $group_tasks[$fecha] = array($description);
                    }
                }

                foreach ($group_tasks as $fecha => $tareas) { ?>

                    <tr>
                        <td><?php echo $fecha; ?></td>
                        <td><?php echo implode(', ', $tareas); ?></td>
                    </tr>

                <?php }
                ?>


            </tbody>
        </table>
    </table>
</form>

<script>
    $(document).ready(function() {
        $("#search_task").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>