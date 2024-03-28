<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Challengue app</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </router-link>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Empleado
            </a>
            <ul class="dropdown-menu">
              <li>
                <router-link class="dropdown-item" to="/"
                  ><a class="dropdown-item" href="#"
                    >Listar empleados</a
                  ></router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/create"
                  ><a class="dropdown-item" href="#"
                    >Nuevo empleado</a
                  ></router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/tareas/view"
                  ><a class="dropdown-item" href="#"
                    >Listar tareas</a
                  ></router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/tareas/create"
                  ><a class="dropdown-item" href="#"
                    >Registrar tareas</a
                  ></router-link
                >
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="#">
              <a class="nav-link active" aria-current="page" to="/login" href="#"
                >Iniciar sesión</a
              >
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <router-view />
  </div>
</template>
