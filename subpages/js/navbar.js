//Wait for doc to load
"use strict"
document.addEventListener('DOMContentLoaded', () => {

    /**
     * Function to call the navbar actions
     * The corresponding index of the items of the navbar is passed in
     * An ajax request is sent to navbar.php with the index of the navbar
     * navbar.php will check the request and display the relative html snippet
     */
    function ajaxCall(intparam) {
        let url =  `./scripts/navbar.php?requestType=${intparam}`;
        let mainSection = document.getElementById('mainSection');
        fetch(url)
        .then(response=>response.text())
        .then(data=>{
            if(intparam!=3){
                $("#mainSection").empty();
                $("#mainSection").append(data);
            } else {
                console.log("Logout");
                window.location.reload();
            }
        })
        .catch(err=>console.error(err))
    }

    let navitems = document.getElementsByClassName("nav-item");

    for (let index = 0; index < navitems.length; index++) {
        navitems[index].addEventListener("click", ()=>{
            console.log("Clicked"); console.log(index);
            if(index==3){
                //If the logout button is pressed hide the navbar
                for (var i = 0; i < navitems.length; i++) {
                    navitems[i].style.display = 'none';
                }
            }
            ajaxCall(index);
        })
    }

});