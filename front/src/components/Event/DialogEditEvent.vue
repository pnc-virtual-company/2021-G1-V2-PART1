<template> 
    <div class="overlay">
      <div class="dialog">
        <div class="dialog__content">
          <h1 id="edit">Do you want to update?</h1>
          <input id="title" type="text" v-model="title">
          <input id="city" type="text" v-model="city">
          <input id="date" type="date" v-model="startdate">
          <input id="date" type="date" v-model="enddate">
          <input id="description" type="text" v-model="description">
          <select name="categories" id="categories">
            <option :value= category.id>{{category.title}}</option>
          </select>
          <input type="file" @change="onFileSelected">
          <p style="color:red;margin-top:2%;">{{sms}}</p>
        </div>
        <hr>

        <div class="dialog__footer">
          <button @click="cancel" class="dialog__cancel">Cancel</button>
          <button @click="confirm" class="dialog__confirm">Update</button>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    props: ['data','sms'],
    emits:['update', 'cancel'],

    data(){
      return{
        title: "",
        description: "",
        city: "",
        startdate: "",
        enddate: "",
        category: "",
        image: "",
      }
    },

    methods:{
      onFileSelected(event){
        this.image = event.target.files[0];
      },
      confirm(){
        const updatEvent = new FormData();
        updatEvent.append('title',this.title);
        updatEvent.append('city',this.city);
        updatEvent.append('startdate',this.startdate);
        updatEvent.append('enddate',this.enddate);
        updatEvent.append('description',this.description);
        updatEvent.append('photo',this.image);
        updatEvent.append('category_id',this.category);

        this.$emit('update',this.data.id, updatEvent, false);
      },
      cancel(){
        // this.sms = "";
        this.$emit('cancel', false);
      }
    },
    mounted() {
      this.title = this.data.title;
      this.city = this.data.city
      this.startdate = this.data.startdate;
      this.enddate = this.data.enddate;
      this.description = this.data.description;
      this.category = this.data.category
      this.image = this.data.image;
    },
}
</script>

<style scoped>

   .overlay {
      position: fixed;
      background: #fff;
      top: 13%;
      left: 31%;
      width: 40%;
      z-index: 10;
      border-radius: 10px;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
  }
  input[type = text],
  input[type = date],
  select{
    width: 100%;
    height: 6vh;
    border: 1px solid rgb(187, 183, 183);
    margin: 5px 0%;
    padding-left: 10px;
    border-radius: 3px;
    outline: none;
  }
  input[type = file]{
    margin-top: 5px;
    border-radius: 3px;
  }
  
  #edit{
    font-size: 20px;
    margin-bottom: 2%;
    text-align: center;
  }
  hr{
    margin-top: -4%;
  }
  .dialog {
      background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
      border-radius: 0.75rem;
      margin-left: auto;
      margin-right: auto;
  }
  .dialog__content {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
  .dialog__footer {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 2%;
  }
  .dialog__cancel,
  .dialog__confirm{
    border: none;
    outline: none;
    padding: 3px 10px;
    color: #fff;
    border-radius: 20px;
    cursor: pointer;
  }
  .dialog__cancel {
    margin-right: 3%;
    background: rgba(216, 154, 20, 0.795);
  } 
  .dialog__confirm {
    margin-right: 4%;
    background: rgba(29, 173, 101, 0.829);
  } 
 
</style>
