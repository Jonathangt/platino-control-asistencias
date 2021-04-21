<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div style="background-color: #ffffff;" class="card-header">
                <p><b v-text="tituloHeader"></b></p>
            </div>
        </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>


              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Seleccione el tipo de control de asistencia</label>
                    <v-select v-model="registro.tipo_registro"
                       :options="['Entrada', 'Almuerzo Inicio', 'Almuerzo Regreso', 'Salida']" placeholder="Tipo">
                        <template slot="no-options">No existen datos</template>
                    </v-select>
                  </div>           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" @click="registrarAsistencia" class="btn btn-primary">Registrar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
</template>


<script>
import moment from 'moment';

export default {
    data() {
        return {
            tituloHeader: 'REGISTRO DE CONTROL DE ASISTENCIA',
            userData:'',
            estado_marcacion:'',

            //arrayControl:['Entrada', 'Almuerzo Inicio', 'Almuerzo Regreso', 'Salida'],
            registro:{
                tipo_registro:'',
            },

        };
    },  
    methods: {
        registrarAsistencia:function(){	
            if(this.registro.tipo_registro==''){
                this.toastSInfo('Debe de seleccionar el tipo de control de asistencia') 
                return
            }        

            let estado = this.set_estados();
          
            if(estado==0){
                this.toastSInfo('Control de asistencia ya registrado')
                return
            } 

            let me = this;
            let url = 'registrar-asistencia'
            axios.post(url, this.registro).then(response => {
                me.toastSuccess('Registro guardado conaaaa éxito')
                me.get_estados_marcacion();
        
            }).catch(error => {
                let errror =  me.errorResponse(error)
                if (errror.msj){
                    me.toastSInfo(errror.msj)
                    console.error(errror.msj);
                }
            });
        },

        set_estados(){
            if(!this.userData){
                return null;
            }
           
            if(this.registro.tipo_registro=='Entrada'){
                this.estado_marcacion = this.userData.estado_hora_entrada;
            }

            if(this.registro.tipo_registro=='Almuerzo Inicio'){
                this.estado_marcacion = this.userData.estado_almuerzo_inicio;
            }

            if(this.registro.tipo_registro=='Almuerzo Regreso'){
                this.estado_marcacion = this.userData.estado_almuerzo_regreso;
            }

            if(this.registro.tipo_registro=='Salida'){
                this.estado_marcacion = this.userData.estado_hora_salida;
            }
            return this.estado_marcacion;
           
        },

        get_estados_marcacion:function() {           
            this.userData='';
            this.estado_marcacion='';
            this.tipo_registro='';
            
            let me = this;
            let url = 'get-estados-user';
            axios.get(url).then(function (response) {
                let temp = response.data.get_user_data;                  
                me.userData = temp;
                if(me.userData==null){
                    me.userData = '';
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
        this.get_estados_marcacion();
    }
};
</script>

<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #2c4f97 !important;
    }

    .Vue-Toastification__toast--info {
        background-color: #2c4f97 !important;
        color: #fff;
    }

    .vs__dropdown-option--highlight {
        background: #2c4f97 !important;
        color: #fff
    }


</style>