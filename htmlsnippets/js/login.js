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
        fetch(`./phpfiles/login.php?email=${email}&password=${password}`)
        .then(response => response.text())
        .then(data => {
            //console.log(data.length);
            //When a login is not successful the html of the login form is returned with a length of 393
            //When the length is 393 the navbar is not shown. In all other cases it is displayed
            if (data.length===393) {
                console.log("Login fail");
            } else {
                //Clear the main section
                mainSection.innerHTML="";
                //console.log("Login success");
                //Display nav bar
                var navItems = document.getElementsByClassName('nav-item');
                for (var i = 0; i < navItems.length; i++) {
                navItems[i].style.display = 'flex';
                }
                //Add data to the main section
                mainSection.innerHTML = data;
            }
        })
        .catch(err => console.error(err))
    });
  });