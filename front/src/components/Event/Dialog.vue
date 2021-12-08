<template> 
    <div class="overlay">
      <div class="dialog">
        <div class="dialog__content">
          <h2 class="dialog__title">Title : {{data.title}}</h2>
          <p class="dialog__description">country : {{data.city}}</p>
          <p class="dialog__description">startdate : {{data.startdate}}</p>
          <p class="dialog__description">enddate : {{data.enddate}}</p>
          <p class="dialog__description">description : {{data.description}}</p>
        </div><hr />

        <div class="dialog__footer">
          <button @click="cancel" class="dialog__cancel">Cancel</button>
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
      top: 10%;
      right: 0px;
      left: 35%;
      width: 35%;
      z-index: 10;
      border-radius: 10px;
      box-shadow: rgba(27, 34, 37, 0.486) 0px 2px 4px 0px, rgba(38, 42, 44, 0.63) 0px 2px 16px 0px;
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
    padding: 5px 12px;
    color: #fff;
    border-radius: 20px;
    cursor: pointer;
  }
  .dialog__cancel {
    margin-right: 3%;
    background: rgba(119, 119, 189, 0.719);
  } 
 
  h2,p{
    padding: 10px 5px;
  }
 
</style>
