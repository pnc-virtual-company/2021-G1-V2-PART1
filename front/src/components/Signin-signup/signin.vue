<template>
    <div class="#app">
        <div class="form">
            <div class="text-contanner">
            <h1>EVENT ME</h1>
            </div>
            <div class="container">
                <div class="container-form">
                    <h4>LOIN</h4>
                </div>
                <div class="container-form-1">
                    <label for="username"><b></b></label>
                    <input type="text" placeholder="Email Or Mobile Number" name="uname" required>
                </div>
                <div class="container-form-1">
                    <label for="psw"><b></b></label>
                    <input type="password" placeholder="Password" name="psw" required>
                </div>
                <button type="submit">Login</button>
            </div>  
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            
        }
    }
}
</script>
<style scoped>
.form{
    display: flex;
    justify-content: space-between;
    margin-inline-start: 100px;
}
.container-form-1{
    margin: 32px;
    height: 32px;
  
    
}
.container{
  margin-inline-start: 90px;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 14px 20px;
  margin: 12px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 12px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button{
    width: 70px;
}
</style>