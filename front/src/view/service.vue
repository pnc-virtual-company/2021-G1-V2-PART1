<template>
  <!-- about section starts  -->

  <section class="about" id="about">
    <div class="about-section">
      <h1>OurService</h1>
      <p>Some text about who we are and what we do.</p>
      <p>
        Resize the browser window to see that this page is responsive by the
        way.
      </p>
      
    </div>
    <div class="row">
      <div class="column">
        <img src="../assets/1.png" alt="" srcset="" />
        <div class="div">
            <h2>Innovate</h2>
            <p>Design Thinking Strategy Technology Architecture Digital Product Strategy Innovation Sprints</p>    
        </div>  
      </div>
      <div class="column">
           <img src="../assets/2.png" alt="" srcset="" />
           <div class="div">
           <h2>Design</h2> 
           <p>Design Thinking Strategy Technology Architecture Digital Product Strategy Innovation Sprints</p>
           </div>
      </div>
      <div class="column">
          <img src="../assets/3.png" alt="" srcset="" />
          <div class="div">
          <h2>Develop</h2> 
          <p>Design Thinking Strategy Technology Architecture Digital Product Strategy Innovation Sprints</p>
          </div>
      </div>
      <div class="column">
            <img src="../assets/4.png" alt="" srcset="" />
            <div class="div">
            <h2>Grow</h2>
             <p>Design Thinking Strategy Technology Architecture Digital Product Strategy Innovation Sprints</p> 
             </div>
      </div>
    </div>
  </section>
  <!-- about section ends  -->
</template>
<style scoped>

.column {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
}
section {
  background: #010713;
}
.about{
  height: 90vh;
}
.about-section {
  padding: 50px;
  text-align: center;
  color: white;
}
.row:after {

  content: "";
  display: table;
  clear: both;
}
.div{
    text-align: center;
    color: honeydew;
    margin:4px;
}
img{
    margin-left: 30px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>