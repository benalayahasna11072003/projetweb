
<?php 


$(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';

  var data = {
    labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: '# of Votes',
      data: [10, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

  var doughnutPieData = {
    datasets: [{
      data: [90, 30, 30],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
      'Pink',
      'Blue',
      'Yellow',
    ]
  };

  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };

  // Assuming you've fetched new data and stored it in newData variable
  var newData = [80, 50, 25]; // Example new data

  // Get the context of the pieChart canvas element
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");

  // Initialize the pie chart
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: doughnutPieData, // Use doughnutPieData for initial data
    options: doughnutPieOptions
  });


  // Check if pieChart is defined and if it's a valid Chart.js instance
  if (typeof pieChart !== 'undefined' && pieChart instanceof Chart) {
    // Update the data property of the first dataset in the pieChart instance
    pieChart.data.datasets[0].data = newData;

    // Update the chart with the new data
    pieChart.update();
  } else {
    console.error('Pie chart instance is not defined or is not a valid Chart.js instance.');
  }
});
?>
