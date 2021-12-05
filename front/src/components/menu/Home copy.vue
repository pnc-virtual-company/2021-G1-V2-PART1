<template>
    <section class="home" id="home">
        <div class="content">
            <h3>EVNET ME</h3>
            <span> Event & Join Event </span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae laborum ut minus corrupti dolorum dolore assumenda iste voluptate dolorem pariatur.</p>
            <h1 class="h1para">welcome to event me!!</h1>
        </div>
    </section>
</template>
<style scoped>
    h1{
            text-align: center;
            margin-top: 18%;
        }
    section {
        padding: 2rem 9%;
    }
    .home {
        display: flex;
        align-items: center;
        min-height: 100vh;
        background: url('https://img3.goodfon.com/wallpaper/nbig/7/26/chasy-budilnik-vremya-4010.jpg') no-repeat;
        background-size: cover;
        background-position: center;
    }
    .home .content {
        max-width: 50rem;
    }
    .home .content h3 {
        font-size: 6rem;
        color: #333;
    }
    .home .content span {
        font-size: 3.5rem;
        color: rgb(13, 83, 68);
        padding: 1rem 0;
        line-height: 1.5;
    }
    .home .content p {
        font-size: 1.5rem;
        color: #999;
        padding: 1rem 0;
        line-height: 1.5;
    }
    .h1para {
        display: inline-block;
        margin-top: 1rem;
        border-radius: 5rem;
        background: rgb(13, 83, 68);
        color: #fff;
        padding: .9rem 3.5rem;
        cursor: pointer;
        font-size: 1.7rem;
    }
</style>