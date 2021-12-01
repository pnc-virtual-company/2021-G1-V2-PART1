<template>
    <section>
        <div class="form">
            <button type="button" id="createBtn" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">+Create categories</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Categories title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" placeholder="categories name" v-model="categoryName">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button @click="createCategory" type="button" class="btn btn-primary" data-dismiss="modal">Create</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        
        <!-- //================search btn==================== -->

        <input class="form-control" type="search" placeholder="Search" aria-label="Search">

       <!-- ============categories========================== -->

        <div class="category">
            <p class="card-title">Sport</p>
            <p class="card-title">Music</p>
            <p class="card-title">paino</p>
            <p class="card-title">Game</p>
        </div>

    </section>
</template>
<script>
export default {
    data() {
        return{
            categoryName: ""
        }
    },
    methods: {
        createCategory() {
            console.log(this.categoryName);
            this.categoryName = "";
        }
    }
}
</script>

<style >
    #createBtn{
        margin-left: 60%;
        margin-top: 5%;
        margin-bottom: 3%;
    }
    .form-control{
        width: 40%;
        margin-left: 32%;
    }
   
    .category{
        width: 40%;
        background: rgba(122, 185, 161, 0.596);
        margin-left: 32%;
        margin-top: 3%;
        border-radius: 5px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    .card-title{
        padding: 10px ;
    }
    .card-title:hover{
        background: rgba(72, 147, 190, 0.527);
        border-radius: 5px;
    }
    input[type=text] {
        border: 1px solid rgb(82, 79, 79);
        outline: none;
    }
    h2{
        
    }

</style>