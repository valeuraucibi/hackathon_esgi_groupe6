import AuthService from '../services/auth.service';

const user = JSON.parse(localStorage.getItem('user'));
const token = localStorage.getItem('token');
const initialState = user
  ? { status: { loggedIn: true }, user: user, token: token }
  : { status: { loggedIn: false }, user: null, token: null };

console.log("[auth.module] initialState", initialState);

export default {
  namespaced: true,
  state: initialState,
  actions: {
    async login({ commit }, user) {
      console.log("[auth_module] login", user);

      return await new Promise((resolve, reject)=>{
        (async(resolve, reject)=>{
          try{
            let newToken = await AuthService.getToken(user);
            let newUser = await AuthService.getUser(user);
            console.log("[auth.module] login newUser", newUser);
            commit('loginSuccess', newUser, newToken);
            let route = newUser.roles.includes("ROLE_ADVERTISER") ? "/newcampaign" : "/websites";
            return resolve(route);
          }catch(error){
            commit('loginFailure');
            return reject(error);
          }
        })(resolve, reject);
      })
    },
    logout({ commit }) {
      console.log("[auth_module] logout");
      AuthService.logout();
      commit('logout');
    },
    register({ commit, dispatch }, user) {
      return AuthService.register(user).then(
        () => {
          commit('registerSuccess');
          dispatch("login", user);
          let route = user.roles.includes("ROLE_ADVERTISER") ? "/newcampaign" : "/websites";
          return Promise.resolve(route);
        },
        error => {
          commit('registerFailure');
          return Promise.reject(error);
        }
      );
    }
  },
  mutations: {
    loginSuccess(state, user, token) {
      console.log("loginSuccess", state, user);
      state.status.loggedIn = true;
      state.token = token;
      state.user = user;
    },
    loginFailure(state) {
      state.status.loggedIn = false;
      state.user = null;
    },
    logout(state) {
      state.status.loggedIn = false;
      state.user = null;
    },
    registerSuccess(state) {
      state.status.loggedIn = false;
    },
    registerFailure(state) {
      state.status.loggedIn = false;
    }
  }


};
