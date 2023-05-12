<script>
  /* function save_task(){
  var formData;
	formData = new FormData($('#fmr_task')[0]);

    $.ajax({
        type: "POST",
        data: formData,
        url: "send_task.php",
        async: true,
        cache: false,
        contentType: false,
        processData: false,

        error: function(data){
            alert("Hubo un problema save_task..." + data);
           
        },
        success: function (data) {
        $("#msg").html("Insertado! "+data);
        show_tasks(); 
    }
  });

} */

  //Mostrar tabla de tareas por hacer

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

  //Mostrar tabla tareas completadas

  function show_task_complete() {

    $.ajax({
      type: "GET",
      url: "all_task_complete.php?index=task_complete",
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


  // Actualizar y editar tarea 

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


  //  Mostrar modal para crear y editar tareas

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

  /* Agregar notas modal */

  function modal_tnote() {
    var formData;
    formData = new FormData($('#text_note')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "modal_note.php",
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

  function agg_note() {
    var formData;
    formData = new FormData($('#text_note')[0]);
    $.ajax({
      type: "POST",
      data: formData,
      url: "note_send.php",
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

  function delete_note(id) {
    var opcion = confirm("¿Estas seguro que completastes esta tarea?");

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


  // Terminar tarea 

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


  //Rehacer tarea
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

  function show_task_complete() {
    $.ajax({
      type: "POST",
      url: "all_task_complete.php",
      async: true,
      cache: false,
      contentType: false,
      processData: false,

      error: function(data) {
        alert("Hubo un problema show_task_complete..." + data);
      },
      success: function(data) {
        $("#all_date").html(data);
      }
    });
  }


  // Borrar tareas

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
</script>