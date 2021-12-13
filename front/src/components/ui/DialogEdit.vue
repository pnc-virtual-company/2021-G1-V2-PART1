<template> 
    <div class="overlay">
      <div class="dialog">
        <div class="dialog__content">
          <h1 id="edit">Do you want to update?</h1>
          <label for="title">Title</label>
          <input id="title" type="text" v-model="title">
          <label for="description">Description</label>
          <input id="description" type="text" v-model="description">
        </div>
        <hr />

        <div class="dialog__footer">
          <button @click="cancel" class="dialog__cancel">Cancel</button>
          <button @click="confirm" class="dialog__confirm">Update</button>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    props: ['data'],
    emits:['edit', 'cancel'],

    data(){
      return{
        title: "",
        description: "",
      }
    },

    methods:{
      confirm(){
        let category = {
          title: this.title,
          description: this.description,
        }

        this.$emit('edit',this.data.id, category, false);
      },
      cancel(){
        this.$emit('cancel', false);
      }
    },
    mounted() {
      this.title = this.data.title,
      this.description = this.data.description
    },
}
</script>

<style scoped>

   .overlay {
      position: fixed;
      background: #fff;
      top: 5px;
      left: 35%;
      width: 30%;
      z-index: 10;
      border-radius: 10px;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
  }
  input[type = text] {
    width: 100%;
    height: 6vh;
    border: 1px solid gray;
    border-radius: 3px;
    padding: 10px;
  }
  #title{
    margin-bottom: 3%;
  }
  #edit{
    font-size: 20px;
    text-align: center;
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
    margin-bottom: 2%;
    justify-content: flex-end;
  }
  .dialog__cancel,
  .dialog__confirm{
    border: none;
    outline: none;
    padding: 3px 10px;
    color: #fff;
    border-radius:15px;
    cursor: pointer;
  }
  .dialog__cancel {
    margin-right: 3%;
    background: rgba(0, 0, 255, 0.719);
  } 
  .dialog__confirm {
    margin-right: 4%;
    background: rgba(29, 173, 101, 0.829);
  } 
 
</style>
