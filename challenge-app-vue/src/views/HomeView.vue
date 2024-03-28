<template>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>EMAIL</th>
              <th>FOTO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody class="table-group-divider" id="contenido">
            <tr v-if="isLoading">
              <td colspan="6"><h3>CARGANDO...</h3></td>
            </tr>
            <tr v-else v-for="(emp, i) in this.empleados" :key="emp.id">
              <td v-text="i + 1"></td>
              <td v-text="emp.id"></td>
              <td v-text="emp.nombre"></td>
              <td v-text="emp.apellido"></td>
              <td v-text="emp.email"></td>
              <td>
                <img
                  v-if="emp.foto"
                  style="width: 150px !important"
                  :src="emp.foto"
                  class="img-thumbnail"
                  alt="foto"
                />
                <img
                  v-else
                  style="width: 150px !important"
                  src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-256.png"
                  class="img-thumbnail"
                  alt="foto"/>
                  
              </td>
                <td>
                <router-link
                  :to="{ path: '/view/' + emp.id }"
                  class="btn btn-info"
                >
                  <i class="fa-solid fa-eye"></i>
                </router-link>
                &nbsp;
                <router-link
                  :to="{ path: '/edit/' + emp.id }"
                  class="btn btn-warning"
                >
                  <i class="fa-solid fa-edit"></i>
                </router-link>
                &nbsp;
                <button
                  class="btn btn-danger"
                  v-on:click="($event) => eliminar(emp.id, emp.nombre)"
                >
                  <i class="fa-solid fa-trash"></i>
                </button>
          
                &nbsp;
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
      empleados: [],
      isLoading: false,
    };
  },
  mounted() {
    this.getEmpleados();
  },
  methods: {
    getEmpleados() {
      this.isLoading = true;
      axios.get("http://challengeapp.test/api/v1/empleados").then((response) => {
        this.empleados = response.data;
        this.isLoading = false;
      });
    },
    eliminar(id, nombre) {
      confirmar(
        "http://challengeapp.test/api/v1/empleados/",
        id,
        "Eliminar empleado",
        "Realmente desea eliminar a " + nombre + "?"
      );
      this.isLoading = false;
    },
  },
};
</script>
