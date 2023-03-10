var eye = document.getElementById('eye');
var eye = document.getElementById('pass');
eye.addEventListener("click",function(){
    if(input.type == "password"){
        input.type == "text"
        eye.style.opacity=0.8
    }else{
        input.type = "password"
        eye.style.opacity = 0.2;
    }
})
