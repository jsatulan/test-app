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
                    <input v-model="user.contactNo" type="text" class="form-control" placeholder="enter your contact number">
                </div>
                <div class="form-group">
                    <button @click="closeModal" type="button" class="btn btn-secondary btn-sm">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'UserModal',
        //create a prop named 'user'
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        //create data for user
        data() {
            return {
                user: {
                    name: '',
                    address: '',
                    email: '',
                    contactNo: '',
                }
            }
        },
        methods: {
            // Emit the 'closeModal' event to the parent component
            closeModal() {
                this.$emit('closeModal');   
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