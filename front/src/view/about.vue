<template>
<!-- about section starts  -->
  <div class="main">
    <div class="about" id="about">
      <div class="about-section">
        <h1>About Us</h1>
        <p>Some text about who we are and what we do.</p>
        <p>Resize the browser window to see that this page is responsive by the way.</p>
      </div>

    <h1 style="text-align:center;padding: 10px;color:black;">Our Team member of Event App</h1>
    <div class="row">
      <div class="column">
        <div class="card">
        <img src="../assets/19.png" alt="Avatar" class="avatar"> 
          <div class="container">
            <h2>Sreytouch Moch</h2>
            <p class="title">CEO & Founder</p>
            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
            <p>Sreytouch.Moch@gmail.com</p>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="../assets/15.jpg" alt="" >
          <div class="container">
            <h2>Chanthy Tha</h2>
            <p class="title">Art Director</p>
            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
            <p>Chanthy.Tha@gmail.com</p>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>
      
      <div class="column">
        <div class="card">
        <img src="../assets/18.png" alt="" >
        
          <div class="container">
            <h2>Chanthea Phon</h2>
            <p class="title">Designer</p>
            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
            <p>Chanthea.Phon@email.com</p>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="card">
        <img src="../assets/13.jpg" alt="Avatar" class="avatar"> 
          <div class="container">
            <h2>Vun Yin</h2>
            <p class="title">CEO & Founder</p>
            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
            <p>Vun.Yin@gmail.com</p>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="../assets/14.jpg" alt="" >
          <div class="container">
            <h2>Vantheav Thav</h2>
            <p class="title">Art Director</p>
            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
            <p>Vantheav.Thav@gmail.com</p>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>
      
      <div class="column">
        <div class="card">
        <img src="../assets/20.png" alt="" >
        
          <div class="container">
            <h2>Sophanan Mey</h2>
            <p class="title">Designer</p>
            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
            <p>Sophanan.Mey@email.com</p>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- about section ends  -->
</template>
<style scoped>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
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
h2{
  color: #000;
  font-size: 20px;
  text-align: center;
  padding: 10px;
}
.review .box-container .box .stars i {
    color: var(--pink);
    font-size: 2rem;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}
.main{
  width: 100%;
  height: 90vh;
  overflow-y: scroll;
}
.row{
  width: 80%;
  margin-left: 10%;
}
p{
  color: rgb(134, 129, 129);
}
.about {
  height: 30vh;
  margin: 0;
  padding: 0;
  background-color: #474e5d;
  color: white;
}
.about-section{
  text-align: center;
  padding: 30px;
}
img{
  margin-left: 30%;
  margin-top: 10%;
  vertical-align: middle;
  width: 120px;
  height: 120px;
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
