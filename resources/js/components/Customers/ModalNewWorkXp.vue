<template>
    <div>
        <div id="newWorkXpModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Datos de la nueva empresa</h4>
                        <button type="button" class="close" @click="closeThisModal()"  aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">   
                    <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <!-- <div class="card-body">
                                <center class="m-t-30"> <div v-if="imageData"> <a href="#" v-on:click="deleteLogo" ><img :src="imageData" class="img-circle" width="150" /></a></div><div v-else >
                                    <label for="exampleInputEmail1">Seleccione un archivo de imagen .png o .jpg para establecerlo como logo presionando <strong class="danger-text">-Browse-</strong></label>
                                    <div></div>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" @change="previewImage" id="customFileUpdate">
                                    <label class="custom-file-label" for="customFile">Seleccione archivo </label>
                                    <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.banner }}</span>
                                    </div>
                                </div>
                                    <h4 class="card-title m-t-10">{{ company.bs_name || 'RAZON SOCIAL' }}</h4>
                                    <h6 class="card-subtitle">{{ company.acronym || 'Siglas'}}</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Correo Electronico </small>
                                <h6>{{ company.email || 'Aun no se asigna correo' }}</h6> <small class="text-muted p-t-30 db">Telefono</small>
                                <h6>{{ company.phone1 || 'Aun no se asigna telefono' }}</h6> <small class="text-muted p-t-30 db">Direccion</small>
                                <h6>{{ company.address || 'Un no se asigna direccion' }}</h6>
                                <div class="map-box">
                                    
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                            </div> -->
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Informacion</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left"> <button > 1 </button> </div>
                                                <div class="sl-right">
                                                    <div><h4><strong>INFORMACION LABORAL EN {{ company.bs_name }}</strong></h4> 
                                                    <div >
                                                    <form class="orm-control-line m-t-40 row">
                                                        <div class="form-group col-md-12 m-t-20">            
                                                                    <FloatingLabel
                                                                        :config="{label: 'INGRESOS MENSUALES (COP) *', hasError: err.montly_income, hasClearButton: false }">
                                                                        <input name="nit" v-model="workInformation.montly_income" type="number">
                                                                    </FloatingLabel>
                                                                    <span v-if="err.montly_income" class="text-danger" >{{ err.montly_income }}</span>
                                                                    <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.montly_income }}</span>
                                                        </div> 
                                                        <!-- activity -->
                                                        <!-- <div class="form-group col-md-10 m-t-20"> 
                                                            <v-select :options="activities" v-model="workInformation.activity_id" label="activity" placeholder="seleccione actividad economica">
                                                                <template slot="option" slot-scope="option">
                                                                    {{ option.activity }} 
                                                                </template>
                                                            </v-select>
                                                            <span v-if="err.activity_id" class="text-danger" >{{ err.activity_id }}</span>
                                                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.activity_id }}</span>
                                                        </div>
                                                        <div class="form-group col-md-2 m-t-20"> 
                                                            <a class="btn btn-info" v-if="!isNewActivity" @click="newActivity"><i class="fa fa-plus"></i></a>
                                                            <a class="btn btn-danger" v-if="isNewActivity" @click="newActivity"><i class="fa fa-window-close"></i></a>
                                                        </div>
                                                        <div class="form-group has-success col-md-10 m-t-20" id="inputSuccess1" v-if="isNewActivity">
                                                            <input type="text" placeholder="Digite la actividad a agregar" v-model="newActivitySel.activity" class="form-control form-control-success" />
                                                        </div>
                                                        <div class="form-group col-md-2 m-t-20" v-if="isNewActivity">
                                                            <a class="btn btn-outline-success" @click="storeNewActivity"><i class="fa fa-check-square-o"></i></a>
                                                        </div> -->
                                                        <!-- /activity -->
                                                        <!-- position -->
                                                        <div class="form-group col-md-10 m-t-20"> 
                                                            <v-select :options="positions" v-model="workInformation.position_id" label="position" placeholder="seleccione un cargo">
                                                                <template slot="option" slot-scope="option">
                                                                    {{ option.position }} 
                                                                </template>
                                                            </v-select>
                                                            <span v-if="err.position_id" class="text-danger" >{{ err.position_id }}</span>
                                                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.position_id }}</span>
                                                        </div>
                                                        <div class="form-group col-md-2 m-t-20"> 
                                                            <a class="btn btn-info" v-if="!isNewPosition" @click="newPosition"><i class="fa fa-plus"></i></a>
                                                            <a class="btn btn-danger" v-if="isNewPosition" @click="newPosition"><i class="fa fa-window-close"></i></a>
                                                        </div>
                                                        <div class="form-group has-success col-md-10 m-t-20" id="inputSuccess2" v-if="isNewPosition">
                                                            <input type="text" placeholder="Digite el cargo a agregar" v-model="newPositionSel.position" class="form-control form-control-success" />
                                                        </div>
                                                        <div class="form-group col-md-2 m-t-20" v-if="isNewPosition">
                                                            <a class="btn btn-outline-success" @click="storeNewPosition"><i class="fa fa-check-square-o"></i></a>
                                                        </div>
                                                        <!-- /position -->
                                                        <div class="form-group col-md-12 m-t-20" >
                                                                <FloatingLabel
                                                                    :config="{label: 'Fecha de ingreso a la empresa *', hasError: false, hasClearButton: false }">
                                                                    <input type="date" name="date" v-model="workInformation.init_date" />
                                                                </FloatingLabel>
                                                                <span v-if="err.init_date" class="text-danger" >{{ err.init_date }}</span>
                                                                <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.init_date }}</span>
                                                        </div>
                                                        <div class="form-group col-md-12 m-t-20">         
                                                                <label for="observations">Observaciones</label>
                                                                    <textarea class="form-control" v-model="workInformation.obs" rows="5"></textarea>

                                                                    <span v-if="err.obs" class="text-danger" >{{ err.obs }}</span>
                                                                    <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.obs }}</span>
                                                        </div>

                                                        
                                                        

                                                    </form>
                                                    </div>
     
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>


                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    </div>
                <!-- Row -->
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
import FloatingLabel from 'vue-simple-floating-labels'
import AddressAutocomplete from '../Tools/Address-autocomplete'

import toastr from 'toastr'
export default {
    props:['company_id', 'customer'],
    components: {
        FloatingLabel,
        toastr
    },
    data () {
        return {
            acepted:                null,
            company:                [],
            activities:             [],
            positions:              [],
            workInformation: {
                customer_id:        '',
                montly_income:      '',
                company_id:         '',
                position_id:        '',
                init_date:          '',
                obs:                ''
            },
            err: {
                montly_income:      '',
                activity_id:        '',
                position_id:        ''
            },
            classNorm:          'btn btn-secondary btn-circle',
            classDanger:        'btn btn-danger btn-circle',
            classSuccess:       'btn btn-success btn-circle',
            newActivitySel: {
                activity:           '',
            },
            newPositionSel: {
                position:           '',
            },
            isNewActivity:          null,
            isNewPosition:          null,
            errors:                 []
        }
    },
    created : function (){
        this.getCompanyById()
        this.getActivities()
        this.getPositions()
    },
    mounted : function (){
        $('#newWorkXpModal').modal('show');
    },
    methods : {
        getCompanyById() {
            let url = `/api/${this.company_id}/get-company-by-id`;
            axios.get(url).then(response =>{
                this.company = response.data;
                this.errors = [];
            }).catch(error => {
                this.company = [];
                this.errors = error.response.data;
            });
        },
        getActivities() {
            let url = `/api/get-activities`;
            axios.get(url).then(response =>{
                this.activities = response.data;
                this.errors = [];
            }).catch(error => {
                this.activities = [];
                this.errors = error.response.data;
            });
        },
        getPositions() {
            let url = `/api/get-positions`;
            axios.get(url).then(response =>{
                this.positions = response.data;
                this.errors = [];
            }).catch(error => {
                this.positions = [];
                this.errors = error.response.data;
            });
        },
        storeNewActivity() {
            if(this.newActivitySel.activity !== ''){
            let url = `/api/store-new-activity`
            axios.post(url,this.newActivitySel).then(response =>{
                this.errors = [];
                toastr.success(`Se agrego ${response.data.activity} como actividad satisfactoriamente.`)
                this.newActivitySel = ''
                this.getActivities()
                this.newActivity()
            }).catch(error => {
                this.errors = error.response.data;
            });
            }else{
                toastr.error('Debe digitar la nueva actividad')
            }
        },
        storeNewPosition() {
            if(this.newPositionSel.position !== ''){
            let url = `/api/store-new-position`
            axios.post(url,this.newPositionSel).then(response =>{
                this.errors = [];
                toastr.success(`Se agrego ${response.data.position} como cargo satisfactoriamente.`)
                this.newPositionSel = ''
                this.getPositions()
                this.newPosition()
            }).catch(error => {
                this.errors = error.response.data;
            });
            }else{
                toastr.error('Debe digitar el nuevo cargo')
            }
        },
        newActivity(){
            this.isNewActivity = !this.isNewActivity
        },
        newPosition(){
            this.isNewPosition = !this.isNewPosition
        },
        testing : function() {
            this.workInformation.customer_id = this.customer.id
            this.workInformation.company_id = this.company_id
            this.workInformation.position_id = typeof(this.workInformation.position_id) == 'object' ? this.workInformation.position_id.id : this.workInformation.position_id;
            console.log(this.workInformation)
            let url = `/api/store-new-work-xp`
            axios.post(url,this.workInformation).then(response => {
                toastr.success(`Se agrego la experiencia laboral satisfactoriamente`)
                this.$emit('getWorkExperiencesByCustomer')
                this.closeThisModal()
            }).catch(error =>{
                this.errors = error.response.data;
            });
        },
        closeThisModal : function() {
            $('#newWorkXpModal').modal('hide');
            this.$emit('closeModalNewWorkXp')
        }
        
    }
}

</script>