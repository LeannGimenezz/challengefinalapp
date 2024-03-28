<template>
    <div class="row mt-3">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-dark text-white text-center">
            Registrar estudiante
          </div>
          <div class="card-body">
            <form v-on:submit="registrar">
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
                  type="email"
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
                  ><i class="fa-solid fa-user"></i
                ></span>
                <input
                  type="password"
                  class="form-control"
                  v-model="this.password"
                  id="password"
                  placeholder="Ingrese su password"
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
                <button class="btn btn-success">
                  <i class="fa-solid fa-floppy-disk"></i>Registrar
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
  export default {
    data() {
      return {
        nombre: "",
        apellido: "",
        foto: "",
        url: "http://challengeapp.test/api/v1/empleados",
        email:"",
        password:"",
        isLoading: false,
      };
    },
    methods: {
      registrar() {
        console.log(this.password)
        event.preventDefault();
        var miFoto = document.getElementById("foto");
  
        this.foto = miFoto.src;
        if (this.nombre.trim() == "") {
          mostrarAlerta("Ingrese el nombre", "warning", "nombre");
        } else if (this.apellido.trim() == "") {
          mostrarAlerta("Ingrese el apellido", "warning", "apellido");
        } else {
          var params = {
            nombre: this.nombre.trim(),
            apellido: this.apellido.trim(),
            foto: this.foto.trim(),
            email: this.email.trim(),
            password: this.password,
          };
          enviarSolicitud("POST", params, this.url, "Empleado registrado");
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
  