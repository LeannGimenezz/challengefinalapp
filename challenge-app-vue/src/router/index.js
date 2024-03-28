import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import TareaEdit from "../views/Tarea/TareaEdit.vue";
import TareaView from "../views/Tarea/TareaView.vue";
import TareaNew from "../views/Tarea/TareaNew.vue";
import TareasView from "../views/TareasView.vue";
import EmpleadoNew from "@/views/Empleado/EmpleadoNew.vue";
import EmpleadoEdit from "@/views/Empleado/EmpleadoEdit.vue";
import EmpleadoView from "../views/Empleado/EmpleadoView.vue";
import Login from "@/views/Login.vue";


const routes = [
 
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/create",
    name: "createEmp",
    component: EmpleadoNew,
  },
  {
    path: "/edit/:id",
    name: "editEmp",
    component: EmpleadoEdit,
  },
  {
    path: "/view/:id",
    name: "viewEmp",
    component: EmpleadoView,
  },
  {
    path: "/tareas/edit/:id",
    name: "edit",
    component: TareaEdit,
  },
  {
    path: "/tareas/view/:id",
    name: "view",
    component: TareaView,
  },
  {
    path: "/tareas/create/",
    name: "create",
    component: TareaNew,
  },
  {
    path: "/tareas/view",
    name: "viewAll",
    component: TareasView,
  },
  {
    path: "/login",
    name: "login",
    component: Login
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
