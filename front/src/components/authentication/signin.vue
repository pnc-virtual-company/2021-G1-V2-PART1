<template>
       <div class="register">
            <div class="event">
                <h1 id="EventMe">Event me</h1>
            </div>
            
            <form @submit.prevent="LoginUser">
                <div class="container">
                    <h3>LOG IN</h3>
                    <div id="email">
                        <input type="email" class="text" placeholder="Email Or Mobile Number" autofocus v-model="storeEmail"/>
                    </div>
                    <div>
                        <input type="password" class="password" placeholder="Password" v-model="storePassword">
                    </div>
                    <div class="forget-1">
                        <p class="forgot" v-if="isInvalid" style="color:red;">{{errorMessage}}</p>
                        <p class="forgot" v-else style="color:blue;"><router-link v-bind:to="'/signup'" >{{errorMessage}}</router-link></p>
                    </div>
                    <div class="add">
                        <button class="signin" @click="signinUser">SIGN IN</button>
                    </div>
                
                    <div class="signup-1">
                        <p>Have any account?</p>
                        <h4 id="signup" @click="signup">Sign Up</h4>
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
            let user = {
                email: this.storeEmail,
                password: this.storePassword,
            };

            axios.post(API_URL + "/signin",user).then(res => {
                this.users = res.data.user;
                this.$router.push('/home');
                this.$emit("signin-user", this.signin);
                this.errorMessage = 'Login Successfully !';
                localStorage.setItem("userID", res.data.user.id);
            })
            .catch(error => {
                this.isInvalid = true
                console.log(error);
                this.errorMessage = 'Invalid password, please try again';
            })
        },
        signup() {
            this.$router.push('/signup');
        }
  },
}
</script>

<style scoped>
    .register{
        font-family: sans-serif;
        display: flex;
        justify-content: space-between;
        margin-top: 4%;
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
        text-align: center;
    }
    #email{
        margin-top: 7%;
    }
    #EventMe{
        font-size: 140px;
        margin-top: 15%;
    }
    form{
        width: 55%;
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
        margin-top: 10%;
    }
    h3{
        font-size: 30px;
        text-shadow: 1px 1px gray;
    }
    .signup-1{
        margin-left: 31%;
        margin-top: 15%;
    }
    #signup{
        margin-left: 9%;
        text-transform: uppercase;
        font-size: 18px;
        color: rgb(38, 182, 182);
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
        margin-top: 10%;
        margin-left:12%;
    }
    a {
        text-decoration: none;
    }
    .signin{
        width: 30%;
        border: none;
        outline: none;
        border-radius: 5px;
        margin-left: 22%;
        padding: 8px 15px;
        color: white;
        background: teal;
        margin-top: 0%;
    }
    .signin:hover{
        background:rgba(13, 133, 133, 0.788);
        cursor: pointer;
    }
    .forgot:hover{
        text-decoration: underline;
        cursor:pointer;
    }
   
</style>