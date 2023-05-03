var eye = document.getElementById('Eye');
var input = document.getElementById('Input');
eye.addEventListener("click",function(){
    if(input.type == "password"){
        input.type == "text"
    }else{
        input.type = "password"
    }
})
