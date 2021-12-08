<template>
  <div class="event">
    
    <ul>
      <friend-card
        v-for="friend of friends"
        :key="friend.id"
        :friend="friend"
      ></friend-card>
    </ul>
  </div>
</template>

<script>

export default {
  data() {
    return {
      friends: [
        {
          title: "Play sport",
          city: "Cambodia",
          email: "sport@gmail.com",
          startdate: "8/12/2021",
          enddate: "20/12/2021",
          description: "Do you want to play with us?",
        },
        {
          title: "Play sport",
          city: "Cambodia",
          email: "sport@gmail.com",
          startdate: "8/12/2021",
          enddate: "20/12/2021",
          description: "Do you want to play with us?",
        },
        {
          title: "Play sport",
          city: "Cambodia",
          email: "sport@gmail.com",
          startdate: "8/12/2021",
          enddate: "20/12/2021",
          description: "Do you want to play with us?",
        },
        {
          title: "Play sport",
          city: "Cambodia",
          email: "sport@gmail.com",
          startdate: "8/12/2021",
          enddate: "20/12/2021",
          description: "Do you want to play with us?",
        },
      ],
    };
  },
  methods: {},
};
</script>

<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  html {
    font-family: "Jost", sans-serif;
  }

  ul{
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    align-items: center;
    width: 80%;
    margin-left: 10%;
    margin-top: 5%;
  }
</style>
