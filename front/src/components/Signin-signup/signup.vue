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
                <div class="add_back">
                     <button @click="back" class="back"> Back</button>
                     <button @click="createUser" class="next"> Next</button>
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
            confirmation_password: '',
            storeImage: null,
        }
    },
    methods: {
        onFileselected(event) {
            this.storeImage = event.target.files[0].name
            console.log(this.storeImage);
        },
        createUser() {
            this.$emit("new-user", this.storeName,this.storeEmail, this.storePassword,this.confirmation_password);
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
    
<style>
    section{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;

    }
    .register{
        display: flex;
        justify-content: center;
        align-items: spece-between;
        margin-top: 4%;
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
    button{
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
        margin-left: 10px;
    }
</style>