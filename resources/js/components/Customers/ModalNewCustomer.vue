<template>
    <div>
        <div id="newCustomerModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Información personal</h4>
                        <button type="button" class="close" @click="closeModal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" v-on:submit.prevent="storeCustomer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label muted" >Tipo de identificación (*)</label>
                                    <select class="form-control" v-model="customer.id_type">
                                        <option v-for="idType in idTypes" :key="idType.id" :value="idType.id">{{ idType.id_type }}</option>
                                    </select>
                                     <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.id_type }}</span>
                                </div>
                                <FloatingLabel
                                    :config="{label: 'Identificación (*)', hasError: err.idn, hasClearButton: false }">
                                    <input type="number" class="form-control" name="identificationInput" id="identificationInput" v-model="customer.idn">
                                    <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.idn }}</span>
                                </FloatingLabel>
                            </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Nombres  (*)', hasError: err.name, hasClearButton: false }">
                            <input type="text" class="form-control" name="nameInput" id="nameInput" v-model="customer.name">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.name }}</span>
                        </FloatingLabel>
                        </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Primer Apellido (*)', hasError: err.first_last_name, hasClearButton: false }">
                            <input type="text" class="form-control" name="firstLastNameInput" id="firstLastNameInput" v-model="customer.first_last_name">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.first_last_name }}</span>
                        </FloatingLabel>
                        </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Segundo Apellido (*)', hasError: err.second_last_name, hasClearButton: false }">
                            <input type="text" class="form-control" name="secondLastNameInput" id="secondLastNameInput" v-model="customer.second_last_name">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.second_last_name }}</span>
                        </FloatingLabel>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <h6 class="text-muted" for="">       Fecha de nacimiento (*)</h6>
                        <FloatingLabel
                            :config="{label: '', hasError: err.birth_date, hasClearButton: false }">
                            <input type="date" class="form-control" name="birthDayInput" id="birthDayInput" v-model="customer.birth_date">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.birth_date }}</span>
                        </FloatingLabel>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <h6 class="text-muted" for="">       Lugar de nacimiento (*)</h6>
                            <v-select :options="cities" v-model="customer.born_city" placeholder="Seleccione la ciudad donde vive" id="bornCity" name="bornCity" label="city">
                                <template slot="option" slot-scope="option">
                                    {{ option.city }} 
                                </template>
                            </v-select>
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.born_city }}</span>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <h6 class="text-muted" for="">       direccion de residencia (*)</h6>
                        <hr>

                            <address-autocomplete @upAddress="upAddress"></address-autocomplete>
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.address }}</span>
                        <hr>
                        </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Barrio (*)', hasError: err.neighborhood, hasClearButton: false }">
                            <input type="text" class="form-control" name="neighborhoodInput" id="neighborhoodInput" v-model="customer.neighborhood">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.neighborhood }}</span>
                        </FloatingLabel>
                        </div>
                        <div class="col-md-12">
                            <h6 class="text-muted" for="">       Ciudad de residencia (*)</h6>
                            <v-select :options="cities" v-model="customer.address_city" placeholder="Seleccione la ciudad donde vive" id="addressCity" name="addressCity" label="city">
                                <template slot="option" slot-scope="option">
                                    {{ option.city }} 
                                </template>
                            </v-select>
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.born_city }}</span>
                        </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Telefono', hasError: err.phone, hasClearButton: false }">
                            <input type="text" class="form-control" name="phoneInput" id="phoneInput" v-model="customer.phone">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.phone }}</span>
                        </FloatingLabel>
                        </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Celular (*)', hasError: err.cellphone, hasClearButton: false }">
                            <input type="text" class="form-control" name="celInput" id="celInput" v-model="customer.cellphone">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.cellphone }}</span>
                        </FloatingLabel>
                        </div>
                        <div class="col-md-12">
                        <FloatingLabel
                            :config="{label: 'Em@il', hasError: err.mail, hasClearButton: false }">
                            <input type="text" class="form-control" name="mailInput" id="mailInput" v-model="customer.mail" @keypress="valMailFormat()">
                            <span v-for="error in errors" class="text-danger" :key="error.error">{{ error.mail }}</span>
                            <span class="text-danger">{{ err.mail }}</span>
                        </FloatingLabel>
                        </div>
                        
                        <hr>
                        <!-- <button type="submit" class="btn btn-info waves-effect text-left">Guardar</button> -->
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect" @click="storeCustomer">Aceptar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" @click="closeModal">Cancelar</button>                 
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
import toastr from 'toastr';
import 'toastr/build/toastr.css';
import FloatingLabel from 'vue-simple-floating-labels';
import vSelect from 'vue-select';
Vue.component( 'v-select', vSelect );
import 'vue-select/dist/vue-select.css';

import AddressAutocomplete from '../Tools/Address-autocomplete';
export default {
    props: ['company_id'],
    components: {
        toastr,
        FloatingLabel,
        AddressAutocomplete,
        },
    data () {
        return {
            customer:   {
                name:                   '',
                first_last_name:        '',
                second_last_name:       '',
                birth_date:             '',
                born_city:              '',
                id_type:                '',
                idn:                    '',
                address_city:           '',
                address:                '',
                neighborhood:           '',
                phone:                  '',
                cellphone:              '',
                mail:                   ''
            },
            err:    {
                name:                   '',
                first_last_name:        '',
                second_last_name:       '',
                birth_date:             '',
                born_city:              '',
                id_type:                '',
                idn:                    '',
                address_city:           '',
                address:                '',
                phone:                  '',
                cellphone:              '',
                mail:                   ''
            },
            idTypes:        [],
            cities:         [],
            errors:         [],
        }
    },
    created : function() {
        this.getCities()
        this.getIdTypes()
    },
    mounted : function(){
        $('#newCustomerModal').modal('show');
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
        getIdTypes() {
            let url = '/api/get-id-types';
            axios.get(url).then(response =>{
                this.idTypes = response.data;
                this.errors = [];
            }).catch(error => {
                this.idTypes = [];
                this.errors = error.response.data;
            });
        },
        storeCustomer : function() {
            this.customer.born_city = typeof(this.customer.born_city) == 'object' ? this.customer.born_city.id : this.customer.born_city;
            this.customer.address_city = typeof(this.customer.address_city) == 'object' ? this.customer.address_city.id : this.customer.address_city;
            this.customer.document_type_id = typeof(this.customer.id_type) == 'object' ? this.customer.id_type.id : this.customer.id_type;
            console.log(this.customer)
            var url = '/api/assistants-external';
            axios.post(url, this.customer).then(response => {
                toastr.success(`Se ha creado el cliente ${this.customer.name} ${this.customer.first_last_name} con exito!`);
                $('#newCustomerModal').modal('hide');
                this.$emit('closeNewCustomer');
            }).catch(error => {
                //this.assistant = {}
                this.errors = error.response.data
            });
        },
        upAddress(val){
            this.customer.address = val
        },
        closeModal(){
            $('#newCustomerModal').modal('hide');
            this.$emit('closeNewCustomer');
        },
        valMailFormat : function(){
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            //console.log(re.test(String(this.company.mail).toLowerCase()))
            if(!re.test(String(this.customer.mail).toLowerCase()) && this.customer.mail){
                this.err.mail = 'Debe registrar un correo con el formato correcto >>ejemplo@empresa.com<<'
                return false
                }else{
                    this.err.mail = ''
                    return true
                   }
        },
        
    }
}
</script>