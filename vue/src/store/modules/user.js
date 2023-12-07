// src/store/modules/user.js
const state = {
    user: {},
  };

  const getters = {
    getUserDetails: (state) => state.user,
  };
  
  const mutations = {
    SET_USER_DETAILS(state, userDetails) {
      state.user = userDetails;
    },
    CLEAR_USER_DETAILS(state) {
      state.user = {};
    },
  };
  
  const actions = {
    setUserDetails({ commit }, userDetails) {
      commit('SET_USER_DETAILS', userDetails);
    },
    clearUserDetails({ commit }) {
      commit('CLEAR_USER_DETAILS');
    },
    getUser(state) {
        return state.user
    },
    // Add your other actions here
  };
  
  export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
  };
  