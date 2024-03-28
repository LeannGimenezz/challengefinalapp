<template>
    <div class="row mt-3">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-dark text-white text-center">
            Detalle del empleado
          </div>
          <div class="card-body">
            <router-link :to="{ path: '/' }" class="btn btn-info"
              ><i class="fa-solid fa-arrow-left"></i>Regresar al
              inicio</router-link
            >
            <div class="d-grid col-6 mx-auto mb-3">
              <img
                v-if="this.archivo"
                height="100"
                id="archivo"
                :src="this.archivo"
                class="img-thumbnail"
                alt="foto"
              />
              <img
                v-else
                height="100"
                id="archivo"
                src="https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-256.png"
                class="img-thumbnail"
                alt="foto"
              />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"
                ><i class="fa-solid fa-user"></i
              ></span>
              <label class="form-control" v-text="this.nombre"></label>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"
                ><i class="fa-solid fa-user"></i
              ></span>
              <label class="form-control" v-text="this.apellido"></label>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"
                ><i class="fa-solid fa-user"></i
              ></span>
              <label class="form-control" v-text="this.email"></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { useRoute } from "vue-router";
  import axios from "axios";
  
  export default {
    data() {
      return {
        id: 0,
        nombre: "",
        apellido: "",
        foto: "",
        email:"",
        url: "http://challengeapp.test/api/v1/empleados",
        isLoading: false,
      };
    },
    mounted() {
      this.id = useRoute().params.id;
      this.url = this.url + "/" + this.id;
      this.getEmpleado();
    },
    methods: {
      getEmpleado() {
        axios.get(this.url).then((response) => {
          this.nombre = response.data.data.nombre;
          this.apellido = response.data.data.apellido;
          this.foto = response.data.data.foto;
          this.email = response.data.data.email;
        });
      },
    },
  };
  </script>
  