
document.addEventListener('DOMContentLoaded', function () {

  // Revenue Growth Chart
  var options = {
    series: [{
      name: 'Revenue',
      data: [30000, 40000, 35000, 50000, 49000, 60000, 70000, 91000, 85000, 95000, 106000, 120000]
    }],
    chart: {
      type: 'bar',
      height: 305,
      fontFamily: 'Inter, sans-serif',
      background: 'transparent',
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      },
      animations: {
        enabled: true,
        easing: 'easeinout',
        speed: 800,
        animateGradually: {
          enabled: true,
          delay: 150
        },
        dynamicAnimation: {
          enabled: true,
          speed: 350
        }
      }
    },
    plotOptions: {
      bar: {
        borderRadius: 8,
        columnWidth: '50%',
        dataLabels: {
          position: 'top'
        }
      }
    },
    dataLabels: {
      enabled: false
    },
    colors: ['#49a078'],
    grid: {
      borderColor: 'rgba(241, 245, 249, 0.1)',
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: true
        }
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 10
      }
    },
    markers: {
      size: 3
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        style: {
          fontFamily: 'Inter, sans-serif',
          fontWeight: 500,
          colors: '#94a3b8'
        }
      }
    },
    yaxis: {
      title: {
        text: 'Revenue ($)',
        style: {
          fontSize: '13px',
          fontWeight: 600,
          fontFamily: 'Inter, sans-serif',
          color: '#94a3b8'
        }
      },
      labels: {
        formatter: function (value) {
          return '$' + (value / 1000) + 'k';
        },
        style: {
          fontFamily: 'Inter, sans-serif',
          fontWeight: 500,
          colors: '#94a3b8'
        }
      }
    },
    tooltip: {
      theme: 'dark',
      shared: true,
      intersect: false,
      style: {
        fontSize: '14px',
        fontFamily: 'Inter, sans-serif'
      },
      y: {
        formatter: function (value) {
          return '$' + value.toLocaleString();
        }
      },
      marker: {
        show: true
      }
    },
    responsive: [{
      breakpoint: 768,
      options: {
        plotOptions: {
          bar: {
            columnWidth: '70%'
          }
        }
      }
    }]
  };
  var chart = new ApexCharts(document.querySelector("#revenueGrowthChart"), options);
  chart.render();


  // Customer Insights Chart
  var options = {
    series: [{
      name: 'New Users',
      data: [5100, 7200, 6500, 8900, 10400, 12300, 15600, 18700, 21500, 24800, 27900, 32400]
    }, {
      name: 'Returning Users',
      data: [8400, 9800, 11200, 13500, 15700, 18200, 21300, 24600, 27800, 31500, 34900, 39200]
    }],
    chart: {
      height: 300,
      type: 'area',
      fontFamily: 'Inter, sans-serif',
      background: 'transparent',
      toolbar: {
        show: false
      },
      animations: {
        enabled: true,
        easing: 'easeinout',
        speed: 800,
        animateGradually: {
          enabled: true,
          delay: 150
        },
        dynamicAnimation: {
          enabled: true,
          speed: 350
        }
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 3,
      lineCap: 'round'
    },
    colors: ['#158156', '#93eeca'],
    grid: {
      borderColor: 'rgba(241, 245, 249, 0.1)',
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: true
        }
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 10
      }
    },
    markers: {
      size: 5,
      strokeWidth: 2,
      strokeColors: ['#ffffff', '#ffffff'],
      colors: ['#158156', '#93eeca'],
      hover: {
        size: 8,
        sizeOffset: 3
      }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      labels: {
        style: {
          fontFamily: 'Inter, sans-serif',
          fontWeight: 500,
          colors: '#94a3b8'
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      title: {
        text: 'Users',
        style: {
          fontSize: '13px',
          fontWeight: 600,
          fontFamily: 'Inter, sans-serif',
          color: '#94a3b8'
        }
      },
      labels: {
        formatter: function (value) {
          return (value / 1000).toFixed(1) + 'k';
        },
        style: {
          fontFamily: 'Inter, sans-serif',
          colors: '#94a3b8'
        }
      }
    },
    tooltip: {
      shared: true,
      intersect: false,
      theme: 'dark',
      style: {
        fontSize: '14px',
        fontFamily: 'Inter, sans-serif'
      },
      y: {
        formatter: function (val) {
          return val.toLocaleString() + " users";
        }
      },
      marker: {
        show: true
      },
      x: {
        formatter: function (val) {
          return "Month: " + val;
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      floating: true,
      offsetY: -25,
      offsetX: -5,
      fontFamily: 'Inter, sans-serif',
      labels: {
        colors: '#94a3b8'
      },
      markers: {
        fillColors: ['#158156', '#93eeca'],
        radius: 4
      },
      itemMargin: {
        horizontal: 15,
        vertical: 0
      }
    }
  };
  var chart = new ApexCharts(document.querySelector("#customerInsightsChart"), options);
  chart.render();


  // Acquisition Chart - Sleek, modern design with better visual hierarchy
  var options = {
    series: [{
      name: 'Traffic Source',
      type: 'column',
      data: [42, 28, 18, 12]
    }, {
      name: 'Growth Rate',
      type: 'line',
      data: [15, 7, 12, 9]
    }],
    chart: {
      height: 263,
      type: 'line',
      stacked: false,
      fontFamily: 'Inter, sans-serif',
      background: 'transparent',
      toolbar: {
        show: false
      },
      animations: {
        enabled: true,
        easing: 'easeinout',
        speed: 600,
        animateGradually: {
          enabled: true,
          delay: 100
        },
        dynamicAnimation: {
          enabled: true,
          speed: 350
        }
      },

    },
    colors: ['#5ba789', '#5ba789'],
    plotOptions: {
      bar: {
        borderRadius: 8,
        columnWidth: '50%',
        dataLabels: {
          position: 'top'
        },
        borderRadiusApplication: 'end'
      }
    },
    dataLabels: {
      enabled: true,
      enabledOnSeries: [0],
      formatter: function (val) {
        return val + '%';
      },
      offsetY: -20,
      style: {
        fontSize: '11px',
        colors: ['#606c7c']
      }
    },
    stroke: {
      width: [0, 4],
      curve: 'smooth',
      lineCap: 'round',
      colors: ['transparent', '#e0be36']
    },
    fill: {
      type: ['gradient', 'gradient'],
      opacity: [1, 1],
      gradient: {
        shade: 'light',
        type: "vertical",
        shadeIntensity: 0.5,
        gradientToColors: ['#e0be36', '#fb923c'],
        inverseColors: false,
        opacityFrom: 0.9,
        opacityTo: 0.7,
        stops: [0, 90, 100]
      }
    },
    grid: {
      borderColor: 'rgba(241, 245, 249, 0.1)',
      strokeDashArray: 4,
      padding: {
        top: 30,
        right: 10,
        bottom: 0,
        left: 15
      }
    },
    markers: {
      size: 6,
      strokeWidth: 2,
      colors: ['transparent', '#fff'],
      strokeColors: ['transparent', '#f97316'],
      shape: "circle",
      hover: {
        size: 8
      }
    },
    xaxis: {
      categories: ['Social Media', 'Direct', 'Organic', 'Referrals'],
      labels: {
        style: {
          fontFamily: 'Inter, sans-serif',
          fontWeight: 500,
          colors: '#94a3b8'
        },
        offsetY: 5
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        show: true,
        stroke: {
          color: 'rgba(94, 163, 246, 0.2)',
          width: 8,
          dashArray: 0
        }
      }
    },
    yaxis: [
      {
        title: {
          text: 'Traffic %',
          style: {
            fontWeight: 600,
            fontFamily: 'Inter, sans-serif',
            color: '#94a3b8'
          }
        },
        labels: {
          formatter: function (val) {
            return val.toFixed(0) + '%';
          },
          style: {
            fontFamily: 'Inter, sans-serif',
            colors: '#94a3b8'
          }
        },
        tickAmount: 5
      },
      {
        opposite: true,
        title: {
          text: 'Growth %',
          style: {
            fontWeight: 600,
            fontFamily: 'Inter, sans-serif',
            color: '#94a3b8'
          }
        },
        labels: {
          formatter: function (val) {
            return val.toFixed(0) + '%';
          },
          style: {
            fontFamily: 'Inter, sans-serif',
            colors: '#f97316'
          }
        },
        tickAmount: 5
      }
    ],
    tooltip: {
      shared: true,
      intersect: false,
      theme: 'dark',
      style: {
        fontSize: '14px',
        fontFamily: 'Inter, sans-serif'
      },
      y: {
        formatter: function (val, { seriesIndex }) {
          return val + "%" + (seriesIndex === 1 ? " growth" : " of traffic");
        }
      },
      marker: {
        show: true,
        fillColors: ['#5ba789', '#f97316']
      },
      x: {
        formatter: function (val) {
          return "Channel: " + val;
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      fontFamily: 'Inter, sans-serif',
      fontWeight: 500,
      offsetY: -25,
      markers: {
        width: 12,
        height: 12,
        radius: 6
      },
      itemMargin: {
        horizontal: 15
      },
      labels: {
        colors: '#64748b'
      }
    },
    responsive: [{
      breakpoint: 768,
      options: {
        plotOptions: {
          bar: {
            columnWidth: '70%'
          }
        },
        legend: {
          position: 'bottom',
          horizontalAlign: 'center',
          offsetY: 10
        },
        dataLabels: {
          enabled: false
        }
      }
    }],
    states: {
      hover: {
        filter: {
          type: 'lighten',
          value: 0.1
        }
      },
      active: {
        filter: {
          type: 'darken',
          value: 0.25
        }
      }
    }
  };
  var chart = new ApexCharts(document.querySelector("#acquisitionBarChart"), options);
  chart.render();

});