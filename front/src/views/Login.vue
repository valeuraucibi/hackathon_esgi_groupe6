<style scoped>

  .login{
    width: 100%;
    height: calc(100vh - 64px);
    display: flex;
    justify-content: flex-end;
    align-items: center;

    background-image: url("../assets/background.jpg");
    background-repeat: no-repeat;
    /*background-position-y: -10vh;*/
    background-position: absolute;
    background-size: cover;
  }

  .login .card{
    width: 50%;
    padding: 20px;
    margin-right: 80px;
  }

</style>


<template>
  <div class="login mt-5">
    <div class="card">
      <div class="card-header">
        Login
      </div>
      <div class="card-body">
        <form name="form" @submit.prevent="handleLogin">
          <div class="form-group">
            <label for="username">Email</label>
            <input
                    v-model="user.email"
                    type="text"
                    class="form-control"
                    name="email"
            />
            <div
                    v-if="errors.has('email')"
                    class="alert alert-danger"
                    role="alert"
            >Email is required!</div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
                    v-model="user.password"
                    type="password"
                    class="form-control"
                    name="password"
            />
            <div
                    v-if="errors.has('password')"
                    class="alert alert-danger"
                    role="alert"
            >Password is required!</div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" :disabled="loading">
              <span v-show="loading" class="spinner-border spinner-border-sm"></span>
              <span>Login</span>
            </button>
          </div>
          <div class="form-group">
            <div v-if="message" class="alert alert-danger" role="alert">{{message}}</div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import User from '../../models/user';

export default {
  name: 'Login',
  data() {
    return {
      user: new User('', '', '', []),
      loading: false,
      message: '',
      errors: new Map()
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    }
  },
  created() {
    if (this.loggedIn) {
      let path = this.$store.state.auth.user.roles.includes("ROLE_ADVERTISER") ? "/newcampaign" : "/websites";
      this.$router.push({path: path});
    }
  },
  methods: {
    handleLogin() {
      console.log("[Login]");
      this.loading = true;

        if (this.user.email && this.user.password) {
          this.$store.dispatch('auth/login', this.user).then(
                  (data) => {
                    this.$router.push({path: data});
                  },
                  error => {
                    this.loading = false;
                    this.message =
                            (error.response && error.response.data && error.response.data.message) ||
                            error.message ||
                            error.toString();
                  }
          );
        } else{
          this.loading = false;
        }}

  }
};
</script>
