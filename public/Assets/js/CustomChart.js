function DoubleBar($datasetChart1,$datasetChart2){

var mixedChart1 = document.querySelector("#mixed-chart-1");
if (mixedChart1 !== null) {
  var mixedOptions1 = {
    chart: {
      height: 370,
      type: "bar",
      toolbar: {
        show: false,
      },
    },
    colors: ["#9e6de0", "#faafca"],
    legend: {
      show: true,
      position: "top",
      horizontalAlign: "right",
      markers: {
        width: 20,
        height: 5,
        radius: 0,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "50%",
        barHeight: "10%",
        distributed: false,
      },
    },
    dataLabels: {
      enabled: false,
    },


    series: [
      {
        name: "Container 1",
        type: "column",
        data: $datasetChart1,
      },
      {
        name: "Container 2",
        type: "column",
        data: $datasetChart2,
      },

    ],

    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],

      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
      crosshairs: {
        width: 40,
      },
    },

    fill: {
      opacity: 1,
    },

    tooltip: {
      shared: true,
      intersect: false,
      followCursor: true,
      fixed: {
        enabled: false,
      },
      x: {
        show: false,
      },
      y: {
        title: {
          formatter: function (seriesName) {
            return seriesName;
          },
        },
      },
    },
  };

  var randerMixedChart1 = new ApexCharts(mixedChart1, mixedOptions1);
  randerMixedChart1.render();
}

}

function SingleBar($datasetChart){

    var mixedChart1 = document.querySelector("#mixed-chart-1");
    if (mixedChart1 !== null) {
      var mixedOptions1 = {
        chart: {
          height: 370,
          type: "bar",
          toolbar: {
            show: false,
          },
        },
        colors: ["#9e6de0"],
        legend: {
          show: true,
          position: "top",
          horizontalAlign: "right",
          markers: {
            width: 20,
            height: 5,
            radius: 0,
          },
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "50%",
            barHeight: "10%",
            distributed: false,
          },
        },
        dataLabels: {
          enabled: false,
        },
    
    
        series: [
          {
            name: "Overall Sales",
            type: "column",
            data: $datasetChart,
          },

        ],
    
        xaxis: {
          categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
    
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
          crosshairs: {
            width: 40,
          },
        },
    
        fill: {
          opacity: 1,
        },
    
        tooltip: {
          shared: true,
          intersect: false,
          followCursor: true,
          fixed: {
            enabled: false,
          },
          x: {
            show: false,
          },
          y: {
            title: {
              formatter: function (seriesName) {
                return seriesName;
              },
            },
          },
        },
      };
    
      var randerMixedChart1 = new ApexCharts(mixedChart1, mixedOptions1);
      randerMixedChart1.render();
    }
    
    
    
    }