<template>
    <section>
        <div class="blog-card">
            <div class="search">       
                <h3 class="title-search">Find the event</h3>
                <div class="search-box">
                    <input class="search-txt"  type="text" name="" placeholder="Type to search...">
                    <i class="fas fa-search search-btn"></i>
                </div>        
            </div>

            <!-- // ================Card my event view============================= -->
            <div class="card">
                <div class="container-card">
                    <div class="main">
                        <div class="img">
                            <img class="img-1" src="https://d13kjxnqnhcmn2.cloudfront.net/AcuCustom/Sitename/DAM/052/IoT_-_Main.png" alt="">
                        </div>
                        <div class="text">
                            <span class="blog-category">CATEGORIES NAME</span>
                            <h1>Stay connected with the Internet of Things</h1>
                            <span class="member">6 member going with this event</span>
                        </div>
                    </div>
                    
                    <div class="button">
                        <span class="date">Nov,29 2020 6:00 PM</span>
                        <div class="btn">
                            
                            <button v-if="joinValue" @click="joinEvent" class="Join"><i class="fal fa-check"></i>Join</button>
                            <button v-else @click="unjoinEvent" class="quit"><i class="fas fa-times-circle"></i>Quit</button>
                        </div>
                    </div>
                </div>
                <div class="container-card">
                    <div class="main">
                        <div class="img">
                            <img class="img-1" src="https://d13kjxnqnhcmn2.cloudfront.net/AcuCustom/Sitename/DAM/052/IoT_-_Main.png" alt="">
                        </div>
                        <div class="text">
                            <span class="blog-category">CATEGORIES NAME</span>
                            <h1>Stay connected with the Internet of Things</h1>
                            <span class="member">6 member going with this event</span>
                        </div>
                    </div>
                    
                    <div class="button">
                        <span class="date">Nov,29 2020 6:00 PM</span>
                        <div class="btn">
                            
                            <button v-if="joinValue" @click="joinEvent" class="Join"><i class="fal fa-check"></i>Join</button>
                            <button v-else @click="unjoinEvent" class="quit"><i class="fas fa-times-circle"></i>Quit</button>
                            <!-- <button class="Edit">Edit</button> -->
                        </div>
                    </div>
                
                </div>
            </div>
            
            

            <!-- //==========End cared event============== -->

            
        </div>
        
    </section>
    
</template>

<script>
    export default {
    data() {
        return {
            joinValue: true,
        }
    },
    methods: {
        joinEvent(){
            this.joinValue = !this.joinValue
        },
        unjoinEvent(){
            console.log("Quited")
            this.joinValue = !this.joinValue
        }
    },
    };
</script>



<style >
    body {
    font-family: sans-serif;
}

.card {
    margin-top: 10%;
}
.title-search {
    text-transform: uppercase;
}
.search {
    margin: 65px;
}
.search-box {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  float: left;
  background: #fff;
  height: 15px;
  border-radius: 50px;
  padding: 10px;
  /* margin-top: 15px; */
  margin-right: 20px;
  box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
  
}
.search-btn {
  color: #050505;
  height: 20px;
  width: 20px;
  line-height: 24px;
  font-size: 30px;
}
.search-txt {
  border: none;
  background: none;
  outline: none;
  padding: 0;
  color: black;
  font-size: 12px;
  transition: 0.4s;
  line-height: 20px;
  width: 200px;
}
.fa-search {
    font-size: 15px;
    margin-right: 5px;
}
.blog-card {
    padding: 10px 0;
    height: 90vh;
    width: 200vw;
    max-width: 850px;
    border-radius: 20px;
    margin: auto;
    margin-top: 10px;

}
.container-card {
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    margin-left: 10px;
    margin-top: 10px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background: #ffff;
    margin: auto;
    margin-top: 10px;
    border-radius: 25px;
    width: 700px;
    height: 85px;
    
}
.main{
    width: 75%;
    height: 18vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.text{
    width: 79%;
    border: none;
    height: 16vh;
}


h1{
    font-size: 15px;
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 15px;
    margin-bottom: 7%;

}
.blog-category{
    font-size: 12px;
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
.Join{
    display: inline-block;
    padding: 10px 20px;
    border: none;
    float: right;
    font-size: 10px;
    font-weight: 500;
    text-transform: uppercase;
    color: #ffff;
    letter-spacing: 1px;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    border: none;
    background: rgb(63, 199, 63);
}
.quit {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    float: right;
    font-size: 10px;
    font-weight: 500;
    text-transform: uppercase;
    color: #ffff;
    letter-spacing: 1px;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    border: none;
    background: rgb(243, 130, 24);
}
.fal {
    font-size: 10px;
    margin-right: 5px;
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
.button{
    width: 25%;
}
.btn{
    margin-top: 15%;
}
.date{
    margin-left: 12%;
    font-size: 15px;
}
.fa-times-circle {
    font-size: 10px;
    margin-right: 5px;
}
</style>

