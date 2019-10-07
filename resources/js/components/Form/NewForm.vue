<template>
    <div>
        <!-- <div class="col-lg-8 col-xlg-9 col-md-7"> -->
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#hone" role="tab"><i class="fa fa-user"></i> Datos Personales</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Informacion laboral</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#crm" role="tab">CRM</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-body">
                                <div class="row">
                        <div class="col-lg-6">
                            <h3 class="box-title m-b-0">Nuevo estudio de credito {{  }}</h3>
                            <p class="text-muted m-b-30 font-13"> Registre los datos de la persona a inscribir.</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group has-danger">
                                <input type="text" class="form-control form-control-danger" id="inputDanger1">
                                <div class="form-control-feedback">Debe ingresar un codigo de aprovación de evidente valido para este procedimiento</div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane active" id="hone" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <br>
                                    <div class="col-lg-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-info" type="button">TI</button>
                                            </div>
                                            <select class="form-control" name="" id="" v-model="customer.document_type_id">
                                                <option v-for="id_type in id_types" :key="id_type.id" :value="id_type.id">{{ id_type.id_type }}</option>
                                            </select>
                                        </div>
                                        <div class="form-control-feedback">Tipo de identificacion</div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="button">Numero de identificaciòn</button>
                                            </div>
                                            <input type="number" v-on:blur="validateIds()" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" v-model="customer.idn">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerNamesId">Nombres</label>
                                        <input type="text" class="form-control" id="customerNamesId" placeholder="Nombres" v-model="customer.name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerFirstLastName">Primer Apellido</label>
                                        <input type="text" class="form-control" id="customerFirstLastName" v-model="customer.first_last_name" placeholder="Primer Apelido">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerSecondLastName">Segundo apellido</label>
                                        <input type="text" class="form-control" id="customerSecondLastName" v-model="customer.second_last_name" placeholder="Segundo Apellido">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label for="customerBornDate">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="customerBornDate" v-model="customer.birth_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label for="customerBornCity">Ciudad de nacimiento</label>
                                            <v-select :options="cities" v-model="customer.born_city"  placeholder="Seleccione la ciudad donde vive" id="customerBornCity" name="customerBornCity" label="city">
                                                <template slot="option" slot-scope="option">
                                                    {{ option.city }} 
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerAddress">Dirección</label>
                                        <input type="text" class="form-control" id="customerAddress" v-model="customer.address" placeholder="Direccion">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerCityLives">Ciudad</label>
                                            <v-select :options="cities" v-model="customer.address_city"  placeholder="Seleccione la ciudad donde vive" id="customerBornCity" name="customerBornCity" label="city">
                                                <template slot="option" slot-scope="option">
                                                    {{ option.city }} 
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerNeighbohoord">Barrio</label>
                                        <input type="text" class="form-control" id="customerNeighbohoord" v-model="customer.neighbothood" placeholder="Barrio">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerCellphone">Celular</label>
                                        <input type="text" class="form-control" id="customerCellphone" v-model="customer.cellphone" placeholder="Celular">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerPhone">Telefono</label>
                                        <input type="text" class="form-control" id="customerPhone" v-model="customer.phone" placeholder="Telefono">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="customerMail">Em@il</label>
                                        <input type="text" class="form-control" id="customerMail" v-model="customer.mail" placeholder="Em@il">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header bg-primary" id="headingOne">
        <h5  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Informaciòn Laboral <strong>{{ company.bs_name }}</strong></h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-10">
                <div class="form-group">
                <label for="companyNit">NIT</label>
                <input type="number" class="form-control" v-on:blur="validateNits()" id="companyNit" v-model="company.nit" placeholder="Numero de Identidad Tributario">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                <label for="companyVerificationDigit">D.V.</label>
                <input type="number" class="form-control" id="companyVerificationDigit" v-model="company.verification_digit" placeholder="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="customerBsName">Razon Social</label>
                <input type="text" class="form-control" id="customerBsName" v-model="company.bs_name" placeholder="Razon social de la empresa">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyAcronym">Siglas</label>
                <input type="text" class="form-control" id="companyAcronym" v-model="company.acronym" placeholder="Siglas de la empresa">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyTypes">Actividad Economica</label>
                <input type="text" class="form-control" id="companyTypes" v-model="company.ec_ac_id" placeholder="Seleccione el tipo de empresa">
                </div>
            </div>
            <br>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyEmail">Em@il</label>
                <input type="text" class="form-control" id="companyEmail" v-model="company.email" placeholder="Siglas de la empresa">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyAddress">Dirección</label>
                <input type="text" class="form-control" id="companyAddress" v-model="company.address" placeholder="Direccion de la empresa">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyCity">Ciudad</label>
                    <v-select :options="cities" v-model="company.city_id"  placeholder="Seleccione la ciudad de la empresa" name="customerBornCity" label="city">
                        <template slot="option" slot-scope="option">
                            {{ option.city }} 
                        </template>
                    </v-select>
                </div>
            </div>
            <br>
            <div class="col-lg-12">
                <div class="form-group">
                <label for="companyWeb">WEB</label>
                <input type="text" class="form-control" id="companyWeb" v-model="company.web" placeholder="Pagina WEB">
                </div>
            </div>
            <br>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyPhone1">Telefono 1</label>
                <input type="text" class="form-control" id="companyPhone1" v-model="company.phone1" placeholder="Telefono 1">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyPhone2">Telefono 2</label>
                <input type="text" class="form-control" id="companyPhone2" v-model="company.phone2" placeholder="Telefono 2">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="companyPhone3">Telefono 3</label>
                <input type="text" class="form-control" id="companyPhone3" v-model="company.phone3" placeholder="Telefono 3">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="workInformationPositionId">Cargo en la empresa:</label>
                <input type="text" class="form-control" id="workInformationPositionId" v-model="work_information.position_id" placeholder="Cargo en la empresa">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="workInformationInitDate">Fecha de inicio:</label>
                <input type="text" class="form-control" id="workInformationInitDate" v-model="work_information.init_date" >
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label for="workInformationObs">Obvservaciones:</label>
                <textarea rows="3" class="form-control" id="workInformationObs" v-model="work_information.obs" ></textarea>
                </div>
            </div>
                                
        </div>
      </div>
    </div>
  </div>
  <div class="card" v-for="work_information in work_informations" :key="work_information.id">
    <div class="card-header bg-primary" id="headingOne">
        <h5  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Informaciòn Laboral <strong>{{ work_information.bs_name }}</strong></h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
                            
                        </div>
                    </div>
                    <div class="tab-pane" id="crm" role="tabpanel">
                        <div class="card-body">
                            <dashBoardCRM></dashBoardCRM>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- Column -->
    <modalAskActionCustomer v-if="isAskActionCustomer" 
        :customer_id="isAskActionCustomer"
        @closeModalAskActionModule="askActionCustomer"
        @getCustomerInfo="getCustomerInfo">
    </modalAskActionCustomer>
    </div>
</template>
<script>

import modalAskActionCustomer from '../Customers/ModalAskActionCustomer';
import dashBoardCRM from '../PanelCRM/DashBoardCRM'

export default {
    props:['user'],
    components: {
        modalAskActionCustomer,
        dashBoardCRM
    },
    data () {
        return {
            customer:               [],
            company:                [],
            work_information:       [],
            work_informations:      [],
            cities:                 [],
            ids:                    [],
            nits:                   [],
            id_types:               [],
            errors:                 [],
            isAskActionCustomer:    false
        }
    },
    created : function() {
        this.getCities()
        this.getIdTypes()
        this.getOnlyIds()
        this.getOnlyNits()
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
        async getCityById(city_id) {
            return new Promise((resolve, reject) => {
                let url = `/api/${city_id}/get-city-by-id`;
                axios.get(url).then(response => {
                    resolve(response.data);
                }).catch(error => {
                    this.errors = error.response.data;
                    reject(error.response.data);
                })
            })
        },
        async getWorkInformationsById(customer_id) {
            return new Promise((resolve, reject) => {
                let url = `/api/${customer_id}/get-work-informations-by-customer-id`;
                axios.get(url).then(response => {
                    resolve(response.data)
                }).catch(error => {
                    this.errors = error.response.data;
                    reject(error.response.data);
                })
            })
        },
        async getCompanyById(company_id) {
            return new Promise((resolve, reject) => {
                let url = `/api/${company_id}/get-company-by-id`;
                axios.get(url).then(response => {
                    console.log(response.data)
                    resolve(response.data);
                }).catch(error => {
                    this.errors = error.response.data;
                    reject(error.response.data);
                })
            })
        },
        getIdTypes() {
            let url = '/api/get-id-types';
            axios.get(url).then(response =>{
                this.id_types = response.data;
                this.errors = [];
            }).catch(error => {
                this.id_types = [];
                this.errors = error.response.data;
            });
        },
        getOnlyIds() {
            let url = '/api/get-only-ids';
            axios.get(url).then(response =>{
                this.ids = response.data;
                this.errors = [];
            }).catch(error => {
                this.ids = [];
                this.errors = error.response.data;
            });
        },
        getOnlyNits() {
            let url = '/api/get-only-nits';
            axios.get(url).then(response =>{
                this.nits = response.data;
                this.errors = [];
            }).catch(error => {
                this.nits = [];
                this.errors = error.response.data;
            });
        },
        validateIds() {
            this.ids.forEach(function(idn) {
                if(idn.idn === this.customer.idn){
                    this.askActionCustomer(idn.id)
                }
            }.bind(this))
        },
        validateNits() {
            this.nits.forEach(async function(nit) {
                if(nit.nit === this.company.nit){
                    try {
                        this.company =  await this.getCompanyById(nit.id);
                        this.company.city_id = await this.getCityById(this.company.city_id);
                        //debugger
                    } catch (error) {
                        console.log(error);
                    }
                }
            }.bind(this))
        },
        askActionCustomer(id) {
            this.isAskActionCustomer === false ? this.isAskActionCustomer = id : this.isAskActionCustomer = false
        },
        async getCustomerInfo(customer){
            try {
                customer.born_city = await this.getCityById(customer.born_city);
                customer.address_city = await this.getCityById(customer.address_city);
                this.work_informations = await this.getWorkInformationsById(customer.id);
                this.customer = customer;
            } catch (error) {
                console.log(error)
            }

        }
    }
    
}
</script>