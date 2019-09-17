<template>
    <div>
        <div class="card-group">
            <credistInProgress></credistInProgress>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success" v-on:click="setModalNewCustomer()"><i class="fa fa-address-card"></i> Ingresar un nuevo cliente</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <!-- Column -->
                <div class="col-md-12">
                    <div class="card bg-cyan text-white">
                        <div class="card-body ">
                            <div v-if="stCreditsByUser === [] || stCreditsByUser === null">
                                <button class="btn btn-success" v-on:click="setModalNewCustomer()"><i class="fa fa-address-card"></i> Ingresar un nuevo cliente</button>
                            </div>
                            <div v-else>
                            <studyCreditsByUser ></studyCreditsByUser>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->
        <modalNewCustomer v-if="isNewCustomer"
            @closeNewCustomer="closeNewCustomer">
        </modalNewCustomer>
    </div>
</template>
<script>
import credistInProgress from './CreditsInProgress'
import modalNewCustomer from '../Customers/ModalNewCustomer'
import studyCreditsByUser from './StudyCreditsByUser'
export default {
    props:['user'],
    components: {
        credistInProgress,
        modalNewCustomer,
        studyCreditsByUser
    },
    data () {
        return {
            isNewCustomer:      null,
            stCreditsByUser:    null

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
        closeNewCustomer : function() {
            this.isNewCustomer = null
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