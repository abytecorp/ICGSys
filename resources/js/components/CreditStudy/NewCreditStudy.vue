<template>
    <div>
        <div class="card">
            <div class="card-body">
        
<form-wizard 
    @on-complete="onComplete"
    @on-validate="handleValidation"
    @on-error="handleErrorMessage"
    shape="circle"
    back-button-text="Atras"
    next-button-text="Siguiente"
    finish-button-text="Finalizar"
    color="#2395D2"
    error-color="#e74c3c"
>
         <h2 slot="title"></h2>
    <tab-content title="Datos del cliente..."
        icon="fa fa-user"
        :before-change="valFirstStep">
            <div class="col-lg-12 col-md-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h6 class="text-muted" for=""> Seleccione un cliente(*)</h6>
                            <v-select :options="customers" v-model="creditStudy.customer" @input="setCustomer" placeholder="Digite el nombre del cliente o su numero de identificación" id="customer" name="customers" label="label">
                                <template slot="option" slot-scope="option">
                                    {{ option.label }} 
                                </template>
                            </v-select>
                            <span v-if="err.customer" class="text-danger">{{ err.customer }}</span>
                            <hr>
                            <button class="btn waves-effect waves-light btn-xs btn-info" @click="newCustomer()">Ingrese un nuevo cliente</button>
                        </div>
                    </div>
                </div>
                <!-- Card -->
            </div>
    </tab-content>
    <tab-content title="Exp. Laboral"
        icon="fa fa-building-o"
        :before-change="valSecondStep">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h6 class="text-muted" for=""> Seleccione la empresa donde trabaja(*)</h6>
                            <v-select :options="companies" v-model="companySel" placeholder="Digite el nombre del cliente o su numero de identificación" @input="onChange">
                                <template slot="option" slot-scope="option">
                                    {{ option.label }} 
                                </template>
                            </v-select>
                            <span v-if="err.customer" class="text-danger">{{ err.customer }}</span>
                            <hr>
                            <button class="btn waves-effect waves-light btn-xs btn-info" @click="setModalNewCompany()">Ingrese una nueva empresa</button>
                            <hr>
                            <workInformations v-if="isWorkInformations"
                                :workInfoByCredStudy="workInfoByCredStudy"
                                :customer_id="creditStudy.customer.id">
                            </workInformations>
                        </div>
                    </div>
                </div>
                <!-- Card -->

    </tab-content>
    <tab-content title="Asistentes"
        icon="fa fa-users"
        :before-change="valFourthStep">
    </tab-content>
</form-wizard>
            </div>
        </div>
        <!-- <modal-new-external-company v-if="isNewCompany" :companies="companies" @setCompany="setCompany"></modal-new-external-company> -->
    <modalNewWorkXp v-if="isNewCreditStudy && companySel.company_id"
        :company_id="companySel.company_id"
        :customer="creditStudy.customer"
        @closeModalNewWorkXp="closeModalNewWorkXp"
        @getWorkExperiencesByCustomer="getWorkExperiencesByCustomer"
        @setWorkXpToCreditStudy="setWorkXpToCreditStudy">
    </modalNewWorkXp>
    </div>
</template>
<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import { Carousel, Slide } from 'vue-carousel';
import FloatingLabel from 'vue-simple-floating-labels'
import workInformations from '../Customers/WorkInformations'
import moment from 'moment'
import toastr from 'toastr'

import modalNewWorkXp from '../Customers/ModalNewWorkXp'

import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);

//import companyCard from './External-inscription/Company-card'
//import modalNewExternalCompany from './External-inscription/Modal-new-external-company'
//import AssistantsPanel from './External-inscription/Assistants-panel'

export default {
    props: ['event'],
    components: {
        FormWizard,
        TabContent,
        FloatingLabel,
        moment,
        toastr,
        modalNewWorkXp,
        workInformations
        //companyCard,
        //modalNewExternalCompany,
        //AssistantsPanel,
    },
    data () {
        return {
            creditStudy: {
                customer:           [],
            },
            err:    {
               customer:    ''
            },
            customers:              [],
            companies:              [],
            companySel:             [],
            isNewCreditStudy:       null,
            isWorkInformations:     false,
            workInfoByCredStudy:    [],
            errors:                 []
        }
    },
    created : function() {
        this.getCustomers()
        this.getCompanies()
        this.$bus.$on('get-companies', () => {
            this.getCompanies()
        })
    },
    methods : {
        getCustomers() {
            let url = '/api/get-customers';
            axios.get(url).then(response =>{
                this.customers = response.data;
                this.errors = [];
            }).catch(error => {
                this.customers = [];
                this.errors = error.response.data;
            });
        },
        getCompanies(){
            let url = '/api/get-companies-api';
            axios.get(url).then(response =>{
                this.companies = response.data;
                this.errors = [];
            }).catch(error => {
                this.companies = [];
                this.errors = error.response.data;
            });
        },
        setAcept (val){
            this.isAcepted = val
        },
        onComplete() {
           
        },
        handleValidation(){

        },
        handleErrorMessage(){

        },
        valFirstStep : function() {
            return new Promise((resolve, reject) => {
                this.creditStudy.customer === null || this.creditStudy.customer.length === 0 ? reject('Debe seleccionar o crear un cliente') :  resolve(true); 
                this.err.customer= false
            })
        },
        setBillOrderDate() {
            if(this.record.bill_order_date){
                this.err.bill_order_date = '';
                return true
            }else{
                this.err.bill_order_date = 'Debe seleccionar la fecha cuando recibira la factura';
                return false
            }
        },
        setPayWay() {
        if(this.record.pay_way){
                this.err.pay_way = '';
                return true
            }else{
                this.err.pay_way = 'Debe seleccionar elmetodo de pago!';
                return false
            }
        },
        valSecondStep : function() {
            this.getCompanies();
            return new Promise((resolve, reject) => {
                !this.record.is_bill_order ? resolve(true) : !this.record.bill_order_date ? reject('Debe seleccionar la fecha cuando desea recibir la factura') : 
                !this.record.pay_way  ? reject('Debe establecer el metodo de pago') : resolve(true); this.err.bill_order_date= false ; this.err.pay_way = false
            })
        },
        valThirdStep(){
            return new Promise((resolve, reject) => {
                !this.record.company_id ? reject('Debe seleccionar o crear la empresa!') : 
                resolve(true); this.err.company_id= false ; this.err.company_id = false
            })
        },
        valFourthStep(){
            return new Promise((resolve, reject) => {
                this.record.isSus.length == 0 ? reject('Debe inscribir al menos un asistente!') : 
                resolve(true); this.err.isSus = false ; this.err.isSus = false
            })
        },
        handleErrorMessage : function(errMsg) {
            if(errMsg){
            errMsg.includes('cliente') ? this.err.customer = errMsg : this.err.customer = null
            }
        },
        valMailFormat : function(){
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            //console.log(re.test(String(this.company.email).toLowerCase()))
            if(!re.test(String(this.record.enroll_email).toLowerCase()) && this.record.enroll_email){
                this.mailInError = true
                this.err.enroll_email = 'Debe registrar un correo con el formato correcto >>ejemplo@empresa.com<<'
                return false
                }else{
                    this.err.enroll_email = ''
                    this.mailInError = false
                    return true
                   }
        },
        on(value) {
            this.record.is_bill_order = value;
        },
        setModalNewCompany(){
            this.$emit('setModalNewCompany')
        },
        setCompany(val){
            let url = `/api/${val}/get-company-by-id`;
            axios.get(url).then(response =>{
                this.record.company_id = response.data;
                this.record.company_id.label = response.data.bs_name
                this.getCompanies();
                this.errors = [];
            }).catch(error => {
                this.record.company_id = [];
                this.errors = error.response.data;
            });
        },
        closeCompany(){
            this.record.company_id = null
        },
        setIsSus(val){
            this.record.isSus.push(val);
        },
        restart(){
            location.reload();
        },
        newCustomer(){
            console.log('is a new!')
            this.$emit('setModalNewCustomer')
        },
        onChange(){
            this.companySel.company_id = this.companySel.company_id
            this.isNewCreditStudy = !this.isNewCreditStudy
        },
        closeModalNewWorkXp(){
            this.companySel = null
            this.isNewCreditStudy = !this.isNewCreditStudy
        },
        setCustomer(){
            this.forceRerender(this.isWorkInformations)
            if(this.creditStudy.customer){
            this.isWorkInformations = true
            }else{
                this.isWorkInformations = false
            }
        },
        forceRerender(module) {
            // Remove my-component from the DOM
            module = false;
            // If you like promises better you can
            // also use nextTick this way
            this.$nextTick().then(() => {
                // Add the component back in
                module = true;
            });
        },
        setWorkXpToCreditStudy(val) {
            this.workInfoByCredStudy.push(val)
            this.forceRerender(this.isWorkInformations)
        }
    }
}
</script>
<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .39s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
