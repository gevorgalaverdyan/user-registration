let nameInput = document.querySelector('#name');
let mailInput = document.querySelector('#mail');
let submitBtn = document.querySelector('#submit');

submitBtn.addEventListener("click",function(){
    if (!allLetters(nameInput)){
        alert("letters only")
    }
    if(mailCheck(mailInput)){
        alert('not valid mail')
    }
})

function allLetters(input){
    var letters = /^[A-Za-z]+$/;
    if(input.value.match(letters)){
        return true;
    }else{
        return false;
    }
}

function mailCheck(input){
    if(!input.value.includes("@")){
        return false;
    }
}

