//import axios
import axios from 'axios';

// create a const initialState
const initialState = {
    users: [],
    user: {},
    errorMessage: '',
};

//create a constant mutations
const mutations = {
    // create a SET_USERS mutation to set the users
    SET_USERS(state, users) {
        state.users = users;
    },

    // create a SET_USER mutation to set the user
    SET_USER(state, user) {
        state.user = user;
    },

    // create a SET_USER_ERROR_MESSAGE mutation to set the user error message
    SET_USER_ERROR_MESSAGE(state, errorMessage) {
        state.userErrorMessage = errorMessage;
    }
};

//create a constant actions
const actions = {
    // create a getUsers async function that get axios from the api/user
    async getUsers({ commit }) {
        commit('SET_USERS', []);
        await axios.get('/api/user/')
            .then(response => {
                commit('SET_USERS', response.data.data);
            }).catch(error => {
                console.log(error);
            });
    },

    // create a saveUser async function that get axios from the api/user
    async saveUser({ commit }, user) {
        commit('SET_USER', {});
        await axios.post('/api/user/', user)
            .then(response => {
                commit('SET_USER', response.data.data);
            }).catch(error => {
                //add commit to set the error message
                commit('SET_USER_ERROR_MESSAGE', error.data.message);
            });
    },

    // create a deleteUser async function that delete axios from the api/user
    async deleteUser({ commit }, id) {
        commit('SET_USER', {});
        await axios.delete('/api/user/' + id)
            .catch(error => {
                //add commit to set the error message
                commit('SET_USER_ERROR_MESSAGE', error.data.message);
            });
    },

    // create a updateUser async function that update axios from the api/user
    async updateUser({ commit }, user) {
        commit('SET_USER', {});
        commit('SET_USER_ERROR_MESSAGE', '');
        await axios.put('/api/user/' + user['id'], user)
            .then(response => {
                commit('SET_USER', response.data.data);
            }).catch(error => {
                //add commit to set the error message
                commit('SET_USER_ERROR_MESSAGE', error.data.message);
            });
    }
};

//create a constant getters
const getters = {
    // create a users function that will return the users
    users(state) {
        return state.users;
    },
    // create a errorMessage function that will return the error message
    errorMessage(state){
        return state.errorMessage;
    }
};

//export all constants above
export default {
    state: initialState,
    mutations,
    actions,
    getters,
    namespaced: true,
};
