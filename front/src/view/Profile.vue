<template>
  
    <div class="main_box">
        <div class="sidebar_menu">
            <!-- ======ul>li*8>a======= -->
            <div class="menu">
                <ul>
                    <li><a href="#"><router-link v-bind:to="'/Manage_profile'" ><i class="fal fa-user-circle"></i>
                        Profile</router-link></a></li>
                    <li style="font-size:13px;">
                        <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span></label>Dark mode
                    </li>
                    <li><a href="#"><i class="fal fa-bell"></i>
                        Notification</a></li>
                    <li><a href="#"><i class="fas fa-calendar-week"></i>
                        Events</a></li>
                   <li><router-link to="/about" ><i class="fas fa-question-circle"></i>
                        About</router-link></li>
                    <li><router-link to="/service" ><i class="fas fa-sliders-h"></i>
                        Services</router-link ></li>
                   <li><a href="#"><i class="fal fa-cog"></i>
                        Setting</a></li>
                </ul>
            </div> 
        </div>
    </div>
</template>

<script>
    export default {
        emits: ['sign-out'],
        data(){
            return{
                signoutUser: false,
            }
        },
        methods: {
            signout(){
                this.$emit('sign-out', this.signoutUser);
                localStorage.clear();
                console.log("Sign out | " + this.signoutUser);
            },
        },
    }
</script>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
 
    .main_box{
        position: relative;
        height: 90vh;
        border: none;
        width: 20%;
        margin-top: -20px;
        background: rgba(5, 5, 5, 0.966);
    }
    .main_box .sidebar_menu {
        box-shadow: 0 0 6px rgba(255, 255, 255, 0.5);
    }
    .sidebar_menu .logo{
        position: absolute;
        width: 100%;
        height: 60px;
        box-shadow: 0 0 6px rgba(255, 255, 255, 0.5);
    }
    .sidebar_menu .logo a {
        color: #fff;
        font-size: 25px;
        font-weight: 500;
        position: absolute;
        line-height: 60px;
        text-decoration: none;
    }
    .sidebar_menu .menu {
        position: absolute;
        width: 100%;
    }
     .sidebar_menu .menu li {
         margin-top: 6px;
         padding: 14px 20px;
         transition: all 0.3s linear;
     }
     .sidebar_menu .menu a {
         color: #fff;
         text-decoration: none;
     }
    .sidebar_menu .menu li:hover {
        border-left: 1px solid #fff;
        box-shadow: 0 0 4px rgba(255, 255, 255, 0.5);
    }
    .sidebar_menu .social_media{
        position: absolute;
        left: 20px;
        bottom: 20px;
        cursor: pointer;
    }
    .social_media a{
        float: left;
        font-size: 1px;
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
    }
    .sidebar_menu i {
        padding: 0 5px;
        color: #fff;
        opacity: 0.6;
        font-size: 20px;
        transition: all 0.2s linear;
    }
    .social_media i:hover {
        opacity: 1;
    }
    #check {
        display: none;
    }
    .main_box .btn_one i {
        color: #fff;
        font-weight: 700;
        position: absolute;
        left: 16px;
        line-height: 60px;
        cursor: pointer;
        opacity: 1;
        transition: all 0.3s linear;
    }
    .sidebar_menu .btn_two i {
        line-height: 60px;
        position: absolute;
        cursor: pointer;
        opacity: 0;
        transition: all 0.3s linear;
    }
    .btn-one i:hover {
        font-size: 29px;
    }
    .btn-one i:hover {
        font-size: 24px;
    }
    #check:checked ~.sidebar_menu {
        left: 0px;
    }
     #check:checked ~ .btn_one i {
        opacity: 0;
    }
    #check:checked ~.sidebar_menu  .btn_two i {
        opacity: 1;
    }
    li{
        color: #fff;
    }
    ul li{
        list-style: none;
    }
    ul li a{
        font-size: 13px;
    }
    /* =============Dark mode style ================= */

    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
        margin-right: 5px;
        }

    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgb(100, 93, 93);
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 19px;
        width: 19px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #5397ce;
    }



    input:checked + .slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(18px);
        transform: translateX(14px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    
</style>