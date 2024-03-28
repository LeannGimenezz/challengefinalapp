<template>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Id</th>
              <th>Nombre</th>
              <th>Detalle</th>
              <th>Estado</th>
              <th>Fecha de inicio</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-group-divider" id="contenido">
            <tr v-if="this.cargando">
              <td colspan="6"><h3>Cargando...</h3></td>
            </tr>
            <tr v-else v-for="(tarea, i) in this.tareas" :key="tarea.id">
              <td v-text="i + 1"></td>
              <td v-text="tarea.id"></td>
              <td v-text="tarea.nombre"></td>
              <td v-text="tarea.detalle"></td>
              <td v-text="tarea.estado"></td>
              <td
                v-text="new Date(tarea.created_at).toLocaleDateString('en-US')"
              ></td>
              <td>
                <router-link
                  :to="{ path: '/tareas/view/' + tarea.id }"
                  class="btn btn-info"
                >
                  <i class="fa-solid fa-eye"></i>
                </router-link>
                &nbsp;
                <router-link
                  :to="{ path: '/tareas/edit/' + tarea.id }"
                  class="btn btn-warning"
                >
                  <i class="fa-solid fa-edit"></i>
                </router-link>
                &nbsp;
                <button
                  class="btn btn-danger"
                  v-on:click="($event) => eliminar(tarea.id, tarea.nombre)"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { confirmar } from "../funciones";

export default {
  data() {
    return {
      tareas: null,
      cargando: false,
    };
  },
  mounted() {
    this.getTareas();
  },
  methods: {
    getTareas() {
      this.cargando = true;
      axios.get("http://challengeapp.test/api/v1/tareas").then((res) => {
        this.tareas = res.data;
        this.cargando = false;
      });
    },
    eliminar(id, nombre) {
      confirmar(
        "http://challengeapp.test/api/v1/tareas/",
        id,
        "Eliminar Tarea",
        "Realmente desea eliminar a " + nombre + " ?"
      );
      this.cargando = false;
    },
  },
};
</script>
