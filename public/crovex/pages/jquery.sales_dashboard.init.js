/**
 * Theme: Crovex - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Ecommerce Dashboard Js
 */
(function($) {
    'use strict';
    $(function() {
    if ($("#bar").length) {
        var currentChartCanvas = $("#bar").get(0).getContext("2d");
        var currentChart = new Chart(currentChartCanvas, {
            type: 'bar',    
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Revenue",
                    backgroundColor: "#1ccab8",
                    borderColor: "transparent",
                    borderWidth: 2,
                    categoryPercentage: 0.5,
                    hoverBackgroundColor: "#00d8c2",
                    hoverBorderColor: "transparent",
                    data: [30, 39, 20, 31, 41, 25, 20, 39, 20, 31, 41, 25],
                }]        
            },
            
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend : {
                    display: false,
                    labels : {
                        fontColor : '#50649c'  
                    }
                },  
                tooltips: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return data.datasets[tooltipItems.datasetIndex].label +' $ ' + tooltipItems.yLabel + 'k';
                        }
                    }
                },
                
                scales: {
                    xAxes: [{
                        barPercentage: 0.35,
                        categoryPercentage: 0.4,
                        display: true,
                        gridLines: {
                            color: "transparent",
                            borderDash: [0],       
                            zeroLineColor: "transparent",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2] ,         
                        },
                        ticks: {
                            fontColor: '#a4abc5',
                            beginAtZero: true,
                            padding: 12,
                        },
                        
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "#8997bd29", 
                            borderDash: [3],
                            drawBorder: false,
                            drawTicks: false,
                            zeroLineColor: "#8997bd29",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2] ,           
                        },
                        ticks: {                           
                            fontColor: '#a4abc5',
                            beginAtZero: true,
                            padding: 12,
                            callback: function(value) {
                                if ( !(value % 10) ) {
                                    return '$' + value + 'k'
                                }
                            }
                        },                        
                    }]
                },
                
            }
        });
    }
    
    });
})(jQuery);





$('#world-map-markers').vectorMap({
    map : 'world_mill_en',
    scaleColors : ['#eff0f1', '#eff0f1'],
    normalizeFunction : 'polynomial',
    hoverOpacity : 0.7,
    hoverColor : false,
    regionStyle : {
        initial : {
            fill : '#7474b126'
        }
    },
    markers : [ 
      {latLng : [55.75, 37.62],name : 'Russia'}, 
      {latLng : [-25.27, 133.77],name : 'Australia'},  
      {latLng : [20.59, 78.96], name : 'India'},
      {latLng : [39.52, -87.12],name : 'Brazil'}
    ],
    series: {
        regions: [{
            values: {
                "US": '#868ff363',
                "AU": '#868ff363',
                "BR": '#868ff363',
                "RU": '#868ff363',
            },
            attribute: 'fill'
        }]
    },
    markerStyle: {
      initial: {
        stroke: "#7474b126"
      },
      hover: {
        stroke: "rgba(112, 112, 112, 0.30)"
      }
    },
    backgroundColor : 'transparent',
  
    markers: [
      {
        latLng: [37.090240, -95.712891],
        name: "USA",
        style: {
          fill: "#f93b7a"
        }
      },
      {
        latLng: [55.754093, 37.620407],
        name: "Russia",
        style: {
          fill: "#0aafff"
        }
      },
      {
        latLng: [-21.943369, 123.102198],
        name: "Australia",
        style: {
          fill: "#7551e9"
        }
      },
      {
        latLng: [-11.409874, -41.280857],
        name: "Brazil",
        style: {
          fill: "#ffc212"
        }
      }
    ],
   
  });



 // radar      
var options = {
    chart: {
        height: 330,
        type: 'radar',
        toolbar: {
            show: false,
        },
        dropShadow: {
            enabled: true,
            blur: 1,
            left: 1,
            top: 1
        },
    },  
    plotOptions: {
        radar: {
          polygons: {
            strokeColors: '#E3EBF6',
            connectorColors: '#E3EBF6', 
            fill: {
                colors: ['transparent']
            }           
          },
        }
      },
    
    series: [{
        name: 'Phones',
        data: [80, 50, 30, 40, 100, 20],
    }, {
        name: 'Electronics',
        data: [20, 30, 40, 80, 20, 80],
    }, {
        name: 'Clothes',
        data: [44, 76, 78, 13, 43, 10],
    }],
    
    title: {
        show: false,
    },
    stroke: {
        width: 0,
        curve: 'smooth',
    },
    fill: {
        opacity: 0.8, 
        colors:['#ffb822', '#fd3c97', '#1761fd'],   
    },
    markers: {
        size: 0
    },
    legend: {
        show: true,
        offsetX: 0,
        offsetY: -10,
    },
    labels: ['2013', '2014', '2015', '2016', '2017', '2018'],
    }


    var chart = new ApexCharts(
    document.querySelector("#sales-radar"),
    options
    );

    chart.render();

    function update() {

    function randomSeries() {
        var arr = []
        for(var i = 0; i < 6; i++) {
            arr.push(Math.floor(Math.random() * 100)) 
        }

        return arr
    }    

    chart.updateSeries([{
        name: 'Phones',
        data: randomSeries(),
    }, {
        name: 'Electronics',
        data: randomSeries(),
    }, {
        name: 'Clothes',
        data: randomSeries(),
    }])
}

// light_datepick
new Lightpick({
    field: document.getElementById('light_datepick'),
    inline: true,                
});