<template>
    <section>
        <div class="cateAndBtn">
            <h3>Category</h3>
            <div class="btnCreate">
                <button @click="createCategory" class="CtCreate">Create</button>
            </div>
        </div>
        <div class="search">
        <input type="search" name="search" id="" placeholder="Search...">
    </div>
    <div class="category">
      
        <div class="veiwCard">
            <p class="card-title">Sport</p>
            <!-- <div class="btn">
                <button class="delete"><i class="fa fa-remove" style="font-size:24px"></i></button>
                <button class=""><i class="fa fa-pencil" style="font-size:24px"></i></button>
            </div> -->
        </div>
        <div class="veiwCard">
            <p class="card-title">Sport</p>
            <!-- <div class="btn">
                <button class="delete"><i class="fa fa-remove" style="font-size:24px"></i></button>
                <button class=""><i class="fa fa-pencil" style="font-size:24px"></i></button>
            </div> -->
        </div>
    </div>
    </section>
    
</template>
<script>
export default {
    data() {
        return{
            users: [],
        }
    },
    methods: {
        createCategory() {
            this.$router.push('/categoryform');
        }
    }
}
</script>

<style >
    .cateAndBtn{
        margin-top: 5%;
        margin-bottom: -6%;
        display: flex;
        justify-content: space-between;
        width: 40%;
        margin-left: 32%;
    }
    .CtCreate{
        padding:8px 10px;
        background-color: rgb(3, 55, 133);
        border-radius: 5px;
        outline:none;
        color: white;
        cursor: pointer;
    }
    .cateAndBtn h3{
        text-shadow: 1px 1px #302e2e;
    }
    .search{
    margin-top: 100px;
    margin-bottom: -100px;
}
input[type=search]{
    width: 40%;
    height: 5vh;
    border-radius: none;
    margin-left: 32%;
    border-radius: 5px;
    font-size: 17px;
    padding-left: 10px;
}


.category{
    width: 40%;
    background-color: rgb(134, 139, 139);
    margin-left: 32%;
    margin-top: 10%;
    border-radius: 10px;
}
.veiwCard{
    display: flex;
    margin-top: 0;
    margin: 0;
    padding: 1px;
    background: rgb(124, 133, 133);
    border-radius: 10px;
}
.veiwCard:hover{
    background-color: rgb(110, 103, 103);
    cursor: pointer;
}
p{
    font-size:30px; 
    margin-left: 10px;
}
</style>