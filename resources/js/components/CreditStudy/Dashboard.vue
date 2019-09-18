<template>
    <div>
        <div class="card-group">
            <credistInProgress></credistInProgress>
            <credistInProgress></credistInProgress>
            <credistInProgress></credistInProgress>

        </div>
        <div class="row">

                <div class="card">
                    <div class="card-body">
                    <h4>Tareas Comunes</h4>
                        <button class="btn btn-success" v-on:click="setModalNewCustomer()"><i class="fa fa-address-card"></i> Ingresar un nuevo cliente</button>
                        <button class="btn btn-success" v-on:click="setModalNewCustomer()"><i class="fa fa-address-card"></i> Nueva Empresa</button>
                        <button class="btn btn-success" v-on:click="setNewCreditStudy()"><i class="fa fa-address-card"></i> Iniciar Estudio de credito</button>
                    </div>
                </div>

        </div>
        <newCreditStudy v-if="isNewCreditStudy"
            @setModalNewCustomer="setModalNewCustomer"
            @setModalNewCompany="setModalNewCompany">
        </newCreditStudy>
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
                <div class="card bg-cyan text-white">
                    <div class="card-body ">
                        <div v-if="stCreditsByUser === [] || stCreditsByUser === null">
                            <button class="btn btn-success" v-on:click="setNewCreditStudy()"><i class="fa fa-address-card"></i> Iniciar Estudio de credito</button>
                        </div>
                        <div v-else>
                        <studyCreditsByUser ></studyCreditsByUser>
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
    </div>
</template>
<script>
import credistInProgress from './CreditsInProgress'
import modalNewCustomer from '../Customers/ModalNewCustomer'
import studyCreditsByUser from './StudyCreditsByUser'
import newCreditStudy from './NewCreditStudy'
import modalNewCompany from '../Companies/ModalNewCompany'
export default {
    props:['user'],
    components: {
        credistInProgress,
        modalNewCustomer,
        modalNewCompany,
        studyCreditsByUser,
        newCreditStudy
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
    }
}
</script>