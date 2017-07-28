//create a function to make ajax calls based on users server selection
	function makeLineGraph(server){
	//make an ajax call to retrieve JSON 
	$.ajax({
		url : "./getStatistics.php?q="+server,
		type : "GET",
		dataType: 'json',
		success : function(data){
			//initialize data arrays which will be used to generate line graph
			var data_value = [];
			var data_label = [];

			//loop through json and push data_value and data_label into arrays
			for(var i in data){
				//console.log(data[i].data_value +" "+data[i].data_label+",");
				data_value.push(data[i].data_value);
				data_label.push(data[i].data_label);

			}
			//create chartdata object and specify properties of the graph
			var chartdata = {
				labels: data_label,
				datasets: [
					{
						label: "curve",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: data_value
					}
				]
			};//end chart data

			//output div 
			var ctx = $("#mylinegraph");

			//finally generate line graph 	
			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {
			console.log("Error:"+data);
		}
	});//end ajax call 
} //end makeLineGraph function