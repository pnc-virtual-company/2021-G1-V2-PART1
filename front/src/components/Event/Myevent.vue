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
                      <input type="text" class="form-control" id="recipient-name" placeholder="city" v-model = "city">
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
                      <img class="img-1" :src="url+event.photo" alt="">

                  </div>
                  <div class="text">
                      <h1 id="title">{{event.title}}</h1>
                      <div id="time">
                          <p class="date">{{event.startdate}}</p>
                          <p class="member">6 members</p>
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
        city: "",
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
        listJoins: ""
      }
    },
    methods: {
      onFileSelected(event){
        this.photo = event.target.files[0];
      },
      Addevent() {
        const newEvent = new FormData();
        newEvent.append('title',this.title);
        newEvent.append('city',this.city);
        newEvent.append('startdate',this.startdate);
        newEvent.append('enddate',this.enddate);
        newEvent.append('description',this.description);
        newEvent.append('photo',this.photo);
        newEvent.append('category_id',this.category);
      
        axios.post(API_URL + "events", newEvent).then(res => {
          this.eventLists.push(res.data.event);
          this.getEvent();
          console.log("created")
        })
        .catch(error => {
              let status = error.response.status;
              if(status === 422) {
              this.isInvalid = true
              this.errorMessage = 'Invalid command, please create again';
              }
          })

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
                console.log(res.data.id);
                this.getEvent();
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
        axios.get(API_URL + "events").then(res => {
          this.eventLists = res.data;
          console.log(res.data);
        })
      },
      getCategories(){
        axios.get(API_URL + "categories").then(res => {
          console.log(res.data);
          this.categories = res.data;
        })
      },

      // getUserJoined(){
      //   axios.get(API_URL + "joins").then(res => {
      //     this.listJoins = res.data;
      //     console.log(res.data);
      //   })
      // }
    },

    mounted() {
      this.getEvent();
      this.getCategories();
      // this.getUserJoined();
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