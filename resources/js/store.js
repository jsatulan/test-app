//import createStore from vuex
import { createStore } from 'vuex';
//import UserModule
import UserModule from './modules/userModule';

export default createStore({
    modules: {
        UserModule
    }
});