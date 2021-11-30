<template>
    <section>
        <router-view></router-view>
        <div class="blog-card">
            <div class="search">       
                <h3 class="title-search">Find the event</h3>
                <input class="input-search" type="text" id="mySearch" onkeyup="myFunction()" placeholder=" Search the event..." title="Type in a category"> 
                <!-- <i class="far fa-search"></i>    -->
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
                        
                        <button class="Join"><i class="fal fa-check"></i>Join</button>
                        <!-- <button class="Edit">Edit</button> -->
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
                        
                        <button class="Join"><i class="fal fa-check btn-search"></i>Join</button>
                        <!-- <button class="Edit">Edit</button> -->
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
                        
                        <button class="quit"><i class="fas fa-times-circle"></i>Quit</button>
                        <!-- <button class="Edit">Edit</button> -->
                    </div>
                </div>
               
            </div>
            </div>
            
            

            <!-- //==========End cared event============== -->


        </div>
    </section>
</template>

<style >
    body {
    font-family: sans-serif;
}

.card {
    margin-top: 10%;
}


/* .search-txt {
  border: none;
  background: none;
  outline: none;
  padding: 0;
  color: white;
  font-size: 12px;
  transition: 0.4s;
  line-height: 20px;
  width: 0px;
  
} */
.search {
    width: 250px;
    /* background: rgb(89, 78, 78); */
    margin-left: 70px;
    margin-bottom: 50px;
}
.input-search {
   
    color: #ffffff;
    height: 25px;
    width: 150px;
    line-height: 15px;
    font-size: 11px;
    border: none;
    outline: none;
    background: rgb(170, 169, 169);
    border-radius: 10px;
}
.title-search {
    text-transform: uppercase;
    font-weight: 900px;
}









.blog-card {
    /* position: absolute; */
    padding: 10px 0;
    height: 90vh;
    width: 200vw;
    max-width: 850px;
    border-radius: 20px;
    margin: auto;
    margin-top: 10px;


    /* background: rgba(72, 69, 69, 0.2); */
    /* box-shadow: 0px 10px 50px rgba(252, 56, 56, .3); */
}
.container-card {
    margin-left: 10px;
    margin-top: 10px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background: #b6b3b3dc;
    margin: auto;
    
    margin-top: 10px;
    border-radius: 25px;
    width: 700px;
    height: 85px;
    box-shadow: 0px 10px 50px rgba(255, 255, 255, 0.426);
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
}
.member{
    margin-top: 7%;
}

h1{
    font-size: 20px;
    font-weight: 540;
    text-transform: uppercase;
    margin-top: -1px;
}
.blog-category{
    font-size: 12px;
    margin-top: -5%;
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
.fas {
    
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
</style>

