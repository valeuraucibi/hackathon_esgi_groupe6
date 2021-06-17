<style scoped>
  .login{
    width: 100%;
    height: calc(100vh - 64px);
    display: flex;
    justify-content: flex-end;
    align-items: center;

    background-image: url("../assets/people-working-modern-flat-design_logo.png");
    background-repeat: no-repeat;
    background-position-x: -20vh;
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
        Register
      </div>
      <div class="card-body">
        <form name="form" @submit.prevent="handleRegister">
          <div v-if="!successful">
<!--            <div class="form-group">-->
<!--              <label for="username">Username</label>-->
<!--              <input-->
<!--                      v-model="user.username"-->
<!--                      v-validate="'required|min:3|max:20'"-->
<!--                      type="text"-->
<!--                      class="form-control"-->
<!--                      name="username"-->
<!--              />-->
<!--              <div-->
<!--                      v-if="submitted && errors.has('username')"-->
<!--                      class="alert-danger"-->
<!--              >{{errors.first('username')}}</div>-->
<!--            </div>-->
            <div class="form-group">
              <label for="email">Email</label>
              <input
                      v-model="user.email"
                      type="email"
                      class="form-control"
                      name="email"
              />
              <div
                      v-if="submitted && errors.has('email')"
                      class="alert-danger"
              >{{errors.first('email')}}</div>
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
                      v-if="submitted && errors.has('password')"
                      class="alert-danger"
              >{{errors.first('password')}}</div>
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm password</label>
              <input
                      v-model="confirm_password"

                      type="password"
                      class="form-control"
                      name="confirm_password"
              />
              <div
                      v-if="submitted && errors.has('confirm_password')"
                      class="alert-danger"
              >{{errors.first('password')}}</div>
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <div class="input-field col s12">
                <select id="role" name="role" v-model="user.roles[0]">
                  <option value="" disabled selected>Role</option>
                  <option value="ROLE_ADVERTISER">Advertiser</option>
                  <option value="ROLE_PUBLISHER">Publisher</option>
                </select>
              </div>
              <div
                      v-if="submitted && errors.has('role')"
                      class="alert-danger"
              >{{errors.first('password')}}</div>
            </div>



            <div class="form-group">
              <button class="btn btn-primary btn-block">Sign Up</button>
            </div>
          </div>
        </form>
        <div
                v-if="message"
                class="alert"
                :class="successful ? 'alert-success' : 'alert-danger'"
        >{{message}}</div>
      </div>
    </div>
  </div>
</template>

<script>
import M from "materialize-css";
import User from '../../models/user';

export default {
  name: "Register",
  data: function() {
    return {
      user: new User( '', '', []),
      confirm_password: "",
      submitted: false,
      successful: false,
      message: '',
      errors: new Map()
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    }
  },
  mounted() {
    if (this.loggedIn) {
      let path = this.$store.state.auth.user.roles.includes("ROLE_ADVERTISER") ? "/newcampaign" : "/websites";
      this.$router.push({path: path});
    }
    M.AutoInit()
  },
  methods: {
    handleRegister() {
      this.message = '';
      this.submitted = true;

          this.$store.dispatch('auth/register', this.user).then(
            (route) =>{
              console.log("[Register] route", route);
              setTimeout(()=>{
                this.$router.push({path:route})
              }, 1200);
            },
              error => {
                this.message =
                        (error.response && error.response.data && error.response.data.message) ||
                        error.message ||
                        error.toString();
                this.successful = false;
              }
          );

    }
  }
};
</script>
