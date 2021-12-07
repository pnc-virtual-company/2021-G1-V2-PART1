<template> 
    <div class="overlay">

    <div class="dialog">

      <div class="dialog__content">
        <h2 class="dialog__title" v-text="title"></h2>
        <p class="dialog__description" v-text="description"></p>
      </div>

      <hr />

      <div class="dialog__footer">
        <button @click="cancel" class="dialog__cancel">NO</button>
        <button @click="confirm" class="dialog__confirm">YES</button>
      </div>

    </div>

  </div>

</template>

<script>
export default {
    props: ['data','title','description'],
    emits:['delete', 'cancel'],
    data(){

    },
    methods:{
      confirm(){
        // console.log(123);
        this.$emit('delete', this.data.id, false);
      },
      cancel(){
        // console.log(321);
        this.$emit('cancel', false);
      }
    }
}
</script>

<style scoped>
    .dialog {
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        border-radius: 0.75rem;
        margin-left: auto;
        margin-right: auto;
    
    }
    .overlay {
        
        height: 30%;
        position: fixed;
        background: #fff;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        top: 5px;
        right: 0px;
        bottom: 0px;
        left: 35%;
        width: 30%;
        z-index: 10;
        border-radius: 10px;
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
  
  /* padding-top: 1rem; */
  /* padding-bottom: 1rem; */
}
.dialog__cancel {
  background: blue;
  
} 
.dialog__confirm {
  background: rgb(252, 0, 0);
} 
button {
  width: 55px;
  height: 30px;
  border-radius: 0.75rem;
  font-weight: 500;
  margin-right: 1rem;
  border-radius: 5px;
  border: none;
  color: #fff;
  cursor: pointer;
}
</style>>
