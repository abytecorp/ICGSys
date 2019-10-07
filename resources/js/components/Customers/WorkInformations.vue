<template>
    <div>
        <div v-for="workInformation in workInformations"  :key="workInformation.id" :class="[ knowIndex(workInformation.id) ? classes.warning : classes.success]">
            <h4 class="text-success"><i  class="fa fa-check-circle" ></i> {{ workInformation.bs_name }}</h4> <h4> {{ since(workInformation.init_date) }} </h4>
            <button class="btn btn-info" @click="viewInfo(workInformation.id)"><i class="fa fa-bars"></i> Ver info</button>
            <button class="btn btn-outline-success" v-if="knowIndex(workInformation.id)" @click="addToSelected(workInformation.id)">Agregar <i class="fa fa-plus" ></i></button>
            <button class="btn btn-outline-danger" v-else @click="deleteToSelected(workInformation.id)">Eliminar <i class="fa fa-times" ></i></button>
        </div>
        <modalEditWorkXp v-if="isModalEditWorkXp" :work_infomation_id="idWorkXpSel"></modalEditWorkXp>    
    </div>
</template>
<script>
import moment from 'moment'
moment.locale('es');

import modalEditWorkXp from '../Customers/ModalEditWorkXp'

export default {
    props: ['customer_id','workInfoByCredStudy'],
    components: {
        moment,
        modalEditWorkXp
    },
    data () {
        return {
            workInformations:       [],
            classes: {
                success:             'alert alert-success',
                warning:            'alert alert-warning'
            },
            isModalEditWorkXp:      false,
            idWorkXpSel:            '',
            errors:                 []
        }
    },
    created : function() {
        this.getWorkInformations();
    },
    methods : {
        since : function(d) {
            return moment(d).fromNow();
        },
        getWorkInformations : function() {
            console.log('goes')
            let url = `/api/${this.customer_id}/get-work-informations-by-customer`
            axios.get(url).then(response =>{
                this.workInformations = response.data;
                this.errors = [];
            }).catch(error => {
                this.workInformations = [];
                this.errors = error.response.data;
            });
        },
        addToSelected(val){
            this.$emit('setWorkXpToCreditStudy',val)
        },
        delToSelected(val){
            this.$emit('delWorkXpToCreditStudy',val)
        },
        inArray(val){
            this.workInfoByCredStudy.map(function(num) {
                if(num == val){
                    return true
                }else{
                    return false
                }
            });
        },
        knowIndex(val){
            let value = true
            this.workInfoByCredStudy.map(id => {
                if(id === val){
                    value = false
                    } 
            })
            return value
        },
        deleteToSelected(val){
            this.$emit('delWorkXpToCreditStudy',val)
        },
        viewInfo(val){
            this.idWorkXpSel === '' ? this.idWorkXpSel = val : this.idWorkXpSel = ''
            this.isModalEditWorkXp = !this.isModalEditWorkXp
        }
    }

}
// 2346524 numero de visita radicado 736437190
</script>

