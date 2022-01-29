
var chartData = {

	labels: ["L","M","Me","J","V","S","D"],

	datasets: [{data: [589,455,483,503,689,692,634],},

	{

		data: [639,465,493,478,589,632,674],
	}




	]


};

var chLine = document.getElementById("chLine");

if (chLine){   

new Chart(chLine, {


	type: 'line' ,
	data: chartData,
	options: {
		scales: {
			yAxes: [{

				ticks: {

					beginAtZero:false
				}
			}]
		},
		legend: {
			display: false
		}
	}
});

}