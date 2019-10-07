<template>
    <div>
        <div class="row">

                <div class="card">
                    <div class="card-body">
                    <h4>Tareas Comunes</h4>
                        <button class="btn btn-success" v-on:click="setModalNewCustomer()"><i class="fa fa-address-card"></i> Ingresar un nuevo cliente</button>
                        <button class="btn btn-info" v-on:click="setModalNewCustomer()"><i class="fa fa-building"></i> Nueva Empresa</button>
                        <button class="btn btn-secondary" v-on:click="setNewCreditStudy()"><i class="fa fa-archive"></i> Nuevo formulario</button>
                    </div>
                </div>

        </div>
        <newForm></newForm>
        <newCreditStudy v-if="isNewCreditStudy"
            @setModalNewCustomer="setModalNewCustomer"
            @setModalNewCompany="setModalNewCompany"
            @endNewCreditStudy="endNewCreditStudy">
        </newCreditStudy>
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
                <div class="card bg-cyan text-white">
                    <div class="card-body ">
                        <div v-if="stCreditsByUser === [] || stCreditsByUser === null">
                            <button class="btn btn-secondary" v-on:click="setNewCreditStudy()"><i class="fa fa-building"></i> Iniciar Estudio de credito</button>
                        </div>
                        <div v-else>
                            <div v-for="stCreditByUser in stCreditsByUser"  :key="stCreditByUser.id" class="alert alert-info">
                                <h4 class="text-success"><i  class="fa fa-bank" ></i> {{ since(stCreditByUser.created_at) }}</h4> 
                            </div>
                        <!-- <studyCreditsByUser ></studyCreditsByUser> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->
        <modalNewCustomer v-if="isNewCustomer"
            @closeNewCustomer="closeNewCustomer">
        </modalNewCustomer>
        <modalNewCompany v-if="isNewCompany"
            @closeNewCompany="closeNewCompany">

        </modalNewCompany>
        <div class="card-group">
            <credistInProgress></credistInProgress>
            <credistInProgress></credistInProgress>
            <credistInProgress></credistInProgress>

        </div>
    </div>
</template>
<script>
import credistInProgress from './CreditsInProgress'
import modalNewCustomer from '../Customers/ModalNewCustomer'
import studyCreditsByUser from './StudyCreditsByUser'
// import newCreditStudy from './NewCreditStudy'
import modalNewCompany from '../Companies/ModalNewCompany'
import newForm from '../Form/NewForm'

import moment from 'moment'
moment.locale('es');

export default {
    props:['user'],
    components: {
        credistInProgress,
        modalNewCustomer,
        modalNewCompany,
        studyCreditsByUser,
        newForm,
        moment
    },
    data () {
        return {
            isNewCustomer:      null,
            stCreditsByUser:    null,
            isNewCreditStudy:   null,
            isNewCompany:       null

        }
    },
    created : function() {
        //this.getCities();
        this.getStudyCreditsByUser()
    },
    mounted : function(){
    },
    methods : {
        setModalNewCustomer : function() {
            this.isNewCustomer = !this.isNewCustomer
        },
        setModalNewCompany : function() {
            this.isNewCompany = !this.isNewCompany
        },
        setNewCreditStudy : function() {
            this.isNewCreditStudy = !this.isNewCreditStudy
        },
        closeNewCustomer : function() {
            this.isNewCustomer = null
        },
        closeNewCompany : function() {
            this.isNewCompany = null
        },
        getStudyCreditsByUser() {
            let url = `/api/${this.user.id}/get-study-credits-by-user`;
            axios.get(url).then(response =>{
                this.stCreditsByUser = response.data;
                this.errors = [];
            }).catch(error => {
                this.stCreditsByUser = [];
                this.errors = error.response.data;
            });
        },
        endNewCreditStudy() {
            this.getStudyCreditsByUser()
            this.isNewCreditStudy = false
        },
        since(d){
            return moment(d).fromNow();
        }
    }
}
</script>