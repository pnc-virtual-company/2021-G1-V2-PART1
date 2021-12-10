<template>
    <section>
      <div class="blog-card">
            
        <!-- dailog boostrap -->

          <button id="createEvent" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create Event</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                      <select name="" id="" v-model ="citySelected">
                        <option v-for="city of citys" :key="city" :value=city>{{city}}</option>
                      </select>
                    </div>
                    <div class="form-group">
                       <label for="">Start date</label>
                      <input type="date" class="form-control" id="recipient-name" placeholder="start date" v-model = "startdate">
                    </div>
                    <div class="form-group">
                      <label for="">End date</label>
                      <input type="date" class="form-control" id="recipient-name" placeholder="End date" v-model = "enddate">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                      <select class="form-control" id="select" v-model="category">
                        <option v-for="category of categories " :key="category.title" :value = category.id>{{category.title}}</option>
                      </select>
                      <textarea class="form-control" id="message-text" placeholder="description" v-model = "description"></textarea>
                    </div>
                    </div>
                    <div class="form-group">
                      <input type="file" class="form-control" id="recipient-name" placeholder="End date" @change = "onFileSelected">
                    </div>
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
    data () {
      return {
        title: "",
        countryName: "",
        startdate: "",
        enddate: "",
        description: "",
        photo: null,
        category: "",
        showDialog: false,
        displayEdit: false,
        eventLists: [],
        categories: [],
        eventInfo: "",
        displayDialog:false,
        url : 'http://127.0.0.1:8000/storage/imageEvent/',
        messageError: '',
        joinerList: [],
        countries: [],
        citys:[],
        citySelected: ""
      }
    },
    methods: {
      onFileSelected(event){
        this.photo = event.target.files[0];
      },
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
            console.log("Created!" + res.data);
            this.title = '';
            this.countryName = '';
            this.startdate = '';
            this.enddate = '';
            this.description = "";
            this.photo = "";
          })
          .catch(error => {
                let status = error.response.status;
                if(status === 422) {
                this.isInvalid = true
                this.errorMessage = 'Invalid command, please create again';
                }
          })
        }else{
          console.log("End date must me grater than start date!!!!!");
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
                console.log(res.data);
                console.log("Deleted");
            })
            this.displayDialog = isFalse;
            
      },
      UpdateEvent(id,updateEvent,isFalse) {
          console.log(updateEvent);
          axios.put(API_URL + "events/" + id , updateEvent).then(res => {
              console.log(res.data);
              this.getEvent();
              this.displayEdit = isFalse;
              this.messageError = "";
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
          let events = res.data;
          this.eventLists = [];
          console.log(events);
          for(let event of events){
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
      console.log(this.citySelected);
    },
  }
</script>


<style scoped>
  section{
    width: 100%;
    margin: 0;
    padding: 0;
  }
 
  .cards{
    overflow-y: scroll;
    height: 69vh;
    border: none;
  }
  #createEvent{
    background: teal;
    width: 8%;
    margin-left: 67%;
    margin-top: 5%;
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