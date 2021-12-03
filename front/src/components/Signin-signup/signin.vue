<template>
       <div class="register">
            <div class="event">
                <h1>Event me</h1>
            </div>
            
            <form @submit.prevent="LoginUser">
                <div class="container">
                    <h3>LOG IN</h3>
                    <div>
                        <input type="email" class="text" placeholder="Email Or Mobile Number" autofocus v-model="storeEmail"/>
                    </div>
                    <div>
                        <input type="password" class="password" placeholder="Password" v-model="storePassword">
                    </div>
                    <div class="forget-1">
                        <p class="forgot" v-if="isInvalid" style="color:red;">{{errorMessage}}</p>
                        <p class="forgot" v-else style="color:#6A5ACD;"><router-link v-bind:to="'/signup'" >{{errorMessage}}</router-link></p>
                    </div>
                    <div class="add">
                        <button class="signin" @click="signinUser">SIGN IN</button>
                    </div>
                
                    <div class="signup-1">
                        <p>Have any account?</p>
                        <h4 @click="signup">Sign Up</h4>
                    </div>
                </div>
            </form>

        </div>
</template>
<script>
import axios from 'axios';
const API_URL = "http://127.0.0.1:8000/api";
export default {
    emits: ["signin-user"],
    data() {
        return{
            storeEmail: '',
            storePassword: '',
            errorMessage: 'Forgot pasword',
            isInvalid: false,
            users: "",
            signin: true,
        }
    },
    methods: {
        signinUser() {
            this.$emit("signin-user", this.signin);
            let user = {
                email: this.storeEmail,
                password: this.storePassword,
            };

            axios.post(API_URL + "/signin",user).then(res => {
                this.users = res.data.user;
                // this.$router.push('/menu');
                this.errorMessage = '';
                console.log(this.users);
            })
            .catch(error => {
                let statusCode = error.response.status;
                if(statusCode === 401) {
                this.isInvalid = true
                this.errorMessage = 'Invalid password, please try again';
                }
            })
        },
        signup() {
            this.$router.push('/signup')
        }
  },

}
</script>


<style>
    .register{
        display: flex;
        justify-content: space-between;
        margin-top: 3%;
        width: 70%;
        height: 80vh;
        margin-left: 15%;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
    .event{
        width: 50%;
        background-color: #9e9e9e;
        color: white;
        text-shadow: 5px 5px #70625c;
        font-size: 80px;
        display: flex;
        text-align: center;
        justify-content: center;
    }
    form{
        width: 50%;
    }
    .text, .password{
        width: 90%;
        height: 40px;
        margin-bottom: 10px;
        outline: none;
        border:1px solid gray;
        border-radius: 3px;
    }
    .container{
        font-family: sans-serif;
        height: 70vh;
        margin-left: 8%;  
    }
    h3{
        font-size: 30px;
        text-shadow: 1px 1px gray;
    }
    .signup-1{
        margin-left: 30%;
        margin-top: 20%;
    }
    h4{
        margin-left: 15%;
        margin-top: 3%;
    }
    h4:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    .add{
        margin-top: 15%;
        margin-left:12%;
    }
    a {
        text-decoration: none;
    }
    .signin{
        border: none;
        border-radius: 5px;
        margin-left: 29%;
        padding: 8px 15px;
        background: rgb(91, 172, 54);
        color: white;
    }
    .signin:hover{
        background: rgb(99, 136, 82);
        cursor: pointer;
    }
    .forgot:hover{
        text-decoration: underline;
        cursor:pointer
    }
   
</style>