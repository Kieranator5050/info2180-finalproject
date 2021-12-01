document.addEventListener('DOMContentLoaded', () => {

var all = document.getElementById("filterButtons1");
var open = document.getElementById("filterButtons2");
var ticket= document.getElementById("filterButtons3");

all.addEventListener('click', handleAllClick);
open.addEventListener('click',handleOpenClick);
ticket.addEventListener('click', handleTicketClick);

function handleAllClick(clickEvent){
    var httpRequest = new XMLHttpRequest();
    var url = './scripts/all.php'; 
    httpRequest.onreadystatechange= sort();
    httpRequest.open('Get', url);
    httpRequest.send();
}


function handleOpenClick(clickEvent){
    var httpRequest = new XMLHttpRequest();
    var url = './scripts/open.php'; 
    httpRequest.onreadystatechange= sort();
    httpRequest.open('Get', url);
    httpRequest.send();

}

function handleTicketClick(clickEvent){

}

function sort(){
    if(httpRequest.readyState==XMLHttpRequest.DONE){
        if (httpRequest.status == 200){
            var response = httpRequest.responseText;
            console.log(response)
            alert(response)
        }
        else{
            console.log("error")
        }
    }
}
});