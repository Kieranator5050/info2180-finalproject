let home = document.getElementById("home");
let user = document.getElementById("user");

home.addEventListener("click", ()=>{
    window.location.href="dashboard.php";
});

user.addEventListener("click", ()=>{
    window.location.href="adduser.php";
});