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
        <p id="exite" v-if="isCreated" style="color:red">{{exiteMessage}}</p>
        <p id="exite" v-else style="color:green;">{{exiteMessage}}</p>
        <!-- //================search btn==================== -->

        <input v-on:keyup = "search" id="search" class="form-control" type="search" placeholder="Search" aria-label="Search" v-model="searchcategory">

       <!-- ============categories========================== -->
       <div class="cardName">
            <div class="categoryList">
                <div v-for="categories of categoryLists" :key="categories.id" class="category">
                    <p class="card-title">{{categories.title}}</p>
                    <div class="icon" v-if="categories.user_id == userid">
                        <i @click = "ShowDilogEdit(categories)" id="edit" class="fas fa-pencil-alt"></i>
                        <i  @click = "ShowDialog(categories)"  id="delete" class="fa fa-trash"></i>

                        <!-- =============Delete Dialog========== -->
                        <Dialog v-show = "showDialog" 
                            :data = "categoryInfo"
                            @cancel = "cancel" 
                            @delete = "removeCategory"
                        />

                        <!-- ===========Edid Dialog============= -->
                        <DialogEdit v-if="showEdit"
                            :data = "categoryInfo"
                            @cancel = "cancel" 
                            @edit = "updateCategory"
                        />
                    </div>
                </div>

            </div>
       </div>
    </section>
</template>


<script>
import axios from 'axios';
import Dialog from './Dialog.vue'
import DialogEdit from './DialogEdit.vue'
const API_URL = 'http://127.0.0.1:8000/api/categories';
export default {
     components: {
        Dialog,
        DialogEdit,
    },

    data() {
        return{
            showDialog: false,
            showEdit: false,
            isMycategory: false,
            isCreated: false,
            categoryLists: [],
            categoryName: "",
            description: "",
            exiteMessage: "",
            searchcategory:"",
            categoryInfo: "",
            userid: "",
        }
    },
    methods: {
        ShowDialog(categories) {
            this.showDialog = true
            this.categoryInfo = categories;
        },
        ShowDilogEdit(categories){
            this.showEdit = true;
            this.categoryInfo = categories;
        },
        createCategory() {
            const newCategory = {
                title: this.categoryName,
                description: this.description,
                user_id: this.userid,
            }
           
            axios.post(API_URL, newCategory).then(res => {
                console.log(res.data);
                this.getCategory();
                this.exiteMessage = "Created successfully!";
                this.categoryName = "";
                this.description = "";
            })
            .catch(error => {
                console.log(error);
                this.isCreated = true;
                this.exiteMessage = 'The categories is already exists';
            })
           
        },
        removeCategory(id,isFalse) {
            axios.delete(API_URL + "/" + id).then(res => {
                console.log(res.data.id);
                this.exiteMessage = "Deleted successfully!";
                this.getCategory();
                this.showDialog = isFalse;
            })
           
            
        },
        updateCategory(id,categories, isFalse) {
            axios.put(API_URL + "/" + id , categories ).then(res => {
                console.log(res.data);
                this.getCategory();
                this.showEdit = isFalse
                this.exiteMessage = "Updated successfully!";
            })
           
        },

        cancel(isFalse){
            this.showDialog = isFalse;
            this.showEdit = false;
        },

        getCategory(){
             axios.get(API_URL).then(res => {
                this.categoryLists = res.data;
            })
        },
        search(){
            if(this.searchcategory !== ""){
                axios.get(API_URL + "/search/" + this.searchcategory).then(res => {
                this.categoryLists = res.data;
                })
            }else{
                this.getCategory();
            }
            
        }
    },
    mounted() {
        this.getCategory();
        this.userid = localStorage.getItem('userID');
    },
}
</script>

<style scroped>
    section{
        width: 100%;
    }
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
        height: 60vh;
        overflow-y: scroll;
        border: none;
    }
    .categoryList{
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