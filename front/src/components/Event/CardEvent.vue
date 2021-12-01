<template>
  <form action="#">
    <div>
      <input type="text" placeholder="Title" v-model="title" autofocus />
    </div>
    <div>
      <input
        type="text"
        placeholder="Event Catigories"
        v-model="title"
        autofocus
      />
    </div>
    <textarea name="message" rows="10" cols="30" placeholder="You desciption"></textarea>
    
    <div class="row">
      <div class="column">
        <div>
          <input type="date" placeholder="Start Date" required />
        </div>
        <div>
          <input type="date" placeholder="End Date" required />
        </div>
      </div>
      <div class="column">
        <div>
          <input type="text" class="text1" placeholder="At" required />
        </div>
        <div>
          <input type="text" class="text2" placeholder="At" required />
        </div>
      </div>
    </div>
    <div class="intFile">
      <input type="file" />
    </div>
    <div class="add">
      <button class="add1">
        <router-link to="/myevent" class="addevent1"> Back</router-link>
      </button>
      <button class="add2">
        <router-link to="/myevent" class="addevent">Add Event</router-link>
      </button>
    </div>
  </form>
</template>


<script>
</script>

<style scoped>
form {
  font-family: serif;
  margin: 1rem auto;
  margin-top: 4%;
  max-width: 40%;
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
  margin-left: 7%;
}
textarea{
  width: 83%;
  margin-left: 7%;
  height: 10vh;

}
.intFile{
  margin-left: 0;
  width: 85%;
  margin-left: 6%;
  margin-bottom: 5%;
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
}
.addevent{
  text-decoration: none;
  font-size: 15px;
  font-weight: bolder;
  border: none;
}
.addevent1{
  text-decoration: none;
  font-size: 15px;
  font-weight: bolder;
}
.add1 {
  background-color: rgb(151, 155, 151);
  width: 150px;
  height: 50px;
  text-decoration: none;
  border-radius: 5px;
  border: none;

}
.add2 {
  background-color: rgb(62, 117, 60);
  width: 150px;
  height: 50px;
  margin-left: 10px;
  text-decoration: none;
  border-radius: 5px;
  border:none;
}
.text1 {
  width: 97.6%;
  height: 20px;
  margin-top: 0;
}
.text2 {
  height: 20px;
  margin-top: 0;
}

.column {
  float: left;
  width: 40%;
  padding: 0%;
  margin-top: -15px;
  margin-left: 6%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.row {
  margin-bottom: -40px;
}
input[type=date]{
  width:90%;
  padding: 5%;
}
a{
  color: white;
}

</style>