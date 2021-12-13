<template>
    <section class="home" id="home">
        <div class="content">
            <h3 id="event">EVENT ME</h3>
            <span> Event & Join Event </span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Beatae laborum ut minus corrupti dolorum dolore assu<br>menda iste voluptate dolorem pariatur.</p>
            <h1 class="h1para">welcome to event me App!!</h1>
        </div>
    </section>
</template>
<style scoped>
    body{
        margin: 0;
        padding: 0;
    }
    h1{
        text-align: center;
    
    }
    .home {
        display: flex;
        align-items: center;
        height: 90vh;
        background: url('https://img3.goodfon.com/wallpaper/nbig/7/26/chasy-budilnik-vremya-4010.jpg') no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
    }
    #event{
        font-size: 80px;
        color: rgb(129, 126, 126);
        text-shadow: 1px 1px 2px black, 0 0 1em white, 0 0 0.2em black;
    }
    .home  span {
        font-size: 3.5rem;
        color: rgb(13, 83, 68);
        padding: 1rem 0;
        line-height: 1.5;
    }
    .home  p {
        font-size: 1.5rem;
        color: #999;
        padding: 1rem 0;
        line-height: 1.5;
    }
    .h1para {
        width: 70%;
        text-align: center;
        border-radius: 5rem;
        background: rgb(13, 83, 68);
        color: #fff;
        padding:10px 20px ;
        cursor: pointer;
        font-size: 1.7rem;
    }
    .content{
        margin-left: 5%;
    }

</style>