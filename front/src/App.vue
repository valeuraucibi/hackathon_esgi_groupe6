<style>
body {
    background-image: url("./assets/background.jpeg");
    background-repeat: no repeat;
}

  #navbarElement {
    height: 56px;
    background-color:  #4db6ac !important;
    background-repeat: no-repeat;
    background-size: cover;
    color: #ffffff;
  }
  #router {
    margin-left: 35%;
    padding: 10px; 
    
  }
  #router-login {
    margin-left: 35%;
    padding: 5px; 
  }
  #router-logout {
    margin-left: 5%;
    padding: 5px; 
  }
  #router-home {
    margin-left:5%
  }
  #logo{
        display: flex;
        align-items: center;
        height: 100%;
        margin-left: 4px;
    }

    #logo img{
        height: 75%;
    }

</style>

<template>
<div id="app">
<nav id="navbarElement"> 
    <router-link id="router-home" to="/">Home</router-link>
    <router-link id="router" to="/quiz">Quiz</router-link>
    <router-link id="" to="/tuto">Tutos</router-link>
    <router-link id="router-login" to="/login">Log In</router-link>
  <router-view/>
  <li v-if="logged" ><a @click.prevent="logOut">Log out</a></li>
</nav>

</div>
</template>

