<template>
    <div>
        <div v-for="workInformation in workInformations"  :key="workInformation.id" :class="classes.info">
            <h4 class="text-success"><i  class="fa fa-check-circle" ></i> {{ workInformation.bs_name }}</h4> <h4> {{ since(workInformation.init_date) }} </h4>

        </div>
        <modalEditWorkXp v-if="isModalEditWorkXp" :work_infomation_id="idWorkXpSel"></modalEditWorkXp>    
    </div>
</template>
<script>
import moment from 'moment'
moment.locale('es');

import modalEditWorkXp from '../Customers/ModalEditWorkXp'

export default {
    props: ['workInfoByCredStudy'],
    components: {
        moment,
        modalEditWorkXp
    },
    data () {
        return {
            workInformations:       [],
            classes: {
                success:             'alert alert-success',
                info:             'alert alert-info',
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
            this.workInfoByCredStudy.map( (workInfo) => {
                //console.log(workInfo)
                let url = `/api/${workInfo}/get-work-information-by-id`
                axios.get(url).then(response =>{
                    this.workInformations.push(response.data);
                    this.errors = [];
                }).catch(error => {
                    this.workInformations = [];
                    this.errors = error.response.data;
                });
            })

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

