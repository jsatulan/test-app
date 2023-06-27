<template>
    <!-- 
    //create a div
    //create a form with the following fields: name, address, email, and contact no
    //create a button with the text "Save"
     -->
    <div class="modal">
        <div class="modal-content">
            <form>
                <div class="form-group mb-1">
                    <label>Name</label>
                    <input v-model="user.name" type="text" class="form-control" placeholder="enter your name">
                </div>
                <div class="form-group mb-1">
                    <label>Address</label>
                    <input v-model="user.address" type="text" class="form-control" placeholder="enter your address">
                </div>
                <div class="form-group mb-1">
                    <label>Email address</label>
                    <input v-model="user.email" type="email" class="form-control" placeholder="enter your email">
                </div>
                <div class="form-group mb-3">
                    <label>Contact No.</label>
                    <input v-model="user.contact_no" type="text" class="form-control" placeholder="enter your contact number">
                </div>
                <div class="form-group">
                    <button @click="closeModal()" type="button" class="btn btn-secondary btn-sm">Cancel</button>
                    <button @click.prevent="manageUser()" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'UserModal',
        //create a prop named 'selectedUser'
        props: {
            selectedUser: {
                type: Object,
                required: true
            }
        },
        //create data for user
        data() {
            return {
                user: {
                    id: '',
                    name: '',
                    address: '',
                    email: '',
                    contact_no: '',
                }
            }
        },
        //create a mounted hook that will pass the selectedUser to the user data
        mounted() {
            //check if the selectedUser is not null
            if (this.selectedUser) {
                this.user = JSON.parse(JSON.stringify(this.selectedUser));
            }
        },
        //create a before destroy hook that will reset the user data
        beforeDestroy() {
            this.user = {
                id: '',
                name: '',
                address: '',
                email: '',
                contact_no: '',
            }
        },
        methods: {
            // Emit the 'closeModal' event to the parent component
            closeModal() {
                this.$emit('closeModal');   
            },
            // Emit the 'addUser' event to the parent component if the user id is null
            // Emit the 'editUser' event to the parent component if the user id is not null
            manageUser() {
                //check if the user id is not null
                let actionName = (this.user.id) ? 'editUser' : 'addUser';

                this.$emit(actionName, this.user);
                this.closeModal();
            }
        },
    }
</script>

<style scoped>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        width: 400px;
    }
</style>