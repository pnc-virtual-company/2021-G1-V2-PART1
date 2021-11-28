<template>
    <section>
       <div class="register">
            <div class="logoevent">
                <h1>Event me</h1>
            </div>
            
            <form @submit.prevent="createUser">
                <div class="container">
                    <h3>LOG IN</h3>
                    <div>
                        <input type="text" class="text" placeholder="Email Or Mobile Number" autofocus v-model="storeName"/>
                    </div>
                    <div>
                        <input type="password" class="password" placeholder="Password" v-model="storePassword">
                    </div>
                    <div class="forget-1">
                        <p>Forgot password ?</p>
                    </div>
                    <div class="add">
                        <button><router-link v-bind:to="'/menu'" >LOGN IN</router-link></button>
                    </div>
                
                    <div class="signup-1">
                        <p>Have any account?</p>
                        <h4>Sign Up</h4>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>
<script>
export default {
    emits: ["new-user"],
    data() {
        return{
            storeName: '',
            storePassword: '',
        }
    },
    methods: {
        NewUser(){
            this.$emit("new-user", this.storeName, this.storePassword);
            this.storeName = '';
            this.storePassword = '';
        },
    },
}
</script>
<style>
    body{
        background-image: url('https://jooinn.com/images/time-4.jpg');
        background-size: cover;
    }
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        padding: 0;
    }
    .register{
        display: flex;
        justify-content: center;
        align-items: spece-between;
        margin-top: 3%;
        width: 100%;
    }
    .logoevent{
        background-color: #9e9e9e;
        color: white;
        text-shadow: 5px 5px #70625c;
        font-size: 100px;
        display: flex;
        text-align: center;
        justify-content: center;
    }
    form{
        background: #ffffff;
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
        margin-left: 8%;  
    }
    h3{
        font-size: 30px;
        text-shadow: 1px 1px gray;
    }
    .signup-1{
        margin-left: 30%;
        margin-top: 30%;
    }
    h4{
        margin-left: 15%;
        margin-top: -6%;
    }
    .add{
        margin-top: 15%;
    }
    a {
        text-decoration: none;
    }
   
</style>