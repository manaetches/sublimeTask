<html>
<head>
	<title>Sublime Streamline Task - Server Line graphs</title>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/chart.min.js"></script>
        <script type="text/javascript" src="js/linegraph.js"></script>
    <style>
    .chart-container {
        width: 800px;
        height: auto;
    }
    label{
        padding: 10px;
    }
        </style>
<script type="text/javascript">
$(document).ready(function () {
//make an ajax call to retrieve list of servers and populate it in a list upon success
$.ajax({
        url : "servers.php",
        type : "GET",
        dataType: 'json',
        success : function(data){
            
          for(var i = 0; i<data.length; i++){

                $('#show-data').append("<option>"+data[i].s_system+"</option>");
          }
        },
        error: function(data){

            alert("Data:"+data);
        }
});
});//end document.ready
</script>
<body>
	<h1>Sublime Streamline Task - Server Line Graphs</h1>
	<label>Select Server:</label><select id="show-data"><option>Please Select</option></select>
        <div class="chart-container">
            <canvas id="mylinegraph"></canvas>
        </div>


<script>
//upon user selection retrieve name of the server and pass this into makeLineGraph
$("#show-data").change(function(){
    var servername = $('#show-data').val();
    
    //call getData function in linegraph.js
    makeLineGraph(servername);

});


</script>
</body>
        

</html>
