/**
 * Theme: Crovex - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * CRM Dashboard Js
 */


   // Performance Report


   $.plot('#CrmDashChart', [{
    data: flotDataType1,
    color: '#1ecab8',
    curvedLines: { apply: true }
  },
  {
    data: flotDataType2,
    color: '#2c77f4',  
    curvedLines: { apply: true }              
  }], 
  {
    series: {                    
        lines: {
            show: true,
            lineWidth: 2,
            fill: true,
            fillColor: { colors: [{ opacity: 0.0 }, { opacity: 0.3}] },
        },
        gradient: {
        radial: true,
        hoverable: true,
        colors: [{opacity: 0.5}, {opacity: 1.0}]},
        shadowSize: 4,
    },
    grid: {
        hoverable: false,
        clickable: false,
        borderWidth: 0,
        labelMargin: 0,
        color: 'rgba(118, 126, 154, 0.4)',
    },
    yaxis: {
        show: false,
        max: 130,
        min: 0,
    },
    xaxis: {
        show: true,
        color: 'rgba(118, 126, 154, .1)',
        ticks: [[0,''],[10,'Jan'],[22,'Feb'],[34,'Mar'],[46,'Apr'],[58,'May'],[70,'Jun'],[82,'Jul'],[94,'Aug'],[106,'Sep'],[118,'Oct'],[130,'Nov'],[142,'Dec']],
    }
});

var options = {
    chart: {
      type: 'radialBar',
      height: 330,
      dropShadow: {
        enabled: true,
        top: 5,
        left: 0,
        bottom: 0,
        right: 0,
        blur: 5,
        color: '#45404a2e',
        opacity: 0.35
      },
    },
    plotOptions: {
      radialBar: {
        offsetY: -10,
        startAngle: 0,
        endAngle: 270,
        hollow: {
          margin: 5,
          size: '50%',
          background: 'transparent',
  
        },
        track: {
          show: false,
        },
        dataLabels: {
          name: {
              fontSize: '18px',
          },
          value: {
              fontSize: '16px',
              color: '#50649c',
          },          
        }
      },
    },
    colors: ['#4d79f6', '#4ac7ec', '#f3c74d'],
    stroke: {
      lineCap: 'round'
    },
    series: [71, 63, 100],
    labels: ['Sent', 'Opened', 'Not Opened'],
    legend: {
      show: true,
      floating: true,
      position: 'left',
      offsetX: -10,
      offsetY: 0,
    },
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                show: true,
                floating: true,
                position: 'left',
                offsetX: 10,
                offsetY: 0,
            }
        }
    }]
  }
  
  
  var chart = new ApexCharts(
    document.querySelector("#d2_performance"),
    options
  );
  
  chart.render();


      
//Dash-Map

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
  