import Vue from "vue";
import VueRouter from "vue-router";

import registrarHoras from "./components/pages/RegistroHoras";
import reporteHoras from "./components/pages/ReporteHoras";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/registrar",
            component: registrarHoras
        },
        {
            path: "/reporte-horas",
            component: reporteHoras
        },
          
    ],
    mode: "hash" //Evita que aparezca # en la ruta //history
});
