//Beginning of Side Bar Items
var home = document.getElementById("home");
var user = document.getElementById("user");
var logout = document.getElementById("logout");
var issue = document.getElementById("issue");
//End of Side Bar items

//Beginning of filter items headings
var createNewIssue = document.getElementById("new_issue_create");
var all = document.getElementById("all-filter");
var open = document.getElementById("open-filter");
var assigned_tickets = document.getElementById("tickets-filter");
//End of filter items

//Beginning of filter rows 
var all_issues = $(".all");
//End of filter rows

//Beginning of hyperlinks
var views = document.getElementsByClassName("views");
var views_id = document.getElementsByClassName("views_id");
//End of hyperlinks

//Beginning of create issue
var title = document.getElementById("add-issue-title");
var desc = document.getElementById("add-issue-desc");
var assigned = document.getElementById("add-issue-assigned");
var type = document.getElementById("add-issue-type");
var priority = document.getElementById("add-issue-priority");
var createIssue = document.getElementById("issueSubmit");
//End of create issue

//Beginning of create user
var fname = document.getElementById("add-user-fname");
var lname = document.getElementById("add-user-lname");
var Useremail = document.getElementById("add-user-email");
var Userpassword = document.getElementById("add-user-password");
var createUser = document.getElementById("addSubmit");
//End of create user

//Beginning of view issue
var views = document.getElementsByClassName("views");
var views_id = document.getElementsByClassName("views_id");
var closeIssue = document.getElementById("close-issue");
var inProgressIssue = document.getElementById("in-progress-issue");
//End of view issue



//Check if hyperlink for issue is clicked
if(views){
    for(let i = 0; i < views.length; i++){
        views[i].addEventListener("click", () =>{
            $.get("subpages/issueView.php?index="+views_id[i].value, function(responseText){
                $("body").html(responseText);
            });
        });
    }
}
//End of hyperlink check

//Check if close issue button is clicked
if(closeIssue){
    var input = document.getElementById("issue-id");

    closeIssue.addEventListener('click', () => {
        $.get('scripts/closeIssue.php?index='+input.value, function(responseText){
            alert("This issue is now closed.");
        });
    });
}
//End of close issue button is clicked

//Check if in progress issue button is clicked
if(inProgressIssue){
    var input = document.getElementById("issue-id");

    inProgressIssue.addEventListener('click', () => {
        $.get('scripts/progressIssue.php?index='+input.value, function(responseText){
            alert("This issue is now in progress.");
        });
    });
}
//End of in progress issue button is clicked

//Check if filter by all is clicked
if(all){
    all.addEventListener("click", ()=>{
        open.classList.remove("active");
        assigned_tickets.classList.remove("active");
        all.classList.add("active");
        all_issues.each(function(i){
            $(this).show();
        });
    
    });
}
//End of all check

//Check if filter by open is clicked
if(open){
    open.addEventListener("click", ()=>{
        open.classList.add("active");
        assigned_tickets.classList.remove("active");
        all.classList.remove("active");
    
        all_issues.each(function(i){
            if($(this).hasClass("this-open")){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    
    });
}
//End of filter by open

//Check if filter by assigned tickets is clicked
if(assigned_tickets){
    assigned_tickets.addEventListener("click", ()=>{
        open.classList.remove("active");
        assigned_tickets.classList.add("active");
        all.classList.remove("active");
    
        all_issues.each(function(i){
            if($(this).hasClass("assignedTickets")){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    });
}
//End of assigned tickets check

//Check if home side bar item is clicked
if(home){
    home.addEventListener("click", ()=>{
        $.get("subpages/allIssues.php", function(responseText){
            $("body").html(responseText);
        });
    });
}
//End of home side bar check

//Check if user side bar item is click
if(user){
    user.addEventListener("click", ()=>{
        $.get("subpages/newuser.php", function(responseText){
            $("body").html(responseText);
        });
    });
}
//End of user side bar item check

//Check if issue side bar item is clicked
if(issue){
    issue.addEventListener("click", ()=>{
        $.get("subpages/createIssue.php", function(responseText){
            $("body").html(responseText);
        });
    });
}
//End of issue side bar item check

//Check if logout side bar issue item is clicked
if(logout){
    logout.addEventListener("click", ()=>{
        $.get("scripts/logout.php", function(responseText){
            $.get("index.php", function(responseText){
                $("body").html(responseText);
            });
        });
    });
}
//End of logout issue side bar item check

//Check if create issue is click
if(createNewIssue){
    createNewIssue.addEventListener("click", ()=>{
        $.get("subpages/createIssue.php", function(responseText){
            $("body").html(responseText);
        });
    });
}
//End of create issue check

//Check if the button to create a new issue is clicked
if(createIssue){
    createIssue.addEventListener("click", ()=>{
        //Check if form is filled out
        if(title.value != "" && desc.value != "" && assigned.value != "" && type.value != "" && priority.value != ""){
            $.get("scripts/createIssue.php?title="+title.value+"&desc="+desc.value+"&assigned="+assigned.value+"&type="+type.value+"&priority="+priority.value, function(responseText){
                eval(responseText)
                title.value="";
                desc.value="";
                
            });
        }else{
            alert("Invalid data entered with form fields.");
        }
    });
}
//End of button create issue clicked

//Check if the button to create a new user is clicked
if(createUser){
    createUser.addEventListener("click", ()=>{
        email_reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(fname.value != "" && lname.value != "" && email_reg.test(Useremail.value) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(Userpassword.value)){
            $.get("scripts/createUser.php?fname="+fname.value+"&lname="+lname.value+"&email="+Useremail.value+"&password="+Userpassword.value, function(responseText){
                eval(responseText);
                fname.value="";
                lname.value="";
                Useremail.value="";
                Userpassword.value="";
                
            });
        }else{
            alert("Invalid data entered with form fields.");
        }
    });
}
//End of button create user clicked