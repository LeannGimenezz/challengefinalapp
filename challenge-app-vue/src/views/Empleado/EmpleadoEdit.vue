<template>
    <div class="row mt-3">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-dark text-white text-center">
            Editar empleado
          </div>
          <div class="card-body">
            <form v-on:submit="editar">
              <div class="d-grid col-6 mx-auto mb-3">
                <img
                  v-if="this.foto"
                  height="100"
                  id="foto"
                  :src="this.foto"
                  class="img-thumbnail"
                  alt="foto"
                />
                <img
                  v-else
                  height="100"
                  id="foto"
                  src="https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-256.png"
                  class="img-thumbnail"
                  alt="foto"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fa-solid fa-user"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  v-model="this.nombre"
                  id="nombre"
                  placeholder="Ingrese su nombre"
                  required
                  maxlength="50"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fa-solid fa-user"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  v-model="this.apellido"
                  id="apellido"
                  placeholder="Ingrese su apellido"
                  required
                  maxlength="50"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fa-solid fa-user"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  v-model="this.email"
                  id="email"
                  placeholder="Ingrese su email"
                  required
                  maxlength="50"
                />
                  </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fa-solid fa-gift"></i
                ></span>
                <input
                  type="file"
                  v-on:change="previsualizarArchivo"
                  class="form-control"
                  accept="image/png,image/jpeg, image/jpg, .pdf"
                />
              </div>
              <div class="d-grid col-6 mx-auto mb-3">
                <button class="btn btn-warning">
                  <i class="fa-solid fa-refresh"></i>Guardar cambios
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
        apellido: "",
        foto: "",
        email: "",
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
      editar() {
        event.preventDefault();
        var miFoto = document.getElementById("foto");
        this.foto = miFoto.src;
  
        if (this.nombre.trim() == "") {
          mostrarAlerta("Ingrese el nombre", "warning", "nombre");
        } else if (this.apellido.trim() == "") {
          mostrarAlerta("Ingrese el apellido", "warning", "apellido");
        } else if (this.email.trim() == "") {
          mostrarAlerta("Ingrese el email", "warning", "email");
        }  else {
          var params = {
            nombre: this.nombre.trim(),
            apellido: this.apellido.trim(),
            foto: this.foto.trim(),
            email: this.email.trim()
          };
          enviarSolicitud("PUT", params, this.url, "Empleado actualizado");
        }
      },
  
      previsualizarArchivo(e) {
        var read = new FileReader();
        read.readAsDataURL(e.target.files[0]);
        read.onload = (e) => {
          var foto = document.getElementById("foto");
          foto.src = read.result;
          this.foto = foto.src;
        };
      },
    },
  };
  </script>
  