<template>
    <section>
        <div class="form">
            <div class="create">
                <h2 class="categories">Categories</h2>
                <button id="createBtn" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create </button>
            </div>
           
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">categories name:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="categoryName">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="message-text" v-model="description"></textarea>
                        </div>
                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button @click="createCategory" type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <p id="exite" style="color:red">{{exiteMessage}}</p>
        <!-- //================search btn==================== -->

        <input id="search" class="form-control" type="search" placeholder="Search" aria-label="Search">

       <!-- ============categories========================== -->
       <div class="cardName">
            <div class="categoryList">
                <div v-for="categories of categoryLists" :key="categories.title" class="category">
                    <p class="card-title">{{categories.title}}</p>
                    <div class="icon">
                        <i id="edit" class="fas fa-pencil-alt"></i>
                        <i id="delete" class="fa fa-trash"></i>
                    </div>
                </div>
            </div>
       </div>
        
    </section>
</template>
<script>
export default {
    data() {
        return{
            categoryLists: [
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
                {title: "Test1",description: "description1"},
            ],
            categoryName: "",
            description: "",
            exiteMessage: "The categories is already exists"
        }
    },
    methods: {
        createCategory() {
            const newCategory = {
                title: this.categoryName,
                description: this.description
            }
            this.categoryLists.push(newCategory)
            console.log(this.categoryLists);
            this.categoryName = "";
            this.description = "";
        }
    }
}
</script>

<style scroped>
    .create{
        display: flex;
        width: 40%;
        justify-content: space-between;
        margin-left: 32%;
        margin-top: 3%;
        align-items: center;
    }
    #edit:hover,
    #delete:hover{
        cursor: pointer;
    }
    #exite{
        margin-left: 32%;
    }
    .modal-dialog{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    }
    #search{
        width: 40%;
        margin-left: 32%;
    }
    #recipient-name{
        width: 465px;
        margin-left: 0%;
        border-radius: 5px;
        border: 1px solid rgb(212, 209, 209);
    }
    .cardName{
        margin-top: 1%;
        /* background: green; */
        height: 63vh;
        overflow-y: scroll;
        border: none;
    }
    .categoryList{
        /* background: teal; */
        width: 41%;
        margin-left: 32%;
        margin-top: 1%;
        border-radius: 5px;
    }
    .category{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3%;
        border-radius: 5px;
        background: #fff;
        border-left: 2px solid #3073B7;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }
    .card-title{
        padding: 5px 10px ;
        padding-top: 12px;
    }
    .category:hover{
        background: #D4ECDD;
        border-radius: 5px;
    }
    input[type=text] {
        border: 1px solid rgb(82, 79, 79);
        outline: none;
    }
    .categoriesName{
        width: 100%;
    }
    .icon{
        margin-right: 3%;
        width: 8%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>