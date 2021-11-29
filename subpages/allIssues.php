<div class="HomeScreen">
    <div class="body">
        <div class="issues">
            <h1>Issues</h1>
            <h1><button type="" id="filterButtons">Create New Issue</button></h1>    
            <br><br><br><br>
            <p>Filter by:</p>
            <button id="filterButtons1">ALL</button>
            <button id="filterButtons2">Open</button>
            <button id="filterButtons3">My Tickets</button>
            <br><br>
        </div>
        
        <table>
            <thead>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Created</th>
            </thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>   
<script>
  document.getElementById("filterButtons2").addEventListener('click', all)

  function all(){
    var info= new XMLHttpRequest();
    info.open('Get', issueView.php)
    
    info.onload= function(){
      if(this.status==200){
        var response = info.responseText
        
      }
    } 
  }
</script>