<script>
  /*=============================================
	Mostrar tabla de tareas para realizar
	=============================================*/

  function show_tasks() {

    $.ajax({
      type: "POST",
      url: "alls_task.php?p=all_task",
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema show_task..." + data);
      },
      success: function(data) {
        $("#all_date").html(data);
      }
    });

  }

  /*=============================================
	Mostrar tabla tareas completadas
	=============================================*/


  function show_task_complete() {

    $.ajax({
      type: "GET",
      url: "all_task_complete.php",
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema show_task..." + data);
      },
      success: function(data) {
        $("#all_date").html(data);
      }
    });

  }

  /*=============================================
	Modal Editar tarea 
	=============================================*/


  function update_task(id) {
    var formData;
    formData = new FormData($('#modal_edit')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "task_update.php?id=" + id,
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema..." + data);
      },
      success: function(data) {
        show_tasks();
        $('#myModal').modal('hide');
      }
    });
  }

  /*=============================================
  	Mostrar modal para crear tareas
  	=============================================*/

  function modal_task(id) {
    var formData;
    formData = new FormData($('#edit_task')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "active_mbutton.php?id=" + id,
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema..." + data);
      },
      success: function(data) {
        $("#contenido_myModal").html(data);
      }
    });
  }

  /*=============================================
	Modal para agregar notas
	=============================================*/

  function modal_tnote(id) {
    var formData;
    formData = new FormData($('#text_note')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "modal_note.php?id=" + id,
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema..." + data);
      },
      success: function(data) {
        $("#contenido_myModal").html(data);
      }
    });
  }

  function agg_note(id) {
    var formData;
    formData = new FormData($('#text_note')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "note_send.php?id=" + id,
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema..." + data);
      },
      success: function(data) {
        $('#myModal').modal('hide');
        show_tasks();
      }
    });
  }
  /*=============================================
  	Borrar notas
  	=============================================*/
  function delete_note(id) {
    var opcion = confirm("¿Estas seguro de borrar esta nota?");

    if (opcion == true) {

      var formData;
      formData = new FormData($('#note_d')[0]);
      $.ajax({
        type: "POST",
        data: formData,
        url: "note_delete.php?id=" + id,
        async: true,
        cache: false,
        contentType: false,
        processData: false,

        error: function(data) {
          alert("Hubo un problema..." + data);
        },
        success: function(data) {
          show_tasks();
        }
      });
    }
  }

  /*=============================================
  	 Terminar tarea
  	=============================================*/


  function complete_task(id) {
    var opcion = confirm("¿Estas seguro que completastes esta tarea?");

    if (opcion == true) {
      var formData;
      formData = new FormData($('#edit_task')[0]);

      $.ajax({
        type: "POST",
        data: formData,
        url: "task_complete.php?id=" + id,
        async: true,
        cache: false,
        contentType: false,
        processData: false,

        error: function(data) {
          alert("Hubo un problema..." + data);
        },
        success: function(data) {
          show_tasks();
        }
      });
    }
  }

  /*=============================================
  	Volver a realizar la tarea
  	=============================================*/

  function redo_task(id) {
    var opcion = confirm("¿Estas seguro de volver ha realizar esta tarea?");

    if (opcion == true) {
      var formData;
      formData = new FormData($('#edit_task')[0]);

      $.ajax({
        type: "POST",
        data: formData,
        url: "redo_task.php?id=" + id,
        async: true,
        cache: false,
        contentType: false,
        processData: false,

        error: function(data) {
          alert("Hubo un problema..." + data);
        },
        success: function(data) {
          show_task_complete();
        }
      });
    }
  }


  /*=============================================
	Borrar tareas
	=============================================*/

  function delete_task(id) {

    var formData;
    formData = new FormData($('#edit_task')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "task_delete.php?id=" + id,
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema..." + data);
      },
      success: function(data) {
        show_tasks();
        $('#myModal').modal('hide');


      }
    });
  }

  /*=============================================
	Habilitar boton para borrar
	=============================================*/

  function habilitar() {
    campo1 = document.getElementById("description").value;
    campo2 = document.getElementById("date_finish").value;
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
  document.getElementById("date_finish").addEventListener("keyup", habilitar);
  document.getElementById("prioridad").addEventListener("change", habilitar);
  /* document.getElementById("bt_modal_edit").addEventListener("click", ()=>{
      alert("Haz llenado todo");
  }); */

  function ctrl_tasks() {

$.ajax({
  type: "POST",
  url: "ctrl_task.php?",
  async: true,
  cache: false,
  contentType: false,
  processData: false,

  error: function(data) {
    alert("Hubo un problema show_task..." + data);
  },
  success: function(data) {
    $("#all_date").html(data);
  }
});

}

</script>