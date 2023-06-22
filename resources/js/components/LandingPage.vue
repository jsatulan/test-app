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
                <tr v-for="(user, index) in users" :key="index">
                <td>{{ user.name }}</td>
                <td>{{ user.address }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.contactNo }}</td>
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
    import UserModal from './Modal/UserModal.vue';

    export default {
        name: 'LandingPage',
        components: {
            UserModal
        },
        //create an array of objects with the following properties: name, address, email, and contact no
        data() {
            return {
                users: [
                    {
                        name: 'John Doe',
                        address: '123 Main St',
                        email: 'john@example.com',
                        contactNo: '1234567890',
                    },
                ],
                showModal: false,
                selectedUser: null,
            }
        },
        methods: {
            openModal(user) {
                this.selectedUser = { ...user };
            },
            
            // Emit the 'closeModal' event to the child component
            closeModal() {
                this.showModal = false;
            },
        },
    }
</script>
