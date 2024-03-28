<template>
    <div class="row mt-3">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-dark text-while text-center">
            Editar Tarea
          </div>
          <div class="card-body">
            <form v-on:submit="actualizar">
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa-solid fa-user"></i>
                  <input
                    type="text"
                    v-model="nombre"
                    id="nombre"
                    placeholder="Ingrese el nombre de la tarea"
                    maxlength="50"
                    required
                    class="form-control"
                  />
                </span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa-solid fa-user"></i>
                  <input
                    type="text"
                    v-model="detalle"
                    id="detalle"
                    placeholder="Ingrese el detalle"
                    maxlength="500"
                    required
                    class="form-control"
                  />
                </span>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa-solid fa-user"></i>
                  <input
                    type="number"
                    v-model="estado"
                    id="estado"
                    placeholder="Ingrese la estado"
                    required
                    class="form-control"
                  />
                </span>
              </div>
              <div class="d-grid col-6 mx-auto mb-3">
                <button class="btn btn-warning">
                  <i class="fa-solid fa-refresh"></i>Guardar Cambios
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { mostrarAlerta, enviarSolicitud } from "../../funciones";
  import { useRoute } from "vue-router";
  import axios from "axios";
  export default {
    data() {
      return {
        id: 0,
        nombre: "",
        detalle: "",
        estado: "",
        url: "http://challengeapp.test/api/v1/tareas",
        cargando: false,
      };
    },
    mounted() {
      const route = useRoute();
      this.id = route.params.id;
      this.url += "/" + this.id;
      this.getTareas();
    },
    methods: {
      getTareas() {
        axios.get(this.url).then((res) => {
          this.nombre = res.data.data.nombre;
          this.detalle = res.data.data.detalle;
          this.estado = res.data.data.estado;
        });
      },
      actualizar() {
        event.preventDefault();
  
        if (this.nombre.trim() === "") {
          mostrarAlerta("Ingrese un nombre", "warning", "nombre");
        } else if (this.detalle.trim() === "") {
          mostrarAlerta("Ingrese una detalle", "warning", "detalle");
        } else if (this.estado.type === "number") {
          mostrarAlerta("Ingrese el estado", "warning", "estado");
        } else {
          var parametros = {
            nombre: this.nombre.trim(),
            detalle: this.detalle.trim(),
            estado: this.estado,
          };
          enviarSolicitud("PUT", parametros, this.url, "Tarea Actualizado!");
        }
      },
    },
  };
  </script>
  