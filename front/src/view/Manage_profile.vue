<template>
    <div class="">
        <div class="container-profile">
            <div class="blog-header">
            <div class="blog-profile">
                <div class="profile-circle"></div>
                <div class="titil">username</div>
            </div>
            <div class="button-submit">
                <input type="submit" value="Save" class="save">
                <input type="submit" value="Cancel" class="cancel">
            </div>
            </div>
            <form action="#">
                <div class="user-details">
                    <div>
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Enter your First name" required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your Email" required> 
                    </div>
                    <div class="input-box">
                        <span class="details">Country</span>
                        <input type="text" placeholder="Enter your Country" required> 
                    </div>
                    </div>
                    <div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" placeholder="Enter your last name" required> 
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your Phone Number" required> 
                    </div>
                    
                    <div class="input-box">
                        <span class="details">National</span>
                        <input type="text" placeholder="Enter your National" required> 
                    </div>
                    </div>
                
                </div>
                <div class="input-box">
                    <span class ="details">Description</span>
                    <textarea id="description" name="subject" placeholder="Write something.." style="height:140px"></textarea>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style >
    *{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
/* body {
  
} */


.blog-header{
  display: flex;
  justify-content: space-between;
}
.blog-profile{
  display: flex;
  
}
.titil {
  line-height: 90px;
  margin-left: 10px;
  font-size:25px;
  font-weight: 600;
  text-transform: uppercase;
}
.profile-circle {
  height: 80px;
  width: 80px;
  border-radius: 50%;
  background: rgb(148, 147, 147);
  cursor: pointer;
}
.button-submit{
  margin-top: 30px;
  width: 35%;
}
.save, .cancel {
  margin-left: 30px;
  font-size: 15px;
  border: none;
  width: 60px;
  padding:4px;
  cursor: pointer;
}
.save {
  color: #fff;
  background: rgb(52, 105, 219);
}
.cancel {
    background: none;
}
#description{
  width: 100%;
  outline: none;
}
.container-profile {
  
  position: relative;
  top: 1%;
  left: 25%;
  /* transform: translate(50%,50%); */
  max-width: 700px;
  max-height: 500px;
  width: 100%;
  height: 100%;
  background: rgb(255, 252, 252);
  box-shadow: rgba(60, 64, 67, 0.315) 0px 1px 2px 0px, rgba(60, 64, 67, 0.377) 0px 2px 6px 2px;
  padding: 25px 30px;
  border-radius: 5px;
  margin: 30px;
   /* background: linear-gradient(135deg, #90b7d1, #693c7a); */
   /* z-index: -1; */
}

.container-profile .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container-profile .title::before {
  /* content: ''; */
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  /* background: linear-gradient(160deg, #74afd6, #9b59b6); */
}
.container-profile form .user-details {
  display: flex;
  justify-content: space-between;
  margin: 20px 0 12px 0;
  margin-top: 10px;
  margin-bottom: 25px;
}
form .user-details .input-box {
  /* margin-bottom: 5px; */
  width: calc(100% / 2 -20px);
}
.user-details .input-box .details {
  /* display: block; */
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 30px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 12px;
  border-bottom-width: 2px;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}


@media (max-width: 584px){
  .container{
    max-width: 100%;
  }
  form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .gender-details .category{
    width: 100%;
  }
  .container form .user-details{
    max-width: 300px;
    overflow: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 0;
  }
}

</style>