<template>
    <h1>Site Config Page</h1>
</template>

<script>
import {getTest} from '../../api/api'
    export default {
     mounted() {
      getTest().then(data=>{
        console.log(data);
        console.log(data.data.data);
      });
     } 
    }
</script>
