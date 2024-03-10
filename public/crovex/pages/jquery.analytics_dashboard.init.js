/**
 * Theme: Crovex - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Analytics Dashboard Js
 */



var options = {
  chart: {
      height: 350,
      type: 'line',
      stacked: true,
      toolbar: {
        show: false,
        autoSelected: 'zoom'
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 0,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.35
      },
  },
  colors: ['#2a77f4', '#1ccab8', '#f02fc2'],
  dataLabels: {
      enabled: false
  },
  stroke: {
      curve: 'straight',
      width: [4, 4],
      dashArray: [0, 3]
  },
  grid: {
    borderColor: "#45404a2e",
    padding: {
      left: 0,
      right: 0
    }
  },
  markers: {
    size: 0,
    hover: {
      size: 0
    }
  },
  series: [{
      name: 'New Visits',
      data: [0,60,20,90,45,110,55,130,44,110,75,200]
  }, {
      name: 'Unique Visits',
      data: [0,45,10,75,35,94,40,115,30,105,65,190]
  }],

  

  xaxis: {
      type: 'datetime',
      categories: ["2019-09-19T00:00:00", "2019-09-19T01:30:00", "2019-09-19T02:30:00", "2019-09-19T03:30:00", "2019-09-19T04:30:00", "2019-09-19T05:30:00", "2019-09-19T06:30:00", "2019-09-19T07:30:00", "2019-09-19T08:30:00", "2019-09-19T09:30:00", "2019-09-19T10:30:00", "2019-09-19T11:30:00"],  
      axisBorder: {
        show: true,
        color: '#45404a2e',
      },  
      axisTicks: {
        show: true,
        color: '#45404a2e',
      },                  
  },

  fill: {
    type: 'gradient',
    gradient: {
      gradientToColors: ['#F55555', '#B5AC49', '#6094ea']
    },
  },
  tooltip: {
      x: {
          format: 'dd/MM/yy HH:mm'
      },
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right'
  },
}

var chart = new ApexCharts(
  document.querySelector("#liveVisits"),
  options
);

chart.render();




//Device-widget


var options = {
  chart: {
      height: 250,
      type: 'donut',
      dropShadow: {
        enabled: true,
        top: 10,
        left: 0,
        bottom: 0,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.15
    },
  }, 
  plotOptions: {
    pie: {
      donut: {
        size: '65%'
      }
    }
  },
  dataLabels: {
    enabled: false,
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
  },
 
  series: [10, 65, 25,],
  legend: {
      show: true,
      position: 'bottom',
      horizontalAlign: 'center',
      verticalAlign: 'middle',
      floating: false,
      fontSize: '14px',
      offsetX: 0,
      offsetY: -13
  },
  labels: [ "Tablet", "Desktop", "Mobile"],
  colors: ["#34bfa3", "#5d78ff", "#fd3c97"],
 
  responsive: [{
      breakpoint: 600,
      options: {
        plotOptions: {
            donut: {
              customScale: 0.2
            }
          },        
          chart: {
              height: 240
          },
          legend: {
              show: false
          },
      }
  }],

  tooltip: {
    y: {
        formatter: function (val) {
            return   val + " %"
        }
    }
  }
  
}

var chart = new ApexCharts(
  document.querySelector("#ana_device"),
  options
);

chart.render();


var colors = ['#1ecab8', '#fd3c97', '#6d81f5', '#ffb822', '#0dc8de'];
var options = {
  chart: {
      height: 300,
      type: 'bar',
      events: {
        click: function(chart, w, e) {
            console.log(chart, w, e )
        }
    },
    toolbar:{
      show:false
    },
    dropShadow: {
      enabled: true,
      top: 0,
      left: 5,
      bottom: 5,
      right: 0,
      blur: 5,
      color: '#45404a2e',
      opacity: 0.35
  },
  },
  colors: colors,
  plotOptions: {
      bar: {
          dataLabels: {
              position: 'top', // top, center, bottom              
          },
          columnWidth: '30',
          distributed: true,
      },

  },
  dataLabels: {
      enabled: true,
      formatter: function (val) {
          return val + "%";
      },
      offsetY: -20,
      style: {
          fontSize: '12px',
          colors: ["#8997bd"]
      }
  },
  series: [{
      name: 'Inflation',
      data: [ 4.0, 10.1, 6.0, 8.0, 9.1]
  }],
  xaxis: {
      categories: ["Email", "Referral", "Organic", "Direct", "Campaign",],
      position: 'top',
      labels: {
          offsetY: -18,
          style: {
            cssClass: 'apexcharts-xaxis-label',
          },
      },
      axisBorder: {
          show: false
      },
      axisTicks: {
          show: false
      },
      crosshairs: {
          fill: {
              type: 'gradient',
              gradient: {
                  colorFrom: '#D8E3F0',
                  colorTo: '#BED1E6',
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
              }
          }
      },
      tooltip: {
          enabled: true,
          offsetY: -37,
      }
  },
  fill: {
      gradient: {
          type: "gradient",
          gradientToColors: ['#FEB019', '#775DD0', '#FEB019', '#FF4560', '#775DD0'],
      },
  },
  yaxis: {
      axisBorder: {
          show: false
      },
      axisTicks: {
          show: false,
      },
      labels: {
          show: false,
          formatter: function (val) {
              return val + "%";
          }
      }

  },
}

var chart = new ApexCharts(
  document.querySelector("#barchart"),
  options
);

chart.render();



$('#usa').vectorMap({
  map: 'us_aea_en',
  backgroundColor: 'transparent',
  borderColor: '#818181',
  regionStyle: {
    initial: {
      fill: '#7474b126',
    }
  },
  series: {
    regions: [{
        values: {
            "US-VA": '#868ff363',
            "US-PA": '#868ff363',
            "US-TN": '#868ff363',
            "US-WY": '#868ff363',
            "US-WA": '#868ff363',
            "US-TX": '#868ff363',
        },
        attribute: 'fill',
    }]
  },
});

