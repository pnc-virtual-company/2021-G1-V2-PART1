<template>
    <section>
      <div class="blog-card">
            
        <!-- dailog boostrap -->
          
          <div class="head">
            <div class="left">
              <h2 style="margin-top: 10px">Event lists</h2>
              <p style="color:green;" v-if="isCreated">{{errorMessage}}</p>
              <p style="color:red;" v-else>{{errorMessage}}</p>
            </div>
           
            <button id="createEvent" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create Event</button>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
                  <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <input type="text" class="form-control" id="recipient-name" placeholder="title" v-model = "title">
                    </div>
                    <div class="form-group">
                      <input v-on:keyup = "searchCoutry" type="search" class="form-control" id="recipient-name" placeholder="country" v-model = "countryName">
                    </div>
                    <div class="form-group">
                      <label for="selectCity">Select city : </label>
                      <select id="city" v-model ="citySelected">
                        <option value="">Select city</option>
                        <option v-for="city of citys" :key="city" :value=city>{{city}}</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label id="startDate" for="startdate">Start date :</label>
                      <input type="datetime-local" placeholder="start date" v-model = "startdate">
                      <label id="endDate" for="enddate">End date :</label>
                      <input id="endDate" type="datetime-local"  placeholder="End date" v-model = "enddate">
                    </div>
                   
                    <div class="Classcategory">
                      <label>Select category</label>
                      <select id="category" v-model="category">
                        <option v-for="category of categories " :key="category.title" :value = category.id>{{category.title}}</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" id="description" placeholder="description" v-model = "description"></textarea>
                    </div>
                    <input type="file" placeholder="End date" @change = "onFileSelected">
                
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                  <button @click="Addevent" type="button" class="btn btn-primary" data-dismiss="modal">Save Event</button>
                </div>
              </div>
            </div>
          </div>


        <!-- ============End Btn create=========================== -->

        <!-- // ================Card my event view============================= -->

        <div class="cards">
            <div class="container-card" v-for="event of eventLists" :key="event.id ">
              <div class="main">
                  <div class="img">
                    
                      <!-- ===================Display Image====================== -->
                      <img class="img-1" :src="url + event.photo" alt="">

                  </div>
                  <div class="text">
                      <h1 id="title">{{event.title}}</h1>
                      <div id="time">
                          <p class="date">{{event.startdate}}</p>
                          <p class="member">{{event.join.length}} members</p>
                      </div>
                  </div>
              </div>
                  
              <div class="rightCard">
                  <p class="categories">{{event.category.title}}</p>
                  <div class="button">
                      <button @click="Display(event)" class="Edit">Edit</button>
                      <button @click="Show(event)" class="Delete">Delete</button>
                  </div>
              </div>
          </div>

          <!--=======================End cared event========================== -->
      
          <!-- //=============Dialog Btn====================== -->

          <Dialog v-if="displayDialog" 
                  :data = "eventInfo"
                  @cancel = "cancel" 
                  @delete = "removeEvent" 
          />
          <!-- ==================Dialog Edid Event================= -->
          <DialogEditEvent v-if="displayEdit"
                  :data = "eventInfo"
                  :sms = "messageError"
                  @cancel = "cancel"
                  @update = "UpdateEvent"
           />
          <!-- ===============End dialog================== -->
        
        </div>
      </div>
    </section>
</template>


<script>

  import Dialog from './Dialog.vue'
  import DialogEditEvent from './DialogEditEvent.vue'
  import axios from 'axios';
  const API_URL = 'http://127.0.0.1:8000/api/';

  export default {
    components: { Dialog , DialogEditEvent},
    emits: ['other-event'],
    data () {
      return {
        title: "",
        countryName: "",
        startdate: "",
        enddate: "",
        description: "",
        photo: null,
        category: "Food",
        showDialog: false,
        displayEdit: false,
        isCreated: false,
        otherEvent: true,
        displayDialog:false,
        eventInfo: "",
        errorMessage: "",
        messageError: '',
        eventLists: [],
        categories: [],
        joinerList: [],
        countries: [],
        citys:[],
        citySelected: "",
        url : 'http://127.0.0.1:8000/storage/imageEvent/',
      }
    },
    methods: {
      onFileSelected(event){
        this.photo = event.target.files[0];
      },
      // callFunction: function () {
      //   let date = new Date();
      //   let currentDate = new Date().toJSON().slice(0,10) +" "+ date.toLocaleTimeString();
      //   console.log(currentDate);
      // },

      Addevent() {
        let userid = localStorage.getItem('userID');
        let eventplace = this.citySelected + " | " + this.countryName;
        if(this.startdate <= this.enddate){
          let newEvent = new FormData();
          newEvent.append('title',this.title);
          newEvent.append('city',eventplace);
          newEvent.append('startdate',this.startdate);
          newEvent.append('enddate',this.enddate);
          newEvent.append('description',this.description);
          newEvent.append('photo',this.photo);
          newEvent.append('category_id',this.category);
          newEvent.append('user_id',userid);

          axios.post(API_URL + "events", newEvent).then(res => {
            this.getEvent();
            this.isCreated = true;
            this.$emit('other-event', this.otherEvent);
            console.log("Created!" + res.data);
            this.title = '';
            this.countryName = '';
            this.startdate = '';
            this.enddate = '';
            this.description = "";
            this.photo = "";
            this.errorMessage = "Event create successfully !";
          })
          .catch(error => {
                let status = error.response.status;
                if(status === 422) {
                 this.isCreated = false;
                this.errorMessage = 'Invalid command, please create again';
                }
          })

        }else{
          this.errorMessage = "End date must me grater than start date!!";
        }
       
      },

      cancel() {
        this.displayDialog = false
        this.displayEdit = false
      },

      Show(event) {
          this.displayDialog = true;
          this.eventInfo = event;
      },
      Display(event) {
          this.displayEdit = true;
          this.eventInfo = event;
      },
      removeEvent(id,isFalse) {
            axios.delete(API_URL + "events/" + id).then(res => {
                this.getEvent();
                this.$emit('other-event', this.otherEvent);
                this.isCreated = true;
                this.errorMessage = "Deleted successfully !";
                return res.data;
            })
            this.displayDialog = isFalse;
            
      },
      UpdateEvent(id,updateEvent,isFalse) {
          console.log(updateEvent);
          axios.put(API_URL + "events/" + id , updateEvent).then(res => {
              this.getEvent();
              this.displayEdit = isFalse;
              this.messageError = "";
              this.$emit('other-event', this.otherEvent);
              this.isCreated = true;
              this.errorMessage = "Updated successfully !";
              return res.data;
          }) 
            .catch(error => {
              let status = error.response.status;
              if(status === 500) {
              this.isInvalid = true
              this.messageError = 'update fail, please check again!';
              }
          })
      },

      getEvent() {
        let myID = localStorage.getItem('userID');
        axios.get(API_URL + "events").then(res => {
          this.$emit('other-event', this.otherEvent);
          this.eventLists = [];
          for(let event of res.data){
            if(event.user_id == myID){
              this.eventLists.push(event);
            }
          }
        })
        
        
      },

      getCategories(){
        axios.get(API_URL + "categories").then(res => {
          this.categories = res.data;
        })
      },

      getCountries(){
        axios.get('http://127.0.0.1:8000/api/countries').then(res => {
          this.countries = res.data;
        })
      },
      searchCoutry() {
        this.citys = this.countries[this.countryName];
      }
    },
    
    mounted() {
      this.getEvent();
      this.getCategories();
      this.getCountries();
      // this.callFunction();
    },
  }
</script>


<style scoped>
  section{
    width: 100%;
    margin: 0;
    padding: 0;
  }
  .head{
    width: 51%;
    margin-top: 2%;
    margin-left: 24%;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
  }
  input[type=datetime-local]{
    width: 30%;
    padding: 3px;
    border: 1px solid rgb(197, 191, 191);
    border-radius: 5px;
  }
  input[type=file]{
    border: none;
    outline: none;
  }
  #startDate{
    margin-right: 3%;
  }
  #endDate{
    margin-left: 3%;
  }
  #description{
    margin-top: 3%;
  }
  #city{
    width: 30%;
    margin-left: 2%;
    padding: 3px;
    border-radius: 5px;
    outline: none;
    border: 1px solid rgb(170, 166, 166);
  }
  #category{
    width: 75%;
    margin-left: 2%;
    padding: 7px;
    outline: none;
    border: 1px solid rgb(177, 170, 170);
    border-radius: 5px;
  }
  .Classcategory{
    border: none;
  }
  .cards{
    overflow-y: scroll;
    height: 69vh;
    border: none;
  }
  #createEvent{
    background: teal;
    width: 15%;
  }
  .modal-header{
    background: teal;
    color: #fff;
  }
  .container-card {
      margin-left: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      background: #fff;
      margin: auto;
      margin-top: 3%;
      border-radius: 10px;
      width: 700px;
      height: 100px;
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
  }
  .main{
      width: 75%;
      height: 18vh;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 2%;
      margin-bottom: 2%;
  }
  .text{
      width: 80%;
      flex-wrap: wrap;
      height: 14vh;
      border: none;
      font-size: 10px;
      font-family: sans-serif;
      margin-top: 2%;
      margin-left: 7%;
  }
  .member{
      font-size: 15px;
      margin-right: 15%;
  }
  #title{
      box-sizing: border-box;
      width: 50%;
      margin-top:2%;
      font-size: 18px;
      font-weight: 540;
      text-transform: uppercase;
  }
  .img{
      height: 80px;
      width: 90px;
    
  }
  .img img{
      height: 100%;
      width: 120%;
      object-fit: cover;
      cursor: pointer;
      border-radius: 5px;
  }
  .content{
      padding: 10px;
      width: 530px;
  }
  .Delete, .Edit{
      text-transform: uppercase;
      color: #ffff;
      border-radius: 50px;
      cursor: pointer;
      outline: none;
      border: none;
      background: rgb(218, 37, 37);
      font-size: 12px;
      padding: 8px 15px;
  }
  .Edit{
      background: rgb(53, 158, 32);
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
    height: 15vh;
    width: 23%;
  }
  #time{
    width: 90%;
    margin-top: 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
   .date{
      font-size: 15px;
  }
  .categories{
      margin-top: 5px;
      font-size: 17px;
  }
  .button{
      display: flex;
      justify-content: space-between;
      margin-top: 15%;
  }
</style>