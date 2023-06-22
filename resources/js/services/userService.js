import axios from 'axios';

// create UserServiceApiClient that will be used to call the API
const UserServiceApiClient = axios.create({
    baseURL : '/api/user',
    headers : {
        Accept : 'application/json',
        'Content-Type' : 'application/json'
    }
});

// create export default object
export default {
    // create a get user list function with `user` parameters
    getUserList(user) {
        return UserServiceApiClient.get('/', { params: user });
    },

    // create a get user function with `id` parameters
    getUser(id) {
        return UserServiceApiClient.get(`/${id}`);
    },

    // create a delete user function with `id` parameters
    deleteUser(id) {
        return UserServiceApiClient.delete(`/${id}`);
    },

    // create a update user function with `id` parameters
    updateUser(id) {
        return UserServiceApiClient.put(`/${id}`);
    }

};
