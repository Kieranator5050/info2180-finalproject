//Wait for doc to load
document.addEventListener('DOMContentLoaded', () => {

    //Get email and password buttons
    let eBtn = document.getElementById('email');
    let pBtn = document.getElementById('password');

    //Add button listener
    document.getElementById('subButton').addEventListener("click", ()=>{
        console.log("Clicked");
        let mainSection = document.getElementById('mainSection');
        //Get values from the buttons
        let email = eBtn.value;
        let password = pBtn.value;

        //Using fetch ajax request. Email and Password are sent as variables
        fetch(`./scripts/login.php?email=${email}&password=${password}`)
        .then(response => response.text())
        .then(data => {
                console.log(data.length);
                //Clear the main section
                //If the login screen is returned again keep the mainsection the same
                if(data.length===431){
                    console.log("Login Failed");
                    //added because login won't work 
                    // $("#mainSection").empty();
                    // var navItems = document.getElementsByClassName('nav-item');
                    // for (var i = 0; i < navItems.length; i++) {
                    //     navItems[i].style.display = 'flex';
                    // }

                    // varAddUserItem = document.getElementById("new-user");
                    // if(email==="admin@project2.com"){
                    //     varAddUserItem.style.display = 'flex';
                    // } else {
                    //     varAddUserItem.style.display = 'none';
                    // }
                    // //Add data to the main section
                    // $("#mainSection").append(data);
                    
                } else {
                    console.log("Login Success");
                    //Display nav bar
                    $("#mainSection").empty();
                    var navItems = document.getElementsByClassName('nav-item');
                    for (var i = 0; i < navItems.length; i++) {
                        navItems[i].style.display = 'flex';
                    }

                    varAddUserItem = document.getElementById("new-user");
                    if(email==="admin@project2.com"){
                        varAddUserItem.style.display = 'flex';
                    } else {
                        varAddUserItem.style.display = 'none';
                    }
                    //Add data to the main section
                    $("#mainSection").append(data);
                }
        })
        .catch(err => console.error(err))
    });
  });