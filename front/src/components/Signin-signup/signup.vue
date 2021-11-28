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
                    <input type="text" placeholder="Full name" autofocus v-model="storeName"/>
                </div>
                <div>
                    <input type="text" placeholder="Sex" v-model="storeGender">
                </div>
                <div>
                    <input type="email" placeholder="Email" v-model="storeEmail">
                </div>
                <div>
                    <input type="password" placeholder="Password" v-model="storePassword">
                </div>
                <div>
                    <input type="file" name="fileImg">
                </div>
                <div class="add_back">
                    <button class="back">Back</button>
                    <button class="next">Next</button>
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
        background: #e8eaf6;
        font-family: "Times New Roman", Times, serif;
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
        border: none;
        padding: 7px;
        border-radius: 5px;
        background: #288a1f98;
        color: white;
        margin-left: 35%;
        width: 90px;
    }
    button:hover{
        background: #2c722698;
    }
    .back{
        background: gray;
    }
</style>