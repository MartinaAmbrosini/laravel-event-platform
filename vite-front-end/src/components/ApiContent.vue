<script>
  import axios from 'axios';
    export default {
      name: 'ApiContent',
    
    mounted (){
        axios.get ('http://localhost:8000/api/v1/test')
        .then (res=>{
          const data = res.data;
          console.log(data);
        })
        .catch(err=>{
          console.err(err);
        })
    }
    }
</script>





<template>
    <h1>Ciao Sono il COMPONENTE di Prova per Le API</h1>
</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
