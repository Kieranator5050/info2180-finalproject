
    console.log("Loaded All Issues JS");

    var all = document.getElementById("filterButtons1");
    var open = document.getElementById("filterButtons2");
    var ticket= document.getElementById("filterButtons3");
    var tableBody = document.getElementById("table-body");

    all.addEventListener('click', handleAllClick);
    open.addEventListener('click',handleOpenClick);
    ticket.addEventListener('click', handleTicketClick);

    function handleAllClick(clickEvent){
        console.log("All Pressed");

        //Ajax call
        fetch(`./scripts/issues_all.php`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                tableBody.innerHTML = "";
                tableBody.innerHTML = data;
            })
            .catch(err => console.error(err))
    }

    function handleOpenClick(clickEvent){
        console.log("Open Pressed");
        //Ajax call
        fetch(`./scripts/issues_open.php`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                tableBody.innerHTML = "";
                tableBody.innerHTML = data;
            })
            .catch(err => console.error(err))
    }

    function handleTicketClick(clickEvent){
        console.log("My Tickets Pressed");
        //Ajax call
        fetch(`./scripts/issues_mine.php`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                tableBody.innerHTML = "";
                tableBody.innerHTML = data;
            })
            .catch(err => console.error(err))
    }