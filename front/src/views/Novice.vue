<template>

<div class="novice container">
  <title>Les événements météo extrême avec Infoclimat</title>
  <meta name="description" content="Retrouvez tous les événements météo extrêmes de ces dernières années">
  <h1>Les événements météo extrêmes</h1>
  <p>Retrouvez tous les événements météo de votre région en un clic.
</p>
  <div class="row">
    <Map/>
  </div>  
  <div class="row">
    <ResultsTable v-on:testevent="handleEvent"/>
  </div>
</div>
</template>

<script>
import Map from '../components/Map.vue';
import ResultsTable from '../components/ResultsTable.vue';

export default {
    name:'Novice',
    components: {
        Map,
        ResultsTable
    },
    methods: {
      handleEvent() {
        console.log('')
      }
    }
}
</script>

<style>
p {
  font-family: Verdana, sans-serif; 
  color: white;
}
h1 {
  color: black;
  font-family: Verdana, sans-serif; 
}
.novice {
    text-align: center;
}
</style>