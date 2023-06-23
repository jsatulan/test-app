// import userService
import userService from '../services/userService.js';

// create a const initialState
const initialState = {
    users: [],
};

//create a constant mutations
const mutations = {
    // create a SET_USERS mutation to set the users
    SET_USERS(state, users) {
        state.users = users;
    }
};

//create a constant actions
const actions = {
    // create a getUsers async function that will call the getUserList function from userService
    async getUsers({ commit }) {
        commit('SET_USERS', []);
        await userService.getUsers()
            .then(response => {
                commit('SET_USERS', response.data.data);
            }).catch(error => {
                console.log(error);
            });
    }
};

//create a constant getters
const getters = {
    // create a users function that will return the users
    users: state => state.users,
};

//export all constants above
export default {
    state: initialState,
    mutations,
    actions,
    getters,
    namespaced: true,
};
