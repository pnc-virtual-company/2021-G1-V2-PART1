<template>
    <div class="card" v-if="displayCard">
        <img src="../../assets/ZiClJf-1920w.jpg" alt="">
        <div class="main">
            <h2 id="title">{{Event.title}}</h2>
            <button id="showDetail" @click = "ShowDetail">Show more</button>

            <div class="body">
                <button id="join" @click="toJoin" v-if="joinEventisVisible" >Join</button>
                <button id="quit" @click ="toJoin" v-else  >Quit</button>
            </div>
        </div>
        <dialog-findevent v-if="showDialog"
                :data="Event"
                @cancel="cancel"
        />
    </div>
</template>

<script>
import DialogFindevent from './DialogFindevent.vue';
import axios from 'axios';
const API_URL = 'http://127.0.0.1:8000/api/';
export default {
    components: { DialogFindevent },
    props: ["Event","showData"],
    data() {
        return {
            joinEventisVisible: true,
            showDialog: false,
            eventLists: [],
            displayCard: true,
        };
  },
  methods: {
    toJoin() {
      this.joinEventisVisible = !this.joinEventisVisible;
    },
    ShowDetail(){
        this.showDialog = true;
    },
    cancel(){
        this.showDialog = false;
    },
    getEvent(){
        axios.get(API_URL + "events").then(res => {
        console.log(res.data);
        this.eventLists = res.data;
        })
    },

  },
  mounted() {
      if(this.Event !== null){
        this.displayCard = false;
      }
  },

};
</script>

<style scoped>
    .card{
        background:#fff;
        width: 30%;
        margin-bottom: 2%;
        height: 55vh;
        padding: 10px;
        border-radius: 10px;
        box-shadow: rgba(60, 64, 67, 0.315) 0px 1px 2px 0px, rgba(60, 64, 67, 0.377) 0px 2px 6px 2px;
    }
    
    button{
        cursor: pointer;
        border: none;
        outline: none;
    }
    #join,
    #quit{
        padding: 5px 25px;
        border: none;
        outline: none;
        border-radius: 15px;
        color: #fff;
        font-size: 13px;
    }
    #join{
        background: rgb(40, 163, 40);
    }
    #quit{
        background: orange;
    }
    #showDetail{
        font-size: 18px;
        margin-top: 10%;
        color: rgb(30, 30, 139);
        margin-left: 35%;
    }
    
    img{
        width: 100%;
        height: 187px;
    }
    .body{
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
    #title{
        padding: 5px;
    }
  

</style>
