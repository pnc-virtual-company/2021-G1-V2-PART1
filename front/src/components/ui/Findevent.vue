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
                        <button id="quit" @click="unJoin(Event.id)" v-else >Quit</button>
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
            joinEventisVisible: true,
            showDialog: false,
            showFind: false,
            userid: '',
            joinList: [],
            url: 'http://127.0.0.1:8000/storage/imageEvent/',
        };
  },
    methods: {
       
        toJoin(id) {
            let eventjoin = {
                user_id: this.userid,
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
            });
            this.joinEventisVisible = !this.joinEventisVisible;
        },
        ShowDetail(){
            this.showDialog = true;
        },
        cancel(){
            this.showDialog = false;
        },
      
        getJoinslist() {
            axios.get(API_URL + "joins").then(res => {
                this.joinList = res.data;
            })
        },
    
    },
    mounted() {
        this.getJoinslist()
        this.userid = localStorage.getItem('userID');
        // ================Display Orther Event =========
        if(this.Event != null){
            this.showFind = true;
             for(let join of this.Event.join){
                if(this.userid == join.user_id){
                    this.joinEventisVisible = false
                }
            }
        }
    },
    
}
</script>


<style scoped>
    .content{
        display: flex;
        height: 100%;
        justify-content: space-between;
    }
    .main{
        width: 75%;
    }
    .main_content{
        margin-top: 9%;
        display: flex;
        align-items: flex-end;
    }
    .card{
        width: 100%;
        margin-top: 3%;
        height: 25vh;
        padding: 10px;
        border-radius: 10px;
        background:#fff;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
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
        font-size: 15px;
        color: rgb(30, 30, 139);
        margin-left: 40%;
        background: none;
    }
    #showDetail:hover{
        text-decoration: underline;
    }
    img{
        width: 180px;
        height: 100%;
    }
    .body{
        align-items: center;
        justify-content: flex-end;
    }
    #title{
        padding: 5px 20px;
    }

  

</style>
