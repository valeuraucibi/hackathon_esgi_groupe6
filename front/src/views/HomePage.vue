<template>
<div>
  <h1>L’historique météo d’Infoclimat</h1>
  <p>Bienvenue sur l’historique météo d’Infoclimat. 
Vous pourrez y retrouver des milliers d’événements extrêmes et plusieurs milliers de séries de valeurs météorologiques. </p>
  <div class="container">
  <a href="/login" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>
    
  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <span>Expert</span>
</a>
<a href="/novice" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>
     
  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <span>Novice</span>
</a>
<a href="/Quiz" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>
  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <span>Jeunes</span>
</a>
</div>
</div>
</template>

<script>
export default {
  name: 'HomePage',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
  color:black;
  font-family: Verdana, sans-serif; 
}
p {
  font-family: Verdana, sans-serif; 
}
body{
  width: 100%;
  height:80%;
  position:relative;
  overflow:hidden;
 
}
.container{
  height:100%;
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
}
p {
  margin-left: 5%;
  color:black;
}
.btn {
    margin-top: calc(20% + 0px);
    position: relative;
    display: inline-block;
    width: 277px;
    height: 50px;
    font-size: 1em;
    font-weight: bold;
    line-height: 60px;
    text-align: center;
    text-transform: uppercase;
    background-color: transparent;
    cursor: pointer;
    text-decoration:none;
    font-family: 'Roboto', sans-serif;
    font-weight:900;
    font-size:17px;
    letter-spacing: 0.045em;
}

.btn svg {
    position: absolute;
    top: 0;
    left: 0;
}

.btn svg rect {
    stroke: #78cdf5;
    stroke-width: 4;
    stroke-dasharray: 353, 0;
    stroke-dashoffset: 0;
    -webkit-transition: all 600ms ease;
    transition: all 600ms ease;
}

.btn span{
  background: rgb(255,130,130);
  background: -moz-linear-gradient(left,  rgba(255,130,130,1) 0%, rgba(225,120,237,1) 100%);
  background: -webkit-linear-gradient(left,  rgba(255,130,130,1) 0%,rgba(225,120,237,1) 100%);
  background: linear-gradient(to right,  rgb(117, 233,255) 0%,rgba(162,119,167,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff8282', endColorstr='#e178ed',GradientType=1 );
  
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btn:hover svg rect {
    stroke-width: 4;
    stroke-dasharray: 196, 543;
    stroke-dashoffset: 437;
}
   
</style>
