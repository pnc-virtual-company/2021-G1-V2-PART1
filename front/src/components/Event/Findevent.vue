<template>
    <div class="card">
        <img src="../../assets/ZiClJf-1920w.jpg" alt="">
        <div class="main">
            <h2 id="title">{{ friend.title }}</h2>
            <button id="showDetail" @click = "ShowDetail">Show more</button>

            <div class="body">
                <button id="join" @click = "toJoin" v-if="joinEventisVisible" >Join</button>
                <button id="quit" @click = "toJoin" v-else >Quit</button>
            </div>
        </div>
        <Dialog v-if="showDialog"
                :data="friend"
                @cancel="cancel"
        />
    </div>
</template>

<script>
import Dialog from './Dialog.vue';
export default {
    components: { Dialog },
    props: ["friend"],
    data() {
        return {
            joinEventisVisible: true,
            showDialog: false,
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
        padding: 8px 25px;
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
        margin-top: 15%;
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
