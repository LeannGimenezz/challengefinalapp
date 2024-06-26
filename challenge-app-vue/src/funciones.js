import Swal from "sweetalert2";
import axios from "axios";

export function mostrarAlerta(titulo, icono, foco = "") {
  if (foco != "") {
    document.getElementById(foco).focus();
  }

  Swal.fire({
    title: titulo,
    icon: icono,
    customClass: {
      confirmButton: "btn btn-primary",
      popup: "animated zoonIn",
      buttonStyling: false,
    },
  });
}

export function confirmar(urlConSlash, id, titulo, mensaje) {
  var url = urlConSlash + id;
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success me-3",
      popup: "animated zoonIn",
      buttonStyling: false,
      cancelButton: "btn btn-danger",
    },
  });
  swalWithBootstrapButtons
    .fire({
      title: titulo,
      text: mensaje,
      icon: "question",
      showCancelButton: true,
      confirmButtonText: '<i class="fa solid fa-check">Si, eliminar</i>',
      cancelButtonText: '<i class="fa solid fa-ban">Cancelar</i>',
    })
    .then((res) => {
      if (res.isConfirmed) {
        enviarSolicitud("DELETE", { id: id }, url, "Eliminado con exito");
      } else {
        mostrarAlerta("Operacion cancelada", "info");
      }
    });
}

export function enviarSolicitud(metodo, params, url, mensaje) {
  axios({
    method: metodo,
    url: url,
    data: params,
  })
    .then(function (res) {
      var estado = res.status;
      if (estado == 200) {
        mostrarAlerta(mensaje, "success");
        window.setTimeout(function () {
          window.location.href = "/";
        }, 1000);
      } else {
        mostrarAlerta("No se pudo recuperar la respuesta", "error");
      }
    })
    .catch(function (error) {
      mostrarAlerta("Servidor no disponible", "error");
    });
}
