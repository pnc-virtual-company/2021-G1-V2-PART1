<template>    
  <header>
    <nav>
      <ul>
        <li>
          <router-link to="/myevent">My event</router-link>
        </li>
        <li>
          <router-link to="/findevent">Find event</router-link>
        </li>
        <li>
          <router-link to="/categories">Category</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<style scoped>
header {
  width: 100%;
  height: 5rem;
  background-color: #11005c;
}

nav {
  height: 100%;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

li {
  margin: 0 2rem;
}

a {
  text-decoration: none;
  background: transparent;
  border: 1px solid transparent;
  cursor: pointer;
  color: white;
  padding: 0.5rem 1.5rem;
  display: inline-block;
}

a:hover,
a:active {
  color: #949391;
  border-color: #f7f3f3;
  background-color: #1a037ec4;
  text-decoration: underline;
}
</style>
