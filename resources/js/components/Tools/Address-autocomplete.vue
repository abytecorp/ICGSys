<template>
 <div>
   <multiselect
     v-model="taggingSelected"
     :options="options"
     :multiple="true"
     :taggable="true"
     @tag="addTag"
     tag-placeholder="Agregar esta como una nueva nomenclatura"
     placeholder="Digite y seleccione la nomenclatura o agregue una nueva"
     label="nomenclature"
     track-by="id">
   </multiselect>


 <span class="text-success">{{ settingAddress(taggingSelected) }}</span>
 </div>
</template>
<script>
import Multiselect from 'vue-multiselect/src/Multiselect.vue'
 export default {
   props: ['address'],
   components: { Multiselect },
   data () {
     return {
       selected: null,
       options: [],
       name:  'name',
       taggingOptions:   [],
       taggingSelected:  []
     }
   },
   created : function (){
     this.setDefaultValue()
   },
   mounted : function () {
     this.getNomenclatures()
     
   },
   methods:  {
     addTag (newTag) {
       const tag = {
         nomenclature: newTag,
         id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
       }
       this.taggingOptions.push(tag)
       this.taggingSelected.push(tag)
     },
       getNomenclatures : function () {
           let url= '/api/address/get-nomenclatures'
           axios.get(url).then(response =>{
               this.options = response.data
           }).catch(error => {
               this.errors = error.response.data
           });
       },
       settingAddress : function(array){
         let string = ''
           array.forEach(function(data) {
             string += data.nomenclature +' '
           })
         this.$emit('upAddress',string)
         return string
       },
       setTag : function(tag){
          this.taggingOptions.push(tag)
          this.taggingSelected.push(tag)
       },
       setDefaultValue : function(){
         if(this.address){
           let res = this.address.split(" ");
           res.forEach(function(addr) {
                let temp = {
                  nomenclature: addr,
                  id: addr.substring(0, 2) + Math.floor((Math.random() * 10000000))
                }
                this.setTag(temp)
           }.bind(this));
         
         } 
       },

   }
 }
</script>



