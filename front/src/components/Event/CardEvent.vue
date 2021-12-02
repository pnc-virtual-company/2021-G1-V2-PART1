<template>
    <section>
        <div class="blog-card">
            <!-- <div class="bg"></div> -->
            <div>       
                <button class="Create"> <router-link to="/EventForm" ><i class="fa fa-plus"></i> CREATE EVENT </router-link></button>     
            </div>

            <!-- // ================Card my event view============================= -->

            <div class="container-card">
                <div class="main">
                    <div class="img">
                        <img class="img-1" src="https://d13kjxnqnhcmn2.cloudfront.net/AcuCustom/Sitename/DAM/052/IoT_-_Main.png" alt="">
                    </div>
                    <div class="text">
                        <h1>Stay connected</h1>
                        <div class="time">
                            <p class="date">Nov,29 2020 6:00 PM</p>
                            <p class="member">6 members</p>
                        </div>
                    </div>
                </div>
                   
                <div class="rightCard">
                    <p class="categories">Categories name</p>
                    <div class="btn">
                        <button @click="showDialog = true" class="Delete">Delete</button>
                        <button class="Edit">Edit</button>
                    </div>
                </div>
               
            </div>
            <!-- //=============Dialog Btn====================== -->

            <Dialog :show="showDialog" 
                    :cancel="cancel" 
                    :confirm="confirm" 
                    title="You want to Delete this?" 
                    description="Are you sure?" />

            <!--=======================End cared event========================== -->

        </div>
    </section>
</template>
<script>


import Dialog from './Dialog.vue'
export default {
  components: { Dialog},
  data () {
    return {
      showDialog: false
    }
  },

  methods: {
    cancel() {
      console.log('cancel')
      this.showDialog = false
    },
    confirm() {
      console.log('confirm')
      this.showDialog = false
    }
  },
}
</script>


<style scoped>


.blog-card {
    font-family: sans-serif;
    padding: 10px 0;
    height: auto;
    width: 200vw;
    max-width: 850px;
    border-radius: 20px;
    margin: auto;
    background-size: cover;
}
.container-card {
    margin-left: 10px;
    margin-top: 90px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background: #fff;
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    margin: auto;
    margin-top: 10px;
    border-radius: 25px;
    width: 700px;
    height: 90px;
}
.main{
    width: 75%;
    height: 18vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.text{
    width: 80%;
    border: none;
    font-size: 10px;
    font-family: sans-serif;

}

.member{
    font-size: 15px;
}

h1{
    font-size: 18px;
    margin-top: 9%;
    font-weight: 540;
    text-transform: uppercase;
}
.img{
    margin-left: 5px;
    height: 90px;
    width: 90px;
  
}
.img img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: .6s;
    border-radius: 10px;
}
.content{
    padding: 10px;
    width: 530px;
}

.Delete, .Edit{
    display: inline-block;
    padding: 10px 20px;
    border: none;
    float: right;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    color: #ffff;
    letter-spacing: 1px;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    border: none;
    background: rgb(218, 37, 37);
  
}
.Edit{
    background: rgb(53, 158, 32);
    margin-right: 10px;
}

.Create {
    margin: 30px;
    margin-right: 70px;
    display: inline-block;
    padding: 15px 20px;
    border: none;
    float: right;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    color: #ffff;
    letter-spacing: 1px;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    border: none;
    background: rgba(112, 120, 242, 0.987);
}
a{
    color: white;
    text-decoration: none;
}
.rightCard{
    width: 25%;
}
.time{
    width: 70%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: -3%;
}
.date{
    font-size: 15px;
}
.categories{
    margin-top: 5px;
    margin-left: 22px;
    font-size: 17px;
}
.btn{
    margin-top: 20%;
}
</style>
