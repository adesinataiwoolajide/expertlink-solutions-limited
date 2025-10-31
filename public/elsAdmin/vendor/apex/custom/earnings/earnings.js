document.addEventListener('DOMContentLoaded', function () {
  // Sample data for monthly revenue
  const monthlyRevenueData = [
    { month: 'Jan', revenue: 42000 },
    { month: 'Feb', revenue: 35000 },
    { month: 'Mar', revenue: 48000 },
    { month: 'Apr', revenue: 56000 },
    { month: 'May', revenue: 52000 },
    { month: 'Jun', revenue: 60000 },
    { month: 'Jul', revenue: 65000 },
    { month: 'Aug', revenue: 58000 },
    { month: 'Sep', revenue: 72000 },
    { month: 'Oct', revenue: 68000 },
    { month: 'Nov', revenue: 75000 },
    { month: 'Dec', revenue: 82000 }
  ];

  // Prepare data for the chart
  const months = monthlyRevenueData.map(item => item.month);
  const revenue = monthlyRevenueData.map(item => item.revenue);

  // Calculate year-over-year growth (example data)
  const lastYearRevenue = revenue.map(val => val * 0.8); // 20% less for comparison

  // Chart options
  const options = {
    series: [
      {
        name: 'Revenue 2024',
        data: revenue
      },
      {
        name: 'Revenue 2023',
        data: lastYearRevenue
      }
    ],
    chart: {
      height: 350,
      type: 'area',
      toolbar: {
        show: false
      },
      fontFamily: 'Inter, sans-serif',
      animations: {
        enabled: true,
        easing: 'easeinout',
        speed: 800
      },
      dropShadow: {
        enabled: true,
        opacity: 0.1,
        blur: 3,
        left: 2,
        top: 2
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: [3, 2]
    },
    colors: ['#449a78', '#d0e6dd'],
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.7,
        opacityTo: 0.3,
        stops: [0, 90, 100]
      }
    },
    xaxis: {
      categories: months,
      labels: {
        style: {
          fontSize: '12px',
          fontFamily: 'Inter, sans-serif',
        },
      },
    },
    yaxis: {
      labels: {
        formatter: function (value) {
          return '$' + value.toLocaleString();
        },
        style: {
          fontSize: '12px',
          fontFamily: 'Inter, sans-serif',
        },
      },
      title: {
        text: 'Revenue (USD)',
        style: {
          fontSize: '13px',
          fontFamily: 'Inter, sans-serif'
        }
      }
    },
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: function (value) {
          return '$' + value.toLocaleString();
        }
      },
      theme: 'dark',
      style: {
        fontSize: '12px',
        fontFamily: 'Inter, sans-serif',
      }
    },
    grid: {
      borderColor: '#e0e6ed',
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
        right: 20,
        bottom: 0,
        left: 20
      },
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      fontFamily: 'Inter, sans-serif',
      offsetY: -8,
      itemMargin: {
        horizontal: 10
      }
    },
    markers: {
      size: 4,
      hover: {
        size: 6
      }
    },
    responsive: [{
      breakpoint: 768,
      options: {
        chart: {
          height: 300
        },
        legend: {
          position: 'bottom',
          offsetY: 8
        }
      }
    }]
  };

  // Initialize chart
  const chart = new ApexCharts(document.querySelector("#monthlyRevenueChart"), options);
  chart.render();
});