<template>
    <section>
       <div class="register">
        <div class="logoevent">
            <h1>Event me</h1>
        </div>
        
        <form @submit.prevent="createUser">
            <div class="container">
                <h3>Register</h3>
                <div>
                    <input type="text" placeholder="Full name" autofocus v-model="storeName" required/>
                </div>
                <div>
                    <input type="text" placeholder="Sex" v-model="storeGender" required/>
                </div>
                <div>
                    <input type="email" placeholder="Email" v-model="storeEmail" required/>
                </div>
                <div>
                    <input type="password" placeholder="Password" v-model="storePassword" required/>
                </div>
                <div>
                    <input type="file" name="fileImg">
                </div>
                <div class="add_back">
                     <button class="back">
                        <router-link v-bind:to="'/signin'" > Back</router-link>
                    </button>
                     <button class="next">
                        <router-link v-bind:to="'/menu'" > Next </router-link>
                    </button>
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
            storeEmail: '',
            storePassword: '',
        }
    },
    methods: {
        NewUser(){
            this.$emit("new-user", this.storeName, this.storePassword, this.storeEmail);
            this.storeName = '';
            this.storePassword = '';
            this.storeEmail = ''
        },
    },
}
</script>
    
<style>
    body{
        background-image: url('https://jooinn.com/images/time-4.jpg');
        background-size: cover;

    }
    section{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;
        margin-top: 1%;

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
        width: 50%;
        height: 85vh;
        color: white;
        text-shadow: 5px 5px #70625c;
        font-size: 100px;
        display: flex;
        text-align: center;
        justify-content: center;
    }
    form{
        padding-top: 30px;
        width:50%;
        background: #ffffff;
    }
    input[type=text], input[type=email], input[type=password]{
        width: 90%;
        height: 5vh;
        margin-bottom: 20px;
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
        padding-top: 20px;
    }
    button{
        width: 80px;
        margin-left: 50px;
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
    }
</style>