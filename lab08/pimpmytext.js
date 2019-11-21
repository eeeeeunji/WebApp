// 2016003472 남혜인

function pageLoad(){
    document.getElementById("bigger").onclick = ex7;
    document.getElementById("bling").onchange = ex5;
    document.getElementById("snoopify").onclick = ex6;
    document.getElementById("igpay").onclick = ex9_1;
    document.getElementById("malko").onclick = ex9_2;
}

function ex3(){
    alert("Hello World!");
}

function ex4(){
    var txt = document.getElementById("txt");
    txt.value = "Here is the sample text. Let's see if the 'Bigger Pimpin'!' button works!";
    txt.style.fontSize = "24pt";
}

function ex5(){
    var txt = document.getElementById("txt");
    var bling = document.getElementById("bling");

    if(bling.checked === true){
        txt.style.fontWeight = "bold";
        txt.style.color = "green";
        txt.style.textDecoration = "underline";
        document.body.style.backgroundImage = "url(http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg)";
    }
    else{
        txt.style.fontWeight = "normal";
        txt.style.color = "black";
        txt.style.textDecoration = "none";
        document.body.style.backgroundImage = "none";
    }
}

function ex6(){
    var txt = document.getElementById("txt");
    var snoopify = document.getElementById("snoopify");

    txt.value = txt.value.toUpperCase();
    txt.value = txt.value.split(".").join("-izzle.");
}

var size = 12;

function ex7_1(){
    var txt = document.getElementById("txt");
    size += 2;
    txt.style.fontSize = size + "pt";
}

function ex7(){
    setInterval("ex7_1();",500);
}

function ex9_1(){
    var tval = document.getElementById("txt").value;
    for(var i = 0 ; i < tval.length ; i++){
        if(tval[i] == "a" || tval[i] == "i" || tval[i] == "o" || tval[i] == "u" || tval[i] == "e" || tval[i] == "A" || tval[i] == "I" || tval[i] == "O" || tval[i] == "U" || tval[i] == "E"){           
            tval = tval.substring(i,tval.length) + tval.substring(0,i);             
            break;
        }
    }
    document.getElementById("txt").value = tval + "ay";
}

function ex9_2(){
    var txt = document.getElementById("txt");
    if(txt.value.length >= 5){
        txt.value = "Malkovich";
    }
}

window.onload = pageLoad;