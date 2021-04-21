<template>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
                <a class="nav-link" href="">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <router-link :to="ruta_registrar" class="nav-link">
                            Registrar Control
                        </router-link>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <router-link :to="ruta_reporte" class="nav-link">
                            Reporte Horas
                        </router-link>
                    </li>
                </ul>               
            </li>
        </ul>
    </nav>
</template>


<script>
import { prefix } from "../variables";
export default {
    data: function() {
        return {
           prefijo: '', 
           ruta_registrar: '/registrar',
           ruta_reporte: '/reporte-horas',
        };
    },
     mounted: function() {
        this.prefijo = prefix;
    },
};
</script>
