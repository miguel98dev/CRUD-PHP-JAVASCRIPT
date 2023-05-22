$(document).ready(function () {
  console.log("jQuery esta funcionando");
  $("#solicitar-cita").hide();
  $("#modificar-cita").hide();
  if ($("#modificar-cita").hide()) {
    $("#datos-cita").removeClass("col-md-7");
    $("#datos-cita").addClass("col-md-12");
  }

  $("#modificar-perfil").hide();
  if ($("#modificar-perfil").hide()) {
    $("#datos-perfil").removeClass("col-md-7");
    $("#datos-perfil").addClass("col-md-12");
  }

  $("#edit-datos").hide();
  if ($("#edit-datos").hide()) {
    $("#datos-usuarios").removeClass("col-md-7");
    $("#datos-usuarios").addClass("col-md-12");
  }

  $("#solicitar-citas").hide();

  $("#modificar-cita-usuario").hide();
  if ($("#modificar-cita-usuario").hide()) {
    $("#datos-cita-usuario").removeClass("col-md-8");
    $("#datos-cita-usuario").addClass("col-md-12");
  }

  $("#nuevo-registro").hide();
  $("#nueva-cita").hide();

  $("#edit-noticias").hide();
  if ($("#edit-noticias").hide()) {
    $("#ver-noticias").removeClass("col-md-7");
    $("#ver-noticias").addClass("col-md-12");
  }

  // obtiene y muestra los datos del usuario que ha iniciado sesion
  function mostrarDatos() {
    $.ajax({
      type: "GET",
      url: "datos.php", // solicita a datos.php
      success: (response) => {
        let datos = JSON.parse(response);
        let template = "";
        datos.forEach((dato) => {
          // recorre y muestra los datos de los usuarios
          template += `
            <tr idUser="${dato.idUser}"class="align-middle">
              <td>${dato.idUser}</td>
              <td>${dato.nombre}</td>
              <td>${dato.apellidos}</td>
              <td>${dato.telefono}</td>
              <td>${dato.direccion}</td>
              <td>
                <button class="edit-datos btn btn-primary w-50">
                  Modificar
                </button>
              </td>
            </tr>
          `;
        });
        $("#datos").html(template);
      },
    });
  }
  mostrarDatos();

  // obtiene y muestra los datos de todos los usuarios registrados
  function mostrarUsuarios() {
    $.ajax({
      type: "GET",
      url: "mostrarUsuarios.php", // solicita a mostrarUsuarios.php
      success: (response) => {
        let datos = JSON.parse(response);
        let template = "";

        datos.forEach((dato) => {
          template += `
            <tr idUser="${dato.idUser}" class="align-middle">
              <td>${dato.idUser}</td>
              <td>${dato.nombre}</td>
              <td>${dato.apellidos}</td>
              <td>${dato.telefono}</td>
              <td>${dato.direccion}</td>
              <td>
                <button class="edit-datos btn btn-primary w-60">
                  Modificar
                </button>
              </td>
              <td>
                <button class="delete-user btn btn-danger w-60">
                  Borrar
                </button>
              </td>
            </tr>
          `;
        });
        $("#datosUsers").html(template);
      },
    });
  }
  mostrarUsuarios();

  // obtiene y muestra los datos de todos los usuarios registrados para que el admin pida cita por ellos
  function mostrarNombreUsuarios() {
    $.ajax({
      type: "GET",
      url: "mostrarUsuarios.php",
      success: (response) => {
        let datos = JSON.parse(response);
        let template = "";

        datos.forEach((dato) => {
          template += `
            <tr idUser="${dato.idUser}" class="align-middle">
              <td>${dato.idUser}</td>
              <td>${dato.nombre}</td>
              <td>
                <button class="cita-usuario btn btn-dark w-50">
                  Pedir cita
                </button>
              </td>
            </tr>
          `;
        });
        $("#citas-usuarioss").html(template);
      },
    });
  }
  mostrarNombreUsuarios();

  // obtiene y muestra las citas del usuario que ha iniciado sesión
  function userCitas() {
    $.ajax({
      type: "GET",
      url: "userCitas.php",
      success: (response) => {
        let datos = JSON.parse(response);
        let template = "";
        datos.forEach((dato) => {
          template += `
            <tr idCita="${dato.idCita}" class="align-middle">
              <td>${dato.idCita}</td>
              <td>${dato.fecha}</td>
              <td>${dato.motivo}</td>
              <td>
                <button class="edit-cita btn btn-primary w-50">
                  Modificar
                </button>
              </td>
              <td>
                <button class="delete-cita btn btn-danger w-50">
                  Cancelar
                </button>
              </td>
            </tr>
          `;
        });
        $("#citas").html(template);
      },
    });
  }
  userCitas();

  // obtiene y muestra las citas de todos los usuarios
  function mostrarCitas() {
    $.ajax({
      type: "GET",
      url: "mostrarCitas.php",
      success: (response) => {
        let datos = JSON.parse(response);
        let template = "";
        datos.forEach((dato) => {
          template += `
            <tr idCita="${dato.idCita}" class="align-middle"> 
              <td>${dato.idUser}</td>
              <td>${dato.idCita}</td>
              <td>${dato.fecha}</td>
              <td>${dato.motivo}</td>
              <td>
                <button class="edit-cita btn btn-primary w-40">
                  Modificar
                </button>
              </td>
              <td>
                <button class="delete-cita btn btn-danger w-40">
                  Cancelar
                </button>
              </td>
            </tr>
          `;
        });
        $("#citas-usuarios").html(template);
      },
    });
  }
  mostrarCitas();

  // obtiene y muestra las noticias para que las vean los admin
  function mostrarNoticias() {
    $.ajax({
      type: "GET",
      url: "mostrarNoticiasAdmin.php",
      success: (response) => {
        let datos = JSON.parse(response);
        let template = "";
        datos.forEach((dato) => {
          template += `
          <tr idNoticia="${dato.idNoticia}" class="align-middle">;
            <td>${dato.idUser}</td>
            <td>${dato.idNoticia}</td>
            <td>${dato.titulo}</td>
            <td>${dato.fecha}</td>
            <td>
              <button class="edit-noticia btn btn-primary">
                Modificar
              </button>
            </td>
            <td>
              <button class="delete-noticia btn btn-danger">
                Borrar
              </button>
            </td>
          </tr>
          `;
        });
        $("#datos-noticias").html(template);
      },
    });
  }
  mostrarNoticias();

  // muestra formulario para que el admin pida cita para el usuario elegido
  $(document).on("click", ".cita-usuario", () => {
    $("#nombre-usuario").hide();
    $("#solicitar-citas").show();
    let element = $(this)[0].activeElement.parentElement.parentElement;
    let idUser = $(element).attr("idUser");
    console.log(element);
    $.post("mostrarNuevaCita.php", { idUser }, () => {
      $("#idUser2").val(idUser);
    });
  });

  // muestra el formulario para que el usuario pida una cita
  $(document).on("click", ".nueva-cita", () => {
    $(".nueva-cita").hide();
    $.post("mostrarNuevaCita.php", (response) => {
      let datos = JSON.parse(response);
      $("#idUser2").val(datos.idUser);
      $("#solicitar-cita").show();
      console.log(response);
    });
  });

  // muestra los datos de los usuarios en el formulario para poder modificarlos
  $(document).on("click", ".edit-datos", () => {
    $("#modificar-perfil").show();
    if ($("#modificar-perfil").show()) {
      $("#datos-perfil").removeClass("col-md-12");
      $("#datos-perfil").addClass("col-md-7");
    }

    $("#edit-datos").show();
    if ($("#edit-datos").show()) {
      $("#datos-usuarios").removeClass("col-md-12");
      $("#datos-usuarios").addClass("col-md-7");
    }

    let element = $(this)[0].activeElement.parentElement.parentElement;
    let idUser = $(element).attr("idUser");
    // console.log(element);
    $.post("mostrarDatos.php", { idUser }, (response) => {
      console.log(response);
      let datos = JSON.parse(response);
      $("#idUser").val(datos.idUser);
      $("#nombre").val(datos.nombre);
      $("#apellidos").val(datos.apellidos);
      $("#telefono").val(datos.telefono);
      $("#direccion").val(datos.direccion);
    });
  });

  //muestra los datos de la noticia en el formulario para modificarla
  $(document).on("click", ".edit-noticia", () => {
    $("#edit-noticias").show();
    if ($("#edit-noticias").show()) {
      $("#ver-noticias").removeClass("col-md-12");
      $("#ver-noticias").addClass("col-md-7");
    }
    let element = $(this)[0].activeElement.parentElement.parentElement;
    let idNoticia = $(element).attr("idNoticia");
    $.post("formNoticia.php", { idNoticia }, (response) => {
      let datos = JSON.parse(response);
      $("#idNoticia").val(datos.idNoticia);
      $("#titulo-noticia").val(datos.titulo);
      $("#texto-noticia").val(datos.texto);
    });
  });

  // muestra los datos de la cita en el formulario
  $(document).on("click", ".edit-cita", () => {
    $("#modificar-cita-usuario").show();
    if ($("#modificar-cita-usuario").show()) {
      $("#datos-cita-usuario").removeClass("col-md-12");
      $("#datos-cita-usuario").addClass("col-md-8");
    }
    $("#modificar-cita").show();
    if ($("#modificar-cita").show()) {
      $("#datos-cita").removeClass("col-md-12");
      $("#datos-cita").addClass("col-md-7");
    }
    let element = $(this)[0].activeElement.parentElement.parentElement;
    let idCita = $(element).attr("idCita");
    $.post("formCita.php", { idCita }, (response) => {
      console.log(response);
      let datos = JSON.parse(response);
      $("#idCita").val(datos.idCita);
      $("#edit-fecha").val(datos.fecha);
      $("#edit-motivo").val(datos.motivo);
    });
  });

  // muestra el formulario para pedir una nueva cita
  $(document).on("click", ".nueva-cita", () => {
    $(".nueva-cita").hide();
    // let element = $(this)[0].activeElement.parentElement.parentElement;
    // let idCita = $(element).attr("idCita");
    $.post("mostrarNuevaCita.php", (response) => {
      let datos = JSON.parse(response);
      $("#idUser2").val(datos.idUser);
      $("#solicitar-cita").show();
      console.log(response);
    });
  });

  // muestra el formulario para nuevos registros de usuarios por parte del admin
  $(document).on("click", ".registro-nuevo", () => {
    $("#nuevo-registro").show();
    $(".registro-nuevo").hide();
  });

  // borra usuario
  $(document).on("click", ".delete-user", () => {
    if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
      let element = $(this)[0].activeElement.parentElement.parentElement;
      let idUser = $(element).attr("idUser");
      // console.log(element);
      $.post("borrarUsuario.php", { idUser }, () => {
        mostrarUsuarios();
      });
    }
  });

  //borra la noticia seleccionada
  $(document).on("click", ".delete-noticia", () => {
    if (confirm("¿Estás seguro de que quiere eliminar la noticia?")) {
      let element = $(this)[0].activeElement.parentElement.parentElement;
      let idNoticia = $(element).attr("idNoticia");
      $.post("borrarNoticia.php", { idNoticia }, () => {
        mostrarNoticias();
      });
    }
  });

  // borra la cita seleccionada
  $(document).on("click", ".delete-cita", () => {
    if (confirm("¿Estás seguro de que quiere cancelar la cita?")) {
      let element = $(this)[0].activeElement.parentElement.parentElement;
      let idCita = $(element).attr("idCita");
      $.post("borrarCita.php", { idCita }, () => {
        userCitas();
        mostrarCitas();
      });
    }
  });

  // cuando se envia el formulario, se recogen los valores de cada input y los manda a modificarDatos.php
  $("#form-editar").submit((e) => {
    e.preventDefault();
    $("#edit-datos").hide();
    if ($("#edit-datos").hide()) {
      $("#datos-usuarios").removeClass("col-md-7");
      $("#datos-usuarios").addClass("col-md-12");
    }
    $("#modificar-perfil").hide();
    if ($("#modificar-perfil").hide()) {
      $("#datos-perfil").removeClass("col-md-7");
      $("#datos-perfil").addClass("col-md-12");
    }
    const postData = {
      idUser: $("#idUser").val(),
      nombre: $("#nombre").val(),
      apellidos: $("#apellidos").val(),
      telefono: $("#telefono").val(),
      direccion: $("#direccion").val(),
      contrasena: $("#contrasena").val(),
    };
    console.log(postData);
    $.post("modificarDatos.php", postData, () => {
      mostrarUsuarios();
      mostrarDatos();
      // console.log(response);
      $("#form-editar").trigger("reset"); // resetea el formulario
    });
  });

  // recoge los datos para modificar las citas
  $("#editar-cita").submit((e) => {
    e.preventDefault(e);
    $("#modificar-cita-usuario").hide();
    if ($("#modificar-cita-usuario").hide()) {
      $("#datos-cita-usuario").removeClass("col-md-8");
      $("#datos-cita-usuario").addClass("col-md-12");
    }
    $("#modificar-cita").hide();
    if ($("#modificar-cita").hide()) {
      $("#datos-cita").removeClass("col-md-7");
      $("#datos-cita").addClass("col-md-12");
    }
    const postData = {
      idCita: $("#idCita").val(),
      fecha: $("#edit-fecha").val(),
      motivo: $("#edit-motivo").val(),
    };
    $.post("modificarCita.php", postData, () => {
      console.log(postData);
      $("#editar-cita").trigger("reset");
      userCitas();
      mostrarCitas();
    });
  });

  // recoge los datos de los inputs y los inserta en la tabla citas
  $("#form-editar2").submit((e) => {
    e.preventDefault();
    $(".nueva-cita").show();
    $("#solicitar-cita").hide();
    $("#solicitar-citas").hide();
    $("#nombre-usuario").show();
    const postData = {
      idUser2: $("#idUser2").val(),
      fecha: $("#fecha").val(),
      motivo: $("#motivo").val(),
    };
    $.post("citasUsuario.php", postData, () => {
      $("#form-editar2").trigger("reset");
      // console.log(response);
      console.log(postData);
      userCitas();
      mostrarCitas();
    });
  });

  // recoge los datos del formulario para registrar usuarios desde el admin
  $("#nuevo-registro-usuario").submit((e) => {
    e.preventDefault();
    $("#nuevo-registro").hide();
    $(".registro-nuevo").show();
    const postData = {
      nombre: $("#nombre2").val(),
      apellidos: $("#apellidos2").val(),
      email: $("#email2").val(),
      telefono: $("#telefono2").val(),
      fnac: $("#fnac2").val(),
      direccion: $("#direccion2").val(),
      sexo: $("#sexo2").val(),
      contrasena: $("#contrasena2").val(),
      rol: $("#rol").val(),
    };
    console.log(postData);
    $.post("registrarUsuario.php", postData, () => {
      $("#nuevo-registro-usuario").trigger("reset");
      mostrarUsuarios();
    });
  });

  $.post("insertarNoticias.php", () => {
    $("#crear-noticia").trigger("reset");

  });

  $.post("modificarNoticia.php", () => {
    $("#form-noticias").trigger("reset");
  })

  $(document).on("click", ".cita-nueva", () => {
    $("#nueva-cita").show();
    $(".cita-nueva").hide();
  })
});
