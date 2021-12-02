<template>
  <form @submit.prevent="ceateEvent">
    <div>
      <input type="text" placeholder="Title" v-model="title" required />
    </div>
    <div>
      <input type="text" placeholder="Event Catigories" v-model="category" required/>
    </div>
    <div class="city">
      <input type="text" placeholder="City" v-model="city" required/>
    </div>
    <textarea name="message" rows="10" cols="30" placeholder="You desciption" v-model="message" required></textarea>
    
    <div class="row">
      <div class="column">
        <div>
          <input type="date" placeholder="Start Date" v-model="StartDate"  required/>
        </div>
        <div>
          <input type="date" placeholder="End Date" v-model="EndDate"  required/>
        </div>
      </div>
      
    </div>
    
    <div class="intFile">
      <input type="file" @change="onFileselected"  />
    </div>
    <div class="add">
      <button class="button-3">
        <router-link to="/myevent">Back</router-link>
      </button>
      <button class="button-2" @click="addEvent">Add event</button>
    </div>
  </form>
</template>


<script>
export default ({
  data() {
    return {
      title:'',
      category:'',
      message:'',
      city:'',
      StartDate:'',
      EndDate:'',
      image: "",
      storefile :''
    };
  },
  methods: {
    onFileselected(event) {
        this.image = event.target.files[0].name
        console.log(this.image);
    },
    addEvent(){
      let newEvent = {
        title: this.title,
        category: this.category,
        city: this.city,
        statdate: this.StartDate,
        enddate: this.EndDate,
        file: this.image,
      }
      // this.$emit('add-event',this.title,this.category,this.message,this.city,this.At1,this.At2);
      // this.$router.push('/myevent')
      console.log(newEvent);
    } 
  }

  
})
</script>


<style scoped>
form {
  font-family: serif;
  margin: 1rem auto;
  margin-top: 3%;
  max-width: 35%;
  padding: 1rem;
  border-radius: 12px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
    rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  border-left: 7px solid rgb(94, 161, 105);
}

form div {
  margin: 1rem 0;
}

input[type=text]
{
  width: 80%;
  padding: 10px;
  margin-left: 6%;
}
textarea{
  width: 84%;
  margin-left: 6%;
  height: 6vh;

}
.intFile{
  width: 85%;
  margin-left: 6%;
  margin-bottom: 3%;
  margin-top: -30px;
}
label {
  font-weight: bold;
  margin-right: 1rem;
  width: 7rem;
  display: inline-block;
  color: #777;
  font-size: 15px;
  padding: 10px 0;
}

.add {
  display: flex;
  justify-content: space-between;
  text-decoration: none;
  width: 80%;
  margin-left: 8%;
  margin-top: 6%;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #40db62;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
.button-3 {
  background-color: rgb(71, 173, 71);
  padding: 7px 25px;
  text-decoration: none;
  border-radius: 5px;
  border: none;

}
.button-2{
  border: none;
  background: #54bb98;
  border-radius: 5px;
  padding: 7px 10px;
}

.column {
  float: left;
  width: 85%;
  padding: 0%;
  margin-top: -20px;
  margin-left: 6%;
  margin-bottom: 0;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
input[type=date]{
  width:95%;
  padding: 2%;
}
a{
  color: white;
}

</style>