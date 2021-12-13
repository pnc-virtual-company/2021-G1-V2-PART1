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
                    <input  class="password_confirm" type="password" placeholder="Confirm password" v-model="confirmation_password" required/>
                </div>
                <div>
                    <select name="country" id="country" v-model="country">
                        <option value="Cambodia">Cambodia</option>
                        <option value="French">French</option>
                    </select>
                    <select name="nationality" id="nationality" v-model="nationality">
                        <option value="Khmer">Khmer</option>
                        <option value="Cambodian">Cambodian</option>
                    </select>
                </div>

                 <div>
                    <input class="number" type="number" placeholder="Phone number" v-model="phone" required/>
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
            country: "Cambodia",
            nationality: "Cambodian",
            phone: "",
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
            newUser.append('country',this.country);
            newUser.append('nationality',this.nationality);
            newUser.append('phone',this.phone);
            newUser.append('profile',this.image);

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
        margin-top: 3%;
        background: #fff;
        width: 49%;
        padding: 5px;
    }
    #signup{
        margin-bottom: 5%;
    }
    .text,
    .number,
    .email{
        width: 100%;
        margin-bottom: 15px;
        outline: none;
        border:1px solid gray;
        border-radius: 5px;
        padding: 10px;
    }
    .password{
        width: 48%;
        outline: none;
        border:1px solid gray;
        border-radius: 5px;
        padding: 10px;
    }
    .password_confirm{
        margin-left: 2%;
        margin-bottom: 15px;
        outline: none;
        border:1px solid gray;
        border-radius: 5px;
        padding: 10px;
    }
    select{
        width: 49%;
        outline: none;
        padding: 10px;
        border-radius: 3px;
        margin-bottom: 15px;
        border:1px solid gray;
    }
    #nationality{
        margin-left: 2%;
    }
    h3{
        font-size: 30px;
        text-shadow: 1px 1px gray;

    }
    .add_back{
        margin-top: 8%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .next{
        width: 80px;
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
        color:white;
    }
    .back:hover{
        background: rgb(160, 153, 153);
        cursor: pointer;
    }
</style>