<template>
  <div class="row mt-3">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header bg-dark text-while text-center">
          Detalle de la Tarea
        </div>
        <div class="card-body">
          <div class="d-grid col-6 mx-auto mb-3">
            <router-link :to="{ path: '/tareas/view' }" class="btn btn-info">
              <i class="fa-solid fa-arrow-left"></i>Regresar a la lista de
              Tareas
            </router-link>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fa-solid fa-user"></i>
              <label v-text="nombre" class="form-control"></label>
            </span>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fa-solid fa-user"></i>
              <text-area v-text="detalle" class="form-control"></text-area>
            </span>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fa-solid fa-user"></i>
              <label v-text="estado" class="form-control"></label>
            </span>
          </div>
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
    this.getTarea();
  },
  methods: {
    getTarea() {
      axios.get(this.url).then((res) => {
        this.nombre = res.data.data.nombre;
        this.detalle = res.data.data.detalle;
        this.estado = res.data.data.estado;
      });
    },
  },
};
</script>
