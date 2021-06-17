<template>
<div>
  
  <div class="wrapper">
    <div class="typing-demo">
      L’historique météo d’Infoclimat
    </div>
    <p>Bienvenue sur l’historique météo d’Infoclimat. 
Vous pourrez y retrouver des milliers d’événements extrêmes et plusieurs milliers de séries de valeurs météorologiques. </p>
</div>
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
.wrapper {
  height: 100vh;
  /*This part is important for centering*/
  margin-top: 0%;
  margin-left: 10%;
  justify-content: left;
}

.typing-demo {
  width: 31ch;
  animation: typing 2s steps(22), blink .5s step-end infinite alternate;
  white-space: nowrap;
  overflow: hidden;
  border-right: 3px solid;
  font-family: monospace;
  font-size: 2em;
}

@keyframes typing {
  from {
    width: 0
  }
}
    
@keyframes blink {
  50% {
    border-color: transparent
  }
}
h1 {
  margin-top: 0%;
    color: #c3c3bb;
    font-family: Verdana, sans-serif;
    margin-left: 10%;
}
body{
  width: 100%;
  height:80%;
  position:relative;
  overflow:hidden;
 
}
.container{
  height:80%;
 position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.btn {
    margin-top: calc(30% + 25px);
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
    font-family: 'Verdana', sans-serif;
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
    stroke-width: 4;
    stroke-dasharray: 353, 0;
    stroke-dashoffset: 0;
    -webkit-transition: all 600ms ease;
    transition: all 600ms ease;
}

.btn span{
  background: rgb(255,130,130);
  background: -moz-linear-gradient(left,  rgb(240, 213, 213) 0%, rgba(225,120,237,1) 100%);
  background: -webkit-linear-gradient(left,  rgb(184, 163, 163) 0%,rgba(225,120,237,1) 100%);
  background: linear-gradient(to right,  rgb(138, 129, 129) 0%,rgba(225,120,237,1) 100%);
  
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.btn:hover svg rect {
    stroke-width: 4;
    stroke-dasharray: 196, 543;
    stroke-dashoffset: 437;
}  
</style>

