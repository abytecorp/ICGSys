<template>
    <div>
        <div v-for="workInformation in workInformations"  :key="workInformation.id" :class="[ inArray(workInformation.id) ? classes.success : classes.warning]">
            <h4 class="text-success"><i v-if="knowIndex(workInformation.id)!==-1" class="fa fa-check-circle" @click="addToSelected(workInformation.id)"></i>  <i v-else class="fa fa-window-close" @click="delToSelected(workInformation.id)"></i>  {{ workInformation.bs_name }}</h4> <h4> {{ since(workInformation.init_date) }} </h4>
        </div>    
    </div>
</template>
<script>
import moment from 'moment'
moment.locale('es');

export default {
    props: ['customer_id','workInfoByCredStudy'],
    components: {
        moment
    },
    data () {
        return {
            workInformations:       [],
            classes: {
                success:             'alert alert-success',
                warning:            'alert alert-warning'
            },
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
        knowIndex(){

        }
    }

}
// 2346524 numero de visita radicado 736437190
</script>

