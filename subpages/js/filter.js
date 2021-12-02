
    console.log("Loaded All Issues JS");

    var newIssue = document.getElementById("filterButtons");
    var all = document.getElementById("filterButtons1");
    var open = document.getElementById("filterButtons2");
    var ticket= document.getElementById("filterButtons3");
    var tableBody = document.getElementById("table-body");

    var ticketTitles = document.getElementsByClassName("title");
    var ticketIDs = document.getElementsByClassName("id");
    var ticketStatus = document.getElementsByClassName("status");

    for (let index = 0; index < ticketTitles.length; index++) {

        var Tstatus = ticketStatus[index];
        console.log(Tstatus);
        if (Tstatus.innerHTML==="Open") {
            Tstatus.style.backgroundColor = "green";
            Tstatus.style.color = "white";
        }
        if (Tstatus.innerHTML==="In Progress") {
            Tstatus.style.backgroundColor = "yellow";
            Tstatus.style.color = "black";
        }
        if (Tstatus.innerHTML==="Closed") {
            Tstatus.style.backgroundColor = "red";
            Tstatus.style.color = "white";
        }

        ticketTitles[index].addEventListener('click', ()=>{
            var title = ticketTitles[index].innerHTML;
            var id = ticketIDs[index].innerHTML;
            console.log("Clicked", id, title);
            fetch(`./subpages/issueView.php?issue_id=${id}`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                $("#mainSection").empty();
                $("#mainSection").append(data);
            })
            .catch(err => console.error(err))
        })
    }

    newIssue.addEventListener('click', handleNewClick);
    all.addEventListener('click', handleAllClick);
    open.addEventListener('click',handleOpenClick);
    ticket.addEventListener('click', handleTicketClick);

    function handleNewClick(clickEvent){
        console.log("New Click Pressed");

        //Ajax call
        fetch(`./subpages/createIssue.php`)
            .then(response => response.text())
            .then(data => {
                //console.log(data);
                //Setting main section
                $("#mainSection").empty();
                $("#mainSection").append(data);
            })
            .catch(err => console.error(err))
    }

    function handleAllClick(clickEvent){
        console.log("All Pressed");

        //Ajax call
        fetch(`./scripts/issues_all.php`)
            .then(response => response.text())
            .then(data => {
                //console.log(data);
                //Reloading table

                tableBody.innerHTML = "";
                tableBody.innerHTML = data;
                $("#script").empty();
                $("#script").append(`<script type="text/javascript" src="./subpages/js/filter.js"></script>`);
                $("#style").empty();
                $("#style").append(`<link rel="stylesheet" href="./subpages/styles/allissues.css"></link>`);

                //Setting Button Colors
                all.style.backgroundColor = 'blue';
                all.style.color = 'white';

                open.style.backgroundColor = 'white';
                open.style.color = "black";

                ticket.style.backgroundColor = 'white';
                ticket.style.color = 'black';
            })
            .catch(err => console.error(err))
    }

    function handleOpenClick(clickEvent){
        console.log("Open Pressed");
        //Ajax call
        fetch(`./scripts/issues_open.php`)
            .then(response => response.text())
            .then(data => {
                //console.log(data);
                //Reloading table
                tableBody.innerHTML = "";
                tableBody.innerHTML = data;
                $("#script").empty();
                $("#script").append(`<script type="text/javascript" src="./subpages/js/filter.js"></script>`);
                $("#style").empty();
                $("#style").append(`<link rel="stylesheet" href="./subpages/styles/allissues.css"></link>`);

                //Setting Button Colors
                all.style.backgroundColor = 'white';
                all.style.color = 'black';

                open.style.backgroundColor = 'blue';
                open.style.color = "white";

                ticket.style.backgroundColor = 'white';
                ticket.style.color = 'black';
            })
            .catch(err => console.error(err))
    }

    function handleTicketClick(clickEvent){
        console.log("My Tickets Pressed");
        //Ajax call
        fetch(`./scripts/issues_mine.php`)
            .then(response => response.text())
            .then(data => {
                //console.log(data);
                //Reloading table
                tableBody.innerHTML = "";
                tableBody.innerHTML = data;
                $("#script").empty();
                $("#script").append(`<script type="text/javascript" src="./subpages/js/filter.js"></script>`);
                $("#style").empty();
                $("#style").append(`<link rel="stylesheet" href="./subpages/styles/allissues.css"></link>`);
                
                //Setting Button Colors
                all.style.backgroundColor = 'white';
                all.style.color = 'black';

                open.style.backgroundColor = 'white';
                open.style.color = "black";

                ticket.style.backgroundColor = 'blue';
                ticket.style.color = 'white';
            })
            .catch(err => console.error(err))
    }