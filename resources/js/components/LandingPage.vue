<template>
    <!--
    //create a parent div
    //create a table with the following columns: name, address, email, contact no, and actions(edit and delete)
    //create a button with the text "Add User"
    -->
    
    <div class="container">
        <button @click.prevent="showModal = true" type="button" class="btn btn-primary btn-sm">Add User</button>
        <table class="table">
            <thead>
                <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in userLists" :key="index">
                <td>{{ user.name }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.contact_no }}</td>
                <td>
                    <button @click="openModal(user)" class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
                </tr>
            </tbody>
        </table>

        <user-modal v-if="showModal" @closeModal="closeModal">
        </user-modal>
  </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    import UserModal from './Modal/UserModal.vue';

    export default {
        name: 'LandingPage',
        components: {
            UserModal
        },
        //create an array of objects with the following properties: name, address, email, and contact no
        data() {
            return {
                userLists: [],
                showModal: false,
                selectedUser: null,
            }
        },
        computed: {
            //get the users from the getters
            ...mapGetters('UserModule', ['users']),
        },
        created() {
            //call the fetchUsers method
            this.fetchUsers();
        },
        methods: {
            //get the users actions from the store
            ...mapActions('UserModule', ['getUsers']),

            // create a asyc fetchUsers method that will call the getUsers action
            async fetchUsers() {
                //await the getUsers action
                await this.getUsers();
                //set the userLists to the users
                this.userLists = this.users;
            },
            
            // Emit the 'closeModal' event to the child component
            closeModal() {
                this.showModal = false;
            },
        },
    }
</script>
