<div class="modal-header">
    <h4 class="modal-title">Registro</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
    <?php
    include_once "db.php";
    $conn = conn();
    if (isset($_GET["id"])) {
        $id = $_GET['id'];

        if ($id > 0) {
            /* $sql = "SELECT * FROM task WHERE id = $id"; */

            $sql = "SELECT task.*, priority.prioridad 
            FROM task 
            JOIN priority
            ON task.prioridad = priority.id_prioridad
            WHERE id = $id";
            $result = mysqli_query($conn, $sql) or trigger_error("ERROR:", mysqli_error($conn));
        } else {
            $result[0]['id'] = 0;
            $result[0]['description'] = " ";
            $result[0]['date_limit'] = " ";
            $result[0]['prioridad'] = "";
        }
    }
    ?>
    <form id="modal_edit" class="form bg-dark px-1 py-2 " method="post">
        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">

        <?php

        foreach ($result as $dato) {
        ?>

            <br>
            <div class="row">
                <div class="col">
                    <label id="descrip_task" for="task">Descripción de la tarea <i class="fa fa-pen"></i></label>

                    <textarea type="text" class="form-control" cols="30" rows="5" name="description" id="description"><?php echo $dato['description'] ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label id="descrip_task" for="date_limit"> Fecha limite <i class="fa fa-calendar"></i></label>
                    <input type="date" name="date_limit" id="date_limit" class="form-control" value="<?php echo $dato['date_limit'] ?>">
                </div>


                <div class="col">
                    <label id="descrip_task" for="prioridad">Prioridad <i class="fa fa-exclamation"></i></label>
                    <select class="form-control" id="prioridad" name="prioridad">
                        <option value="" <?php echo $dato['prioridad'] == "" ? "selected" : "" ?>></option>
                        <option value="0" <?php echo $dato['prioridad'] == "Revisar" ? "selected" : "" ?>>Revisar</option>
                        <option value="3" <?php echo $dato['prioridad'] == "Urgente" ? "selected" : "" ?>>Urgente</option>
                        <option value="2" <?php echo $dato['prioridad'] == "Importante" ? "selected" : "" ?>>Importante</option>
                        <option value="1" <?php echo $dato['prioridad'] == "Pendiente" ? "selected" : "" ?>>Pendiente</option>
                    </select>
                </div>
            </div>
            <br>

            <div class="custom-control custom-switch form-check-inline">
                <label id="descrip_task" class="custom-control-label" for="permitir_borrar">Habilitar borrar</label>
                <input type="checkbox" class="custom-control-input" id="permitir_borrar" name="permitir_borrar" />
            </div>

            <?php echo '<a id="btn_modal_edit" href="#" onclick="delete_task(' . $dato['id'] . ')"><button id="bt_modal_delete" type="button" class="btn btn-danger" disabled>Borrar</button></a>' ?>


            <?php echo '<a id="btn_modal_edit" href="#" onclick="update_task(' . $dato['id'] . ')"><button id="bt_modal_edit" type="button" class="btn btn-success" disabled>Registrar</button></a>' ?>

        <?php } ?>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>


<script>
    $('#permitir_borrar').change(function() {
        if ($('#permitir_borrar').is(':checked')) {
            if (confirm("¿Estas seguro de borrar esta tarea?")) {
                cerrar = 1;
            } else {
                cerrar = 0;
            }
            if (cerrar) {
                $('#bt_modal_delete').prop("disabled", false);
            } else {
                $('#permitir_borrar').prop('checked', false);
            }
        } else {
            $('#bt_modal_delete').prop("disabled", true);
        }

    })


    function habilitar() {
        campo1 = document.getElementById("description").value;
        campo2 = document.getElementById("date_limit").value;
        select = document.getElementById("prioridad").value;
        val = 0;

        if (campo1 == "") {
            val++;
        }

        if (campo2 == "") {
            val++;
        }

        if (select == "") {
            val++;
        }

        if (val == 0) {
            document.getElementById("bt_modal_edit").disabled = false;

        } else {
            document.getElementById("bt_modal_edit").disabled = true;

        }

    }
    document.getElementById("description").addEventListener("keyup", habilitar);
    document.getElementById("date_limit").addEventListener("keyup", habilitar);
    document.getElementById("prioridad").addEventListener("change", habilitar);
    /* document.getElementById("bt_modal_edit").addEventListener("click", ()=>{
        alert("Haz llenado todo");
    }); */



    $().ready(function() {});
</script>