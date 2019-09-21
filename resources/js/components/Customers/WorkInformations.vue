<template>
    <div>
        <div v-for="workInformation in workInformations"  :key="workInformation.id" :class="inArray(workInformation.id)">
            <h4 class="text-success"><i class="fa fa-check-circle" @click="addToSelected(workInformation.bs_name)"></i>   {{ workInformation.bs_name }}</h4> <h4> {{ since(workInformation.init_date) }} </h4>
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
        inArray(val){
            this.workInfoByCredStudy.map(function(num) {
                if(num === val){
                    return this.classes.success
                }else{
                    return this.classes.warning
                }
            });
        }
    }

}
// 200.71.37.22 200.71.37.1
// 190.157.8.33
// 190.157.8.1



</script>

