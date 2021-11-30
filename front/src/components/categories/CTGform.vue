<template>
    <section>
        <div class="formCreate">
            <h3>Category Form</h3>
        <form>
            <input type="text" name="" id="" placeholder="Enter your category title">
        </form>
        <div class="btnCreateCTG">
            <button class="backToView">Back</button>
            <button class="nextToCreate">Next</button>
        </div>
        </div>
        
    </section>
</template>

<style scoped>
    h3{
        margin-left: 9%;
        padding-top: 3%;
        font-size: 30px;
        text-shadow:1px 1px rgb(255, 253, 253);
    }
    .formCreate{
        width: 40%;
        background-color: gray;
        margin-left: 30%;
        border-radius: 10px;
        margin-top: 10%;
    }
    input[type='text']{
        width: 80%;
        margin-left: 9%;
        padding: 10px;
        font-size: 18px;
        border-radius: 8px;
        border: none;
    }
    .backToView{
        background-color: #ff8a65;
    }
    button{
        padding: 10px;
        font-size: 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bolder;
        margin-bottom: 5%;
        margin-top: 5%;
    }
    .btnCreateCTG{
        margin-left: 9%;
        margin-top: 10px;
    }
    .nextToCreate{
        background-color: blue;
        color: white;
        margin-left: 63.5%;
    }
</style>