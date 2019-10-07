<template>
    <div>
        <div id="newCompanyModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Datos de la nueva empresa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">   
<div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <div v-if="imageData"> <a href="#" v-on:click="deleteLogo" ><img :src="imageData" class="img-circle" width="150" /></a></div><div v-else >
                                    <label for="exampleInputEmail1">Seleccione un archivo de imagen .png o .jpg para establecerlo como logo presionando <strong class="danger-text">-Browse-</strong></label>
                                    <div></div>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" @change="previewImage" id="customFileUpdate">
                                    <label class="custom-file-label" for="customFile">Seleccione archivo </label>
                                    <!-- <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.banner }}</span> -->
                                    </div>
                                </div>
                                    <h4 class="card-title m-t-10">{{ company.bs_name || 'RAZON SOCIAL' }}</h4>
                                    <h6 class="card-subtitle">{{ company.acronym || 'Siglas'}}</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <!-- <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div> -->
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
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Informacion</a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Sucursales</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Documentacion</a> </li> -->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left"> <button :class="[step2 === 'success' ? classSuccess : step2 === 'error' ? classDanger : classNorm]"> 1 </button> </div>
                                                <div class="sl-right">
                                                    <div><h4><strong>Datos de la empresa</strong></h4> 
                                                    <!-- <span class="sl-date">5 minutes ago</span> -->
                                                    <div >
                                                    <form class="form-material m-t-40 row">
                                                        <div class="form-group col-md-8 m-t-20">            
                                                                    <FloatingLabel
                                                                        :config="{label: 'NIT (*)', hasError: err.nit, hasClearButton: false }">
                                                                        <input name="nit" v-model="company.nit" type="number" @keyup="validateNit()" @onblur="validateNit()">
                                                                    </FloatingLabel>
                                                                    <span v-if="err.nit" class="text-danger" >{{ err.nit }}</span>
                                                                    <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.nit }}</span>
                                                        </div> 
                                                    
                                                        <div class="form-group col-md-2 m-t-20"> 
                                                                    <FloatingLabel
                                                                        :config="{label: 'DV', hasError: false, hasClearButton: false }">
                                                                        <input name="dv" v-model="company.verification_digit" type="number">
                                                                    </FloatingLabel>
                                                        </div>
                                                        <div class="form-group col-md-12 m-t-20"> 
                                                                <FloatingLabel
                                                                    :config="{label: 'Razon Social (*)', hasError: err.bs_name, hasClearButton: false }">
                                                                    <input name="bs_name" v-model="company.bs_name" type="text">
                                                                </FloatingLabel>
                                                                <span v-if="err.bs_name" class="text-danger" >{{ err.bs_name }}</span>
                                                                <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.bs_name }}</span>
                                                        </div>

                                                        <div class="form-group col-md-12 m-t-20">         
                                                                <FloatingLabel
                                                                    :config="{label: 'Siglas de la empresa', hasError: false, hasClearButton: false }">
                                                                    <input name="acronym" v-model="company.acronym" type="text">
                                                                </FloatingLabel>
                                                        </div>
                                                                


                                                        <div class="form-group col-md-12 m-t-20">         
                                                                <FloatingLabel
                                                                    :config="{label: 'Correo electronico principal (*)', hasError: err.principalMail, hasClearButton: false }">
                                                                    <input name="email" v-model="company.email" type="mail" @keyup="valMailFormat()">
                                                                </FloatingLabel>
                                                                <span v-if="err.principalMail" class="text-danger" >{{ err.principalMail }}</span>
                                                                <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.email }}</span>
                                                        </div>

                                                        <div class="form-group col-md-12 m-t-20">         
                                                                <FloatingLabel
                                                                    :config="{label: 'Telefono oficina principal', hasError: err.principalPhone, hasClearButton: false }">
                                                                    <input name="phone1" v-model="company.phone1" type="text">
                                                                </FloatingLabel>
                                                                <span v-if="err.principalPhone" class="text-danger" >{{ err.principalPhone }}</span>
                                                        </div>

                                                        <div class="form-group col-md-12 m-t-20">         
                                                                <FloatingLabel
                                                                    :config="{label: 'Telefono opcional', hasError: false, hasClearButton: false }">
                                                                    <input name="phone2" v-model="company.phone2" type="text">
                                                                </FloatingLabel>
                                                        </div>

                                                        <div class="form-group col-md-12 m-t-20">         
                                                                <FloatingLabel
                                                                    :config="{label: 'Celular', hasError: false, hasClearButton: false }">
                                                                    <input name="phone3" v-model="company.phone3" type="text">
                                                                </FloatingLabel>
                                                        </div>

                                                        

                                                    </form>
                                                    <div class="form-group col-md-12">
                                                        <span class="muted-text">Direccion principal (*)</span>
                                                            <address-autocomplete @upAddress="upAddress"></address-autocomplete>
                                                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.address }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <v-select id="eventTypeSelect" placeholder="Seleccione la ciudad" :options="cities" v-model="company.city_id"  label="city">
                                                            <template slot="option" slot-scope="option">
                                                                    {{ option.city }}
                                                            </template>
                                                        </v-select>
                                                        <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.city_id }} </span>
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
                        <button type="button" class="btn btn-success waves-effect" @click="storeCompany()">Aceptar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Cancelar</button>                 
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
    props:['companies'],
    components: {
        FloatingLabel,
        AddressAutocomplete,
        toastr
    },
    data () {
        return {
            acepted:      null,
            company: {
                acronym:              '',
                address:              '',
                //afiliation_state_id:  '',
                bs_name:              '',
                created_at:           '',
                email:                '',
                city:                 null,
                city_id:              null,
                companyTypes:         null,
                id_status:            null,
                logo:                 '',
                nit:                  '',
                phone1:               '',
                phone2:               '',
                phone3:               '',
                web:                  '',
            },
            err: {
                nit:                  '',
                bs_name:              '',
                LRNames:              '',
                LRLastNames:          '',   
                LRTypeID:             '',
                LRIdentification:     '',
                LRExpCityID:          '', 
                LRMail:               '',
                address:              '',
                city:                 '',
                principalMail:        '',
                principalPhone:       ''
            },
            imageData:          null,
            logoChanged:        false,
            cities:             [],
            cmpTypes:           [],
            cmpStates:          [],
            idTypes:            [],
            changes:            [],
            cmpStatSel:         null,
            responseTest:       [],
            classNorm:          'btn btn-secondary btn-circle',
            classDanger:        'btn btn-danger btn-circle',
            classSuccess:       'btn btn-success btn-circle',
            step1:              '',
            step2:              '',
            step3:              '',
            step4:              '',
            step5:              '',
            step6:              '',
            per:                0,
            num:                0,
            errors:         []
        }
    },
    created : function (){
        this.getCities()
    },
    mounted : function (){
        $('#newCompanyModal').modal('show');
    },
    methods : {
        getCities() {
            let url = '/api/get-cities';
            axios.get(url).then(response =>{
                this.cities = response.data;
                this.errors = [];
            }).catch(error => {
                this.cities = [];
                this.errors = error.response.data;
            });
        },
        getLogoUpdate : function (e) {
            var fileReader = new FileReader()
            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
            this.company.logo = e.target.result
            }
            this.logoChanged = true
        },
        deleteLogo : function() {
            this.company.logo = ''
            this.imageData = null
            this.logoChanged = false
        },
        previewImage: function(event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        this.getLogoUpdate(event)
        
        },
        findNit : function (nit){
            if(this.companies){
                return this.companies.find(company => company.nit === nit)
            }
        },
        findMail : function (email){
            return this.companies.find(company => company.email === email)
        },
        validateBsName : function (){
            if(this.company.bs_name){
                this.err.bs_name = ''
                return true
            } else {
                this.err.bs_name = 'debe asignar la razon social de la empresa'
                return false
            }
        },
        validateNit : function() {
            let cmpTmp = []
        if(this.company.nit.length !== 9){
             this.err.nit = 'El nit debe contener 9 caracteres'
             return false
         }else{
              this.err.nit = ''
              this.step1 = ''
         }
        if(this.err.nit === ''){
          if(this.findNit(this.company.nit)){
              cmpTmp = this.findNit(this.company.nit)
              this.err.nit = `Este NIT pertenece a la empresa ${cmpTmp.bs_name} y se encuentra inscrito en nuestro sistema`
              this.step1 = 'error'
          }else {
                this.step1 = ''
                return true
            }} else {
                this.step1 = ''
                return true
          }
        },
        valMailFormat : function(){
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            //console.log(re.test(String(this.company.email).toLowerCase()))
            if(!re.test(String(this.company.email).toLowerCase())){
                this.err.principalMail = 'Debe registrar un correo con el formato correcto >>ejemplo@empresa.com<<'
                return false
                }else{
                    if(this.valMailExist()){
                        this.err.principalMail = ''
                        return true
                    }
                   }
        },
        valMailExist : function(){
            let cmpTmp = []
            if(this.findMail(this.company.email)){
                cmpTmp = this.findMail(this.company.email)
                this.err.principalMail = `Este Em@il pertenece a la empresa ${cmpTmp.bs_name} y se encuentra inscrito en nuestro sistema`
                //this.err.principalMail  = 'error'
                return false
            }else {
                    this.err.principalMail = ''
                    return true
                }
            
        },
        termAcept (){
            //this.$emit('setAcept',true);
            $('#newCompanyModal').modal('hide');
            
        },
        upAddress : function(val) {
            this.company.address = val + ' '
        },
        storeCompany(){
            this.company.city_id = typeof(this.company.city_id) == 'object' ? this.company.city_id.id : this.company.city_id;
            this.company.logoChanged = this.logoChanged
            let url = '/api/company'
            axios.post(url, this.company).then(response =>{
                this.$emit('setCompany',response.data.id);
                toastr.success(`ha creado la empresa ${this.company.bs_name}, con exito!`);
                this.$bus.$emit('get-companies')
                $('#newCompanyModal').modal('hide');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        
    }
}

</script>
