<template>
    <div>
        <div id="askActionCustomerModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">El cliente <strong> {{ customer.name }} </strong>  con cedula <strong>{{ customer.idn }}</strong> </h4>
                        <button type="button" class="close" @click="closeThisModal()"  aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">   
                        <h5>{{ customer.name }} {{ customer.first_last_name }} {{ customer.second_last_name }} ya cuenta con estos procesos de ventas en el sistema:</h5>
                        <ol v-for="study_credit in study_credits" :key="study_credit.id"  class="breadcrumb bc-colored m-b-30 bg-success">
                            <div class="col-12 m-t-30">
                                <div class="text">
                            Realizado por <strong> {{ study_credit.first_name }}  {{ study_credit.last_first_name }}  </strong>
                            <strong>{{ since(study_credit.created_at) }}</strong> para ser mas exactos se registro en {{ sinceHour(study_credit.created_at) }} y su estado actual en el sistema es <strong>{{ study_credit.study_credit_state }}</strong>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-info">Continuar</button>
                                </div>
                            </div>
                        </ol>
                        <div class="card text">
                            <p>O solo desea importar su informacion personal para continuar con el estudio de credito actual?</p>
                            <button class="btn btn-success" @click="getCustomerInfo">Importar información</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect" @click="testing()">Aceptar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light"  @click="closeThisModal()">Cancelar</button>                 
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal --> 
    </div>
</template>
<script>

import toastr from 'toastr'
import moment from 'moment'
moment.locale('es');

export default {
    props:['customer_id'],
    components: {
        toastr,
        moment
    },
    data () {
        return {
            acepted:                null,
            customer:                [],
            study_credits:           []
        }
    },
    created : function (){
        this.getCreditStudies()
    },
    mounted : function (){
        $('#askActionCustomerModal').modal('show');
    },
    methods : {
        since(d){
            return moment(d).fromNow();
        },
        sinceHour(d){
            return moment(d).format('MMMM Do YYYY, h:mm:ss a');
        },
        async getCustomerById() {
            return new Promise((resolve, reject) => {
            let url = `/api/${this.customer_id}/get-customer-by-id`;
            axios.get(url).then(response =>{
                this.customer = response.data;
                this.errors = [];
                resolve(response.data.id)
            }).catch(error => {
                this.customer = [];
                this.errors = error.response.data;
                reject()
            });
            })
        },
        async getCreditStudies() {
            let customer_id = await this.getCustomerById()
            let url = `/api/${customer_id}/get-credit-studies-by-customer`;
            axios.get(url).then(response =>{
                this.study_credits = response.data;
                this.errors = [];
            }).catch(error => {
                this.study_credits = [];
                this.errors = error.response.data;
            });
        },
        closeThisModal : function() {
            $('#askActionCustomerModal').modal('hide');
            this.$emit('closeModalAskActionModule')
        },
        getCustomerInfo() {
            this.$emit('getCustomerInfo',this.customer);
            this.closeThisModal();
        }

        
    }
}

</script>