const value = document.querySelector(".anime");
const strValue = value.textContent;
//console.log(strValue);
const arr = strValue.split("");
value.textContent = "";
//console.log(arr);
for(let loop = 0;loop < arr.length;loop++){
    value.innerHTML += "<span>"+ arr[loop]+"</span>";
}

let char = 0;
let timer = setInterval(onTick, 50);

function onTick(){
    const span = document.querySelectorAll("span")[char];
    span.classList.add("fade");
    char++
    if(char === arr.length){
        finish();
        return;
    }
}

function finish(){
    clearInterval(timer);
    timer = null;
}