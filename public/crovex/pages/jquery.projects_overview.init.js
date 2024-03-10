/**
 * Theme: Crovex - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Project Dashboard Js
 */


 
 //colunm-1
  
 var options = {
  chart: {
      height: 340,
      type: 'bar',
      toolbar: {
          show: false
      }
  },
  plotOptions: {
      bar: {
          horizontal: false,
          endingShape: 'rounded',
          columnWidth: '30%',
      },
  },
  dataLabels: {
      enabled: false
  },
  stroke: {
      show: true,
      width: 5,
      colors: ['transparent'],
  },
  colors: ["#1761fd", "#1ecab8", "#ffb822"],
  series: [{
      name: 'Total Budget',
      data: [68, 71, 65, 75, 80,]
  }, {
      name: 'Amount Used',
      data: [51, 42, 36, 61, 70,]
  },{
    name: 'Target Amount',
    data: [48, 55, 42, 60, 60,]
},],
  xaxis: {
      categories: ['Book My World','Organic Farming', 'Transfer money', 'Trading System', 'Banking'],
      axisBorder: {
        show: true,
        color: '#f7f8f9',
      },  
      axisTicks: {
        show: true,
        color: '#bec7e0',
      },    
  },
  yaxis: {
    labels:{
      formatter: (val) => {
        return "$" + val + "k"
      }
    },
  },
  legend: {    
    offsetY: -10
  },
 
  fill: {
      opacity: 1

  },
  grid: {
      row: {
          colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.2
      },
      borderColor: '#f1f3fa'
  },
  tooltip: {
      y: {
          formatter: function (val) {
              return "$" + val + "k"
          }
      }
  }
}

var chart = new ApexCharts(
  document.querySelector("#budgets_chart"),
  options
);

chart.render();




var options = {
  chart: {
      height: 205,
      type: 'donut',
  }, 
  plotOptions: {
    pie: {
      donut: {
        size: '80%',
      }
    }
  },
  dataLabels: {
    enabled: false,
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
  labels: [ "Syrup", "Tablets", "Injections"],
  colors: ["#e0e7fd", "#4d79f6", "#4ac7ec"],
 
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
  document.querySelector("#dash_medicine"),
  options
);

chart.render();

// Todo-task

$(function() {
  var todoListItem = $('.todo-list');
  var todoListInput = $('.todo-list-input');
  $('.add-new-todo-btn').on("click", function(event) {
    event.preventDefault();

    var item = $(this).prevAll('.todo-list-input').val();

    if (item) {
      todoListItem.append("<div class='todo-box'><i class='remove far fa-trash-alt'></i><div class='todo-task'><label class='ckbox'><input type='checkbox'/><span>" + item + "</span><i class='input-helper'></i></label></div></div>");
      todoListInput.val("");
    }

  });

  todoListItem.on('change', '.ckbox', function() {
    if ($(this).attr('checked')) {
      $(this).removeAttr('checked');
    } else {
      $(this).attr('checked', 'checked');
    }

    $(this).closest(".todo-box").toggleClass('completed');

  });

  todoListItem.on('click', '.remove', function() {
    $(this).parent().remove();
  });

}); 

//  Morris Area chart

$( function () {
    "use strict";

  // Performance Report

var options = {
    chart: {
      type: 'radialBar',
      height: 240,
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
    colors: ['#1ecab8', '#fd3c97', '#6d81f5'],
    stroke: {
      lineCap: 'round'
    },
    series: [71, 63, 100],
    labels: ['Completed', 'Active', 'Assigned'],
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
    document.querySelector("#task_status"),
    options
  );
  
  chart.render();
});
 