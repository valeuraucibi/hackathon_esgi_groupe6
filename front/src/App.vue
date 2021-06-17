<style>

  #navbarElement {
    height: 56px;
    background-color: #438491;
    color: #FAFEFF;
  }
  #router {
    margin-left: 20px;
    padding: 10px; 
  }
  #router-login {
    margin-left: 70%;
    padding: 5px; 
  }
  #router-logout {
    margin-left: 5%;
    padding: 5px; 
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
    <router-link id="router" to="/">Home</router-link>
    <router-link id="router" to="/quiz">Quiz</router-link>
    <router-link id="router-logout" to="/login">Log In</router-link>
  <router-view/>
  <li v-if="logged" ><a @click.prevent="logOut">Log out</a></li>
</nav>
</div>
</template>

