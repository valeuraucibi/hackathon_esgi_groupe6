import axios from 'axios';

const server = process.env.VUE_APP_API_SERVER;
const API_URL = process.env[`VUE_APP_${server}_URL`];
const token = process.env[`VUE_APP_${server}_TOKEN`];

var config = {
  headers: {
    Authorization: token ? 'Bearer API-X-TOKEN ' + token : ""
  }
};

console.log("[auth.service] config",config);

class AuthService {

  getUser(user) {
    console.log("[auth.service] getUser");
    if(server==="API_PLATFORM"){
      return axios
          .get(API_URL + "users/?email="+user.email,  config)
          .then(response => {
            if (response.data) {
              localStorage.setItem('user', JSON.stringify(response.data[0]));
              return response.data[0];
            }
          });
    }
    else{
      //Apollo
    }
  }

  getToken(user) {
    console.log("[getToken]", user);
    if(server==="API_PLATFORM"){
      return axios
        .post(API_URL + "authentication_token", {
          email: user.email,
          password: user.password
        },  config)
        .then(response => {
          if (response.data.token) {
            localStorage.setItem('token', response.data.token);
          }
        });
    }
    else{
      //apollo
    }
  }

  logout() {
    console.log("[auth_service_lougout]");
    localStorage.removeItem('user');
    localStorage.removeItem('token');
  }

  register(user) {
    if(server==="API_PLATFORM"){
      console.log("auth_register", user);
      console.log("[auth.service] register", user);
      return axios.post(API_URL + 'users', {
        username: user.username,
        email: user.email,
        password: user.password,
        roles: user.roles
      }, config);
    }
    else{
      // return apolloClient.mutate({ mutation: REGISTER_USER, variables: { ...user } })
      // const token = JSON.stringify(data.createUser.token)
      // commit('SET_TOKEN', token)
      // onLogin(apolloClient, user.token)
      // localStorage.setItem('apollo-token', token)
      // dispatch('setUser')
    }
  }
}

export default new AuthService();
