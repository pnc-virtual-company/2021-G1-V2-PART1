<template>
    <div class="register">
        <div class="event">
            <h1>Event me</h1>
        </div>
        
        <form @submit.prevent="createUser">
            <div class="container">
                <h3>Register</h3>
                <div>
                    <input class="text" type="text" placeholder="Full name" autofocus v-model="storeName" required/>
                </div>
                <div>
                    <input class="email" type="email" placeholder="Email" v-model="storeEmail" required/>
                </div>
                <div>
                    <input class="password" type="password" placeholder="Password" v-model="storePassword" required/>
                </div>

                 <div>
                    <input  class="password" type="password" placeholder="Confirm password" v-model="confirmation_password" required/>
                </div>

                <div>
                    <input type="file" name="fileImg" @change="onFileselected">
                </div>
                <p style="color:red;">{{errorMessage}}</p>
                <div class="add_back">
                     <button @click="back" class="back"> Back</button>
                     <button @click="createUser" class="next"> Next</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
const API_URL = "http://127.0.0.1:8000/api";
export default {
    // emits: ["new-user"],
    data() {
        return{
            storeName: '',
            storeEmail: '',
            storePassword: '',
            confirmation_password: '',
            storeImage: null,
            errorMessage: "",
            userLists: [],
        }
    },
    methods: {
        // ===========create image ============

        onFileselected(event) {
            this.storeImage = event.target.files[0].name
            console.log(this.storeImage);
        },
        createUser() {
           let newUser = {
            name: this.storeName ,
            email: this.storeEmail,
            password: this.storePassword,
            password_confirmation: this.confirmation_password,
            }
            axios.post(API_URL + "/signup" , newUser).then(res => {
            this.userLists.push(res.data.user);
            this.$router.push('/menu');
            console.log("created");
            })
            .catch(error => {
                let statusCode = error.response.status;
                if(statusCode === 422) {
                this.isInvalid = true
                this.errorMessage = 'Invalid command, please create again';
                }
            })

            this.storeName = '';
            this.confirmation_password = '',
            this.storePassword = '';
            this.storeEmail = '';
        },

        back() {
            this.$router.push('/signin')
        }
    },
    
}
</script>
    
<style scoped>

    .text,
    .password{
        width: 90%;
        height: 5vh;
        margin-bottom: 20px;
        outline: none;
        border:1px solid gray;
        border-radius: 5px;
    }
    .email{
        width: 90%;
        height: 7vh;
        margin-bottom: 10px;
        outline: none;
        border:1px solid gray;
        border-radius: 5px;
    }
    .container{
        margin-left: 10%;
    }
    h3{
        font-size: 30px;
        text-shadow: 1px 1px gray;

    }
    .add_back{
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding-top: 20px;
    }
    .next{
        width: 80px;
        margin-left: 100px;
        height: 5vh;
        border-radius: 5px;
        background-color: #15910a98;
        color:white;
        border: none;
        font-size: 15px;
        cursor: pointer;

    }
    .back{
        background: gray;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
        padding: 7px 20px;
        margin-top: 2%;
        color:white;
    }
    .back:hover{
        background: rgb(170, 164, 164);
        cursor: pointer;
    }
</style>