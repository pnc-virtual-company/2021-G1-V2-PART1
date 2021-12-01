<template>
  <section>
    <router-view @add-category="addCategory"></router-view>
    
    <!-- <categories-view
      v-for="category of categoriesList" 
      :key='category.id'
      :category="category" 
    ></categories-view> -->
    
  </section>
</template>


<script>
// import CategoriesView from './components/categories/categories-view.vue'
// import signup from './components/Signin-signup/signup.vue'

export default {
  data() {
    return{
      userLists:[],
      categoriesList: [],
    }
  },
  methods: {
    addCategory(title){ 
      const newCategory = {
        title: title,
      }
      this.categoriesList.push(newCategory)
      console.log(this.categoriesList);
    }
  },
}
</script>

