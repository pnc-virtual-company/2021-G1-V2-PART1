<template>
    <div class="register">
        <div class="event">
            <h1 id="eventMe">Event me</h1>
        </div>
        
        <form @submit.prevent="createUser">
            <div class="container">
                <h3 id="signup">Register</h3>
                <div>
                    <input class="text" type="text" placeholder="Full name" autofocus v-model="username" required/>
                </div>
                <div>
                    <input class="email" type="email" placeholder="Email" v-model="email" required/>
                </div>
                <div>
                    <input class="password" type="password" placeholder="Password" v-model="password" required/>
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
const API_URL = "http://127.0.0.1:8000/api/";
export default {
    emits: ['new-user'],
    data() {
        return{
            username: '',
            email: '',
            password: '',
            confirmation_password: '',
            image: '',
            errorMessage: "",
            userSignup: true,
            userLists: [],
        }
    },
    methods: {
        // ===========create image ============

        onFileselected(event) {
            this.image = event.target.files[0]
        },
        createUser() {
            const newUser = new FormData();
            newUser.append('name',this.username);
            newUser.append('email',this.email);
            newUser.append('password',this.password);
            newUser.append('password_confirmation',this.confirmation_password);
            newUser.append('profile',this.image);
            console.log(newUser);

            axios.post(API_URL + "signup" , newUser).then(res => {
                console.log(res.data);
                localStorage.setItem('userID', res.data.user.id);
                this.$emit('new-user', this.userSignup);
                this.$router.push('/home');
                console.log("created");
            })
            .catch(error => {
                let status = error.response.status;
                if(status === 422) {
                this.isInvalid = true
                this.errorMessage = 'Invalid command, please create again';
                }
            })

            this.username = '';
            this.email = '';
            this.password = '';
            this.confirmation_password = '',
            this.image = '';
        },

        back() {
            this.$router.push('/signin')
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
    #eventMe{
        font-size: 140px;
        margin-top: 15%;
    }
    form{
        background: #fff;
        width: 49%;
        margin-top: 5%;
        margin-left: 6%;
    }
    #signup{
        margin-bottom: 5%;
    }
    .text,
    .password,
    .email{
        width: 90%;
        height: 7vh;
        margin-bottom: 20px;
        outline: none;
        border:1px solid gray;
        border-radius: 5px;
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
        background: #15910a98;
        color:white;
        border: none;
        font-size: 15px;
        cursor: pointer;

    }
    .next:hover{
       background: #2ea52398;
    }
    .back{
        background: gray;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
        padding: 5px 20px;
        margin-top: 2%;
        color:white;
    }
    .back:hover{
        background: rgb(160, 153, 153);
        cursor: pointer;
    }
</style>