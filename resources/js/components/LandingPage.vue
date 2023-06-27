<template>
    <!--
    //create a parent div
    //create a table with the following columns: name, address, email, contact no, and actions(edit and delete)
    //create a button with the text "Add User"
    -->
    
    <div class="container">
        <!-- Create a search bar for searching name -->
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6">
                <div class="form-group">
                    <input v-model="searchValue" type="text" class="form-control" placeholder="Search Name" />
                </div>
            </div>
            <div class="col-md-3">
                <button @click.prevent="filterTableByName()" type="button" class="btn btn-secondary btn-sm">Search</button>
            </div>
        </div>

        <!-- create a button in right side of the search bar with the text "Add User" -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <button @click.prevent="showModal = true" type="button" class="btn btn-primary btn-sm">Add User</button>
                </div>
            </div>
        </div>

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
                <template v-if="(isLoading === true)">
                    <tr>
                        <td colspan="5" class="text-center">Loading...</td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="(user, index) in userLists" :key="index">
                        <td>{{ user.name }}</td>
                        <td>{{ user.address }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.contact_no }}</td>
                        <td>
                            <button @click="editUserInfo(user)" class="btn btn-warning btn-sm">Edit</button>
                            <button @click.prevent="deleteUserInfo(user.id)" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>

        <user-modal 
            v-if="showModal" 
            :selectedUser="selectedUser"
            @closeModal="closeModal" 
            @addUser="addUser"
            @editUser="editUser"
            >
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
                selectedUser: {},
                isLoading: false,
                searchValue: ''
            }
        },
        computed: {
            //get the users from the getters
            ...mapGetters('UserModule', ['users', 'errorMessage']),
        },
        mounted() {
            //call the fetchUsers method
            this.fetchUsers();
        },
        methods: {
            //get the users actions from the store
            ...mapActions('UserModule', [
                'getUsers', 
                'saveUser', 
                'deleteUser',
                'updateUser'
            ]),

            // create a asyc fetchUsers method that will call the getUsers action
            async fetchUsers() {
                this.isLoading = true;
                //await the getUsers action
                await this.getUsers();
                //set the userLists to the users
                this.userLists = this.users;
                this.isLoading = false;
            },

            // create a addUser method that will call the saveUser action
            async addUser(userInfo) {
                this.isLoading = true;
                //await the saveUser action
                await this.saveUser(userInfo);
                //call the fetchUsers method
                this.fetchUsers().then(() => {
                    //close the modal
                    this.isLoading = false;
                });
                //close the modal
                this.closeModal();
            },

            // create a deleteUserInfo method that will call the deleteUser action
            async deleteUserInfo(userId) {
                this.isLoading = true;
                //await the deleteUser action
                await this.deleteUser(userId);
                //check errorMessage if it is not empty, add alert message
                (this.errorMessage !== '') ? alert(this.errorMessage) : alert('User deleted successfully!');
                //call the fetchUsers method
                this.fetchUsers().then(() => {
                    //close the modal
                    this.isLoading = false;
                });
            },

            // create a editUser method that will set the selectedUser to the user
            editUserInfo(user) {
                this.selectedUser = user;
                this.showModal = true;
            },

            // create a editUser method that will call the updateUser action
            async editUser(userInfo) {
                this.isLoading = true;
                //await the updateUser action
                await this.updateUser(userInfo);
                //call the fetchUsers method
                this.fetchUsers().then(() => {
                    //close the modal
                    this.isLoading = false;
                });
                //close the modal
                this.closeModal();
            },
            
            // Emit the 'closeModal' event to the child component
            closeModal() {
                this.showModal = false;
                //reset the selectedUser to empty object
                this.selectedUser = {};
            },

            // create a filterTableByName method that will filter the table by name
            filterTableByName() {
                //check if the searchValue is not empty
                if(this.searchValue !== '') {
                    //filter the userLists by name
                    this.userLists = this.users.filter(user => {
                        return user.name.toLowerCase().includes(this.searchValue.toLowerCase());
                    });
                } else {
                    //set the userLists to the users
                    this.userLists = this.users;
                }
            }
        },
    }
</script>
