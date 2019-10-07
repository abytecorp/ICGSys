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
                            <v-select :options="companies" v-model="companySel" placeholder="Digite el nombre de la empresa o el nit" @input="onChange">
                                <template slot="option" slot-scope="option">
                                    {{ option.label }} 
                                </template>
                            </v-select>
                            <span v-if="err.workXp" class="text-danger">{{ err.workXp }}</span>
                            <hr>
                            <button class="btn waves-effect waves-light btn-xs btn-info" @click="setModalNewCompany()">Ingrese una nueva empresa</button>
                            <hr>
                            <workInformations v-if="isWorkInformations"
                                :workInfoByCredStudy="workInfoByCredStudy"
                                :customer_id="creditStudy.customer.id"
                                @setWorkXpToCreditStudy="setWorkXpToCreditStudy"
                                @delWorkXpToCreditStudy="delWorkXpToCreditStudy">
                            </workInformations>
                        </div>
                    </div>
                </div>
                <!-- Card -->

    </tab-content>
    <tab-content title="Validar Informacion"
        icon="fa fa-check-square-o"
        :before-change="valThirdStep">
            <div v-if="creditStudy.customer !== ''" class="d-flex no-block comment-row">
                <div class="comment-text w-100">
                    <h5><strong>Nombre: </strong>{{ creditStudy.customer.name }} {{ creditStudy.customer.first_last_name }} {{ creditStudy.customer.second_last_name }}</h5>
                    <p><strong>Fecha de nacimiento:</strong> {{ since2(creditStudy.customer.birth_date) }} en {{ creditStudy.customer.city }}</p>
                    <p><strong>Direccion:</strong> {{ creditStudy.customer.address }} en {{ creditStudy.customer.city }}</p>
                    <p><strong>Barrio: </strong> {{ creditStudy.customer.neighborhood  }}</p>
                    <p><strong>Celular:</strong>{{ creditStudy.customer.cellphone }}</p>
                    <p><strong>Telefono:</strong>{{ creditStudy.customer.phone }}</p>
                    <p><strong>Correo:</strong>{{ creditStudy.customer.mail }}</p>
                </div>

            </div>
                <workInformationsSelected v-if="isWorkInformationSelected"
                                :workInfoByCredStudy="workInfoByCredStudy">
                </workInformationsSelected>
    </tab-content>
</form-wizard>
            </div>
        </div>
        <!-- <modal-new-external-company v-if="isNewCompany" :companies="companies" @setCompany="setCompany"></modal-new-external-company> -->
    <modalNewWorkXp v-if="isNewCreditStudy && companySel.company_id"
        :company_id="companySel.company_id"
        :customer="creditStudy.customer"
        @closeModalNewWorkXp="closeModalNewWorkXp"
        @getWorkExperiencesByCustomer="getWorkExperiencesByCustomer">
    </modalNewWorkXp>
    </div>
</template>
<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import { Carousel, Slide } from 'vue-carousel';
import FloatingLabel from 'vue-simple-floating-labels'
import workInformations from '../Customers/WorkInformations'
import workInformationsSelected from '../Customers/WorkInformationsSelected'

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
        workInformations,
        workInformationsSelected
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
               customer:    '',
               workXp:      ''
            },
            customers:              [],
            companies:              [],
            companySel:             [],
            isNewCreditStudy:       null,
            isWorkInformations:     false,
            workInfoByCredStudy:    [],
            isWorkInformationSelected:   null,
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
        async storeCreditStudy() {
            return new Promise((resolve, reject) => {
                let credit_study = {}
                credit_study.customer_id = this.creditStudy.customer.id
                credit_study.st_cre_state_id = 1
                console.log(credit_study)
                let url = `/api/store-credit-study`
                axios.post(url, credit_study).then(response =>{
                    resolve(response.data.id)
                }).catch(error => {
                    this.errors = error.response.data;
                    reject(error.response.data)
                });
            })
        },
        async storeWorkExpByCreStudies(study_credit_id, work_information_id) {
            return new Promise((resolve, reject) => {
            let work_exp_by_cre_study = {}
                work_exp_by_cre_study.study_credit_id = study_credit_id
                work_exp_by_cre_study.work_information_id = work_information_id
                work_exp_by_cre_study.status_id = 1
                console.log(work_exp_by_cre_study)
                let url = `/api/store-work-exp-by-credit-study`
                axios.post(url, work_exp_by_cre_study).then(response =>{
                    resolve(response.data.id)
                }).catch(error => {
                    this.errors = error.response.data;
                    reject(error.response.data)
                });
            })
        },
        async onComplete() {
            await this.storeCreditStudy().then((id) =>{
                this.workInfoByCredStudy.forEach(async (work_info) => {
                console.log(work_info)
                    await this.storeWorkExpByCreStudies(id, work_info).then(() => {
                    })
                });
                toastr.success(`Ha registrado un nuevo estudio de credito exitosamente!`)
            }).catch(error =>{
                toastr.error(`ocurrio un error ${error}`)
            })
            this.$emit('endNewCreditStudy')
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
        valSecondStep : function() {
            this.getCompanies();
            this.isWorkInformationSelected = true
            return new Promise((resolve, reject) => {
                this.workInfoByCredStudy.length > 0 ? resolve(true) :  reject('Debe crear y seleccionar por lo menos una experiencia laboral') 
            })
        },
        valThirdStep(){
            return new Promise((resolve, reject) => {
                resolve(true)
            })
        },
        handleErrorMessage : function(errMsg) {
            if(errMsg){
            errMsg.includes('cliente') ? this.err.customer = errMsg : this.err.customer = null
            errMsg.includes('experiencia laboral') ? this.err.workXp = errMsg : this.err.workXp = null
            }
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
            console.log('this is teh value', val)
            this.workInfoByCredStudy.push(val)
            this.forceRerender(this.isWorkInformations)
        },
        delWorkXpToCreditStudy(val) {
            let index = this.workInfoByCredStudy.indexOf(val)
            this.workInfoByCredStudy.splice(index, 1)
            //console.log(index)
        },
        getWorkExperiencesByCustomer(){
            this.isWorkInformations = false;
            this.$nextTick().then(() => {
                this.isWorkInformations = true;
            });
        },
        since2(d){
            return moment(d).format('MMMM Do YYYY')
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
