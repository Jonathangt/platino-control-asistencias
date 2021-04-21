<template>
    <main class="content-wrapper">
        <div class="content-header">
            <div style="background-color: #ffffff;" class="card-header">
                <p><b v-text="tituloHeader"></b></p>
            </div>
        </div>

        <template>
            <div class="container-fluid">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Seleccione una fecha </label>
                            <div class="input-group">
                                <input v-model="fecha_buscar" class="form-control class-color"  type="date" 
                                        placeholder="N° Identificación Paciente"  />
                                <button @click="index(1, fecha_buscar)" type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                    <div style="overflow-x:auto;">
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th  colspan="7"><center v-text="date_format"></center></th>
                                <!-- <td v-text="report.fecha_registro"></td> -->
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Entrada</th>
                                <th>Almuerzo Inicio</th>
                                <th>Almuerzo Regreso</th>
                                <th>Salida</th>
                                <th>Cumplimiento</th>
                                <th>Fecha Registro</th>
                            </tr>
                        </thead>
                        <tbody v-if="arrayReporteHoras.length">
                            <tr v-for="report in arrayReporteHoras" :key="report.id">                            
                                <td v-text="report.get_all_user.name"></td>
                                <td v-text="report.hora_entrada"></td>
                                <td v-text="report.almuerzo_inicio"></td>
                                <td v-text="report.almuerzo_regreso"></td>
                                <td v-text="report.hora_salida"></td>
                                
                                <!-- <td v-text="report.total_cumplimiento"></td> -->
                                <td 
                                    v-text="
                                        format_fecha_hora(report.total_cumplimiento, 0, 2)+'h'+
                                        format_fecha_hora(report.total_cumplimiento, 3, 2)+'m'
                                    "
                                ></td> 
                                <td v-text="format_fecha_hora(report.fecha_registro, 0, 10)"></td>
                            
                                <!-- <td>{{substr_(formatearFecha(tipo.fecha))}}</td>  -->
                            </tr>
                        </tbody>

                        <tbody v-else>
                            <tr>
                                <td colspan="7">
                                    <center>Sin información en la tabla</center>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    </div>

                   
                    <br />
                    <nav>
                        <ul class="pagination">
                            <li class="page-item" v-if="pagination.current_page > 1">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1, buscar)">Ant</a>
                            </li>
                            <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(page, buscar)" v-text="page"></a>
                            </li>
                            <li  class="page-item" v-if="pagination.current_page < pagination.last_page">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1, buscar)">Sig</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </template>
    </main>
</template>

<script>
import moment from 'moment';

export default {
    data() {
        return {
            tituloHeader: 'REPORTE DE HORAS DE EMPLEADOS',
            arrayReporteHoras:[],
            fecha_buscar:'',
            errors: {},


            pagination: {
                total: 0,
                current_page: 0,
                per_page: 0,
                last_page: 0,
                from: 0,
                to: 0,
            },
            offset: 3,
            buscar:'',
           
            date_format:'',
            hora_format:'',
            minutos_format:'',

        };
    },
    computed: {
        isActived: function () {return this.pagination.current_page;},
      
        pagesNumber: function () {
            if (!this.pagination.to) {return [];}

            var from = this.pagination.current_page - this.offset;
            if (from < 1) {from = 1;}

            var to = from + this.offset * 2;
            if (to >= this.pagination.last_page) {to = this.pagination.last_page;}

            var pagesArray = [];
            while (from <= to) {pagesArray.push(from);from++;}
            return pagesArray;
        },
    },
    methods: {
        capitalizarPrimeraLetra:function(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        },

        get_date:function(){   
            moment.locale('es');
            //let fecha = moment().format('MMMM Do YYYY, h:mm:ss a'); // April 21st 2021, 12:15:24 pm
            let day = moment().format('dddd');
            let month = moment().format('MMMM'); 
            let year = moment().format('YYYY');
            let number = moment().format('D');

            let day_f = this.capitalizarPrimeraLetra(day);
            let month_f = this.capitalizarPrimeraLetra(month);
            
            //Lunes 12 de Abril 2021
            this.date_format = day_f +' '+ number+' de '+ month_f+' ' +' '+year;
        },

        format_fecha_hora:function(x, inicio, length){
            let temp = x.substr(inicio, length);
            return temp;
        },

        index:function(page, buscar) {
            console.log(buscar);
            let me = this;
            this.get_date();
            let url = 'reporte-horas?page=' + page + '&fecha=' + buscar;
            axios.get(url).then(function (response) {
                    let temp = response.data;                  
                    me.arrayReporteHoras = temp.reporteHoras.data; 
                    me.pagination = temp.pagination;
                    if(me.arrayReporteHoras.length){
                        me.toastSuccess('Reporte de horas obtenido.')
                    }
            }).catch((error) => {
                let errror =  me.errorResponse(error)
                if (errror.msj){
                    me.toastSInfo('Ocurrió un error en el proceso de consulta de la información.')
                    console.error(errror.msj);
                }
            });
        },

        toastSInfo(mensaje) {
            this.$toast.info(mensaje, {
                position: "top-right",
                timeout: 3000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.29,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
            });
        },

        cambiarPagina:function(page, buscar) {
            let me = this;
            me.pagination.current_page = page;
            me.index(page, buscar);
        },

        errorResponse(error) {
            const {status,errors} = error.response;
            const response = error.response;
            if (status === 500) {
                //console.clear();
                console.error(response.data);
                return response.data;
            } else if (status === 422) {
                console.clear();
                this.errors = error.response.data.errors || {};
                return this.errors;
            } else {
               return error;
            }
        },

        toastSuccess(mensaje) {
            this.$toast.success(mensaje, {
                position: "top-right",
                timeout: 1000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.29,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false
            });
        },
    },
    mounted(){
        this.index(1, '');
    }
};
</script>

<style>
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #2c4f97 !important;
        border-color: #2c4f97 !important;
    }

    .Vue-Toastification__toast--info {
        background-color: #2c4f97 !important;
        color: #fff;
    }
</style>

