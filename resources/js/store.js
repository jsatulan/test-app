//import createStore from vuex
import { createStore } from 'vuex';
//import UserModule
import * as UserModule from './modules/userModule';

const store = createStore({
    modules: {
        UserModule
    }
});