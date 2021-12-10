<template>
<!-- about section starts  -->

<section class="about" id="about">
<div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<h2 style="text-align:center">Our Partner</h2>
<div class="row">
  <div class="column">
    <div class="card">
     <img src="../../assets/6.jpg" alt="Avatar" class="avatar"> <div class="container">
        <h2>Ahbanna</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>ahbanna@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../../assets/7.jpg" alt="" >
      <div class="container">
        <h2>Tichto CD</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>tichto.cd@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
     <img src="../../assets/8.png" alt="" >
     
      <div class="container">
        <h2>Technology Deser</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>technology.designer@email.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- about section ends  -->
</template>
<style scoped>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}
.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.review .box-container .box .stars i {
    color: var(--pink);
    font-size: 2rem;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}
img{
  margin-left: 10px;
  margin-top: 4px;
  vertical-align: middle;
  width: 70px;
  height: 70px;
  border-radius: 50%;
}
.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
section{
    margin-left: 1%;
}
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>