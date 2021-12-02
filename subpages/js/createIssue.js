//window.onload = function() {
//$('form').submit(function(event){
    //event.preventDefault()
    $('.btn').click(function(e){

        //reading from form input ..1
        e.preventDefault();
        //console.log('Clicked');
        var title = $('.title').val();
        var description = $('.description').val();
        var assignedTo = $('.assigned').val();
        var type = $('.bug').val();
        var priority = $('.priority').val();

        //console.log(title,assignedTo,priority)
        //Creation of data object to accept form input ..2
        var data = new FormData();

        //Adding form data to the object ..3
        data.append('title',title);
        data.append('description',description);
        data.append('assigned',assignedTo);
        data.append('type',type);
        data.append('priority',priority);
        console.log('clicked')
        

        //Connection To Server in order to send data object with form input ..4
        var xhr = new XMLHttpRequest();
        xhr.open("POST","./subpages/issuesScript.php");
        xhr.onload = function(){console.log(this.response);};
        xhr.send(data);
    })


//})
//}