<template> 
    <div class="overlay">
      <div class="dialog">
        <div class="dialog__content">
          <p style="color:red;">Remove item? Are you sure to remove?</p>
          <h3 class="dialog__title">{{data.title}}</h3>
          <p class="dialog__description">{{data.description}}</p>
        </div><hr />

        <div class="dialog__footer">
          <button @click="cancel" class="dialog__cancel">Cancel</button>
          <button @click="confirm" class="dialog__confirm">Delete</button>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    props: ['data'],
    emits:['delete', 'cancel'],

    methods:{
      confirm(){
        this.$emit('delete',this.data.id, false);
        console.log(this.data);
      },
      cancel(){
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
      position: fixed;
      background: #fff;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
      top: 5px;
      right: 0px;
      left: 35%;
      width: 30%;
      z-index: 10;
      border-radius: 10px;
  }
  hr{
    margin: 0;
    padding: 0;
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
    padding: 5px;
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
    background: rgba(0, 0, 255, 0.719);
  } 
  .dialog__confirm {
    background: rgba(252, 0, 0, 0.671);
  } 
 
</style>
