<template>
    <div class="card" v-if="showFind">
        <div class="content">
            <img :src="url + Event.photo" alt="">
            <div class="main">
                <h2 id="title">{{Event.title}}</h2>
                <div class="main_content">
                    <button id="showDetail" @click = "ShowDetail">Show more</button>
                    <div class="body">
                        <button id="join" @click="toJoin(Event.id)" v-if="joinEventisVisible" >Join</button>
                        <button id="quit" @click="unJoin(Event.id)" v-else  >Quit</button>
                    </div>
                </div>
               
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
    props: ["Event"],
    data() {
        return {
            // eventUserdisplay: [],
            joinEventisVisible: true,
            showDialog: false,
            eventLists: [],
            joinList: [],
            showFind: false,
            url: 'http://127.0.0.1:8000/storage/imageEvent/',
        };
  },
    methods: {
        // userJoined() {
        //     const userid = localStorage.getItem('userID')
        //     for(let event of this.eventLists){
        //         for(let join of this.joinList){
        //             if(event.id == join.event_id && join.user_id == userid){
                            // this.joinEventisVisible = false
        //             }
        //         }
        //     }
        // },

        toJoin(id) {
            let userid = localStorage.getItem('userID');
            let eventjoin = {
                user_id: userid,
                event_id: id,
            }
            axios.post(API_URL+ "joins", eventjoin).then(res => {
                console.log(res.data);
                this.getJoinslist();
            })

            this.joinEventisVisible = !this.joinEventisVisible;
        },
        unJoin(id) {
            let eventid = "";
            for(let join of this.joinList){
                if(join.event_id == id){
                    eventid = join.id;
                }
            }
            axios.delete(API_URL + "joins/" + eventid).then(res => {
                console.log(res.data);
                this.getJoinslist();
            })
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
        // diplayEvent() {
        //     let userid = localStorage.getItem('userID');
        //     for(let event of this.eventLists){
        //         if(event.user_id == userid){
        //             this.eventUserdiaplay.push(event)
        //         }
        //     }
        // },
        getJoinslist() {
            axios.get(API_URL + "joins").then(res => {
            console.log(res.data);
            this.joinList = res.data;
            })
        },
    
    },
    mounted() {
        if(this.Event != null){
            this.showFind = true;
        }
    },
    
}
</script>

<style scoped>
    .content{
        display: flex;
        justify-content: space-between;
    }
    .main{
        width: 75%;
    }
    .main_content{
        margin-top: 8%;
        display: flex;
    }
    .card{
        background:#fff;
        /* margin-top: -5%; */
        width: 55%;
        height: 25vh;
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
        margin-left: 178px;
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
        color: rgb(30, 30, 139);
        margin-left: 38%;
        background: none;
    }
    #showDetail:hover{
        text-decoration: underline;
    }
    img{
        width: 180px;
        height: 21vh;
    }
    .body{
        align-items: center;
        justify-content: flex-end;
    }
    #title{
        padding: 5px;
    }

  

</style>
