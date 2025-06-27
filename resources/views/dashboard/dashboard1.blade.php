@extends('layout.master')

@section('content')


<!-- Quick stats boxes -->
<div class="row">

@can('view-members')
<div class="col-lg-3">
    <div class="card shadow-sm rounded-lg">
        <div class="card-body d-flex align-items-center">
            <div class="icon-container bg-primary text-white rounded-circle p-3 mr-3">
                <i class="fas fa-users fa-lg"></i>
            </div>
            <div>
                <h3 class="font-weight-bold mb-0">{{ number_format($active_member + $exp_member) }}</h3>
                <div class="text-muted">Total Clients</div>


                {{-- <div class="text-muted">Total Members</div>
                <div class="fs-sm opacity-75">Active Members: {{ number_format($active_member) }}</div>
                <div class="fs-sm opacity-75">Expired Members: {{ number_format($exp_member) }}</div> --}}
            </div>
        </div>
    </div>
</div>
@endcan

@can('view-restaurant')
<div class="col-lg-3">
    <div class="card shadow-sm rounded-lg">
        <div class="card-body d-flex align-items-center">
            <div class="icon-container bg-pink text-white rounded-circle p-3 mr-3">
                <i class="fas fa-utensils fa-lg"></i>
            </div>
            <div>
                <h3 class="font-weight-bold mb-0">{{ number_format($invoice, 2) }} TSHS</h3>
                <div class="text-muted">Total Order Sales</div>
            </div>
        </div>
    </div>
</div>
@endcan

@can('view-facilities_sales')
<div class="col-lg-3">
    <div class="card shadow-sm rounded-lg">
        <div class="card-body d-flex align-items-center">
            <div class="icon-container bg-warning text-white rounded-circle p-3 mr-3">
                <i class="fas fa-hotel fa-lg"></i>
            </div>
            <div>
                <h3 class="font-weight-bold mb-0">{{ number_format($facility, 2) }} TSHS</h3>
                <div class="text-muted">Total Purchase Order</div>
            </div>
        </div>
    </div>
</div>
@endcan

@can('view-transaction')
<div class="col-lg-3">
    <div class="card shadow-sm rounded-lg">
        <div class="card-body d-flex align-items-center">
            <div class="icon-container bg-primary text-white rounded-circle p-3 mr-3">
                <i class="fas fa-wallet fa-lg"></i>
            </div>
            <div>
                <h3 class="font-weight-bold mb-0">{{ number_format($deposit) }} </h3>
                <div class="text-muted">Total Stores</div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card shadow-sm rounded-lg">
        <div class="card-body d-flex align-items-center">
            <div class="icon-container bg-danger text-white rounded-circle p-3 mr-3">
                <i class="fas fa-credit-card fa-lg"></i>
            </div>
            <div>
                <h3 class="font-weight-bold mb-0">{{ number_format($expense) }} </h3>
                <div class="text-muted">Total Suppliers</div>
            </div>
        </div>
    </div>
</div>
@endcan


</div>


<br>
<!-- Main charts -->
<div class="row">
    @can('manage-orders')
    <div class="col-xl-10 col-md-12">
        <!-- Traffic sources -->
        <div class="card">
            <div class="card-body">
                <div class="chart-container">
                    <div class="chart has-fixed-height" id="tracking"></div>
                </div>
            </div>
        </div>
        <!-- /traffic sources -->
    </div>
    @endcan


    @can('view-payroll_summary')
    {{-- <div class="col-xl-12">
        <!-- Traffic sources -->
        <div class="card">
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <!-- /traffic sources -->
    </div> --}}
    @endcan

</div>
<!-- /main charts -->

</div>
@endsection


@section('scripts')
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Total Amount',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      display: false,
      },

    tooltips: {
        callbacks: {
           label: function(tooltipItem) {
                  return tooltipItem.yLabel;
           }
        }
    },
      title: {
        display: true,
        text: 'Payroll Payments for the year <?php echo date('Y') ?>',
        font: {
          size: 20
        }
      }
    }
  },
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>


<script type="text/javascript">
 var bars_basic_element = document.getElementById('tracking');
if ( bars_basic_element ) {
   var bars_basic = echarts.init(bars_basic_element);
  bars_basic.setOption({
              
      // Setup grid
                grid: {
                    left: 0,
                    right: 0,
                    top: 35,
                    bottom: 0,
                    containLabel: true
                },

                // Add legend
                legend: {
                     data: ['Order In Queue', 'Collected','Loaded','OffLoaded','Delivered'],
                    itemHeight: 8,
                    itemGap: 20,
                    textStyle: {
                        padding: [0, 5]
                    }
                },
 title: {
            text: 'Cargo Tracking',
            left: 'center',
            textStyle: {
                fontSize: 17,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 12
            }
        },

      // Add tooltip
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(0,0,0,0.75)',
                    padding: [10, 15],
                    textStyle: {
                        fontSize: 13,
                        fontFamily: 'Roboto, sans-serif'
                    },
                    axisPointer: {
                        type: 'shadow',
                        shadowStyle: {
                            color: 'rgba(0,0,0,0.025)'
                        }
                    }
                },

      // Vertical axis
                yAxis: [{
                    type: 'value',
                    boundaryGap: [0, 0.01],
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#eee',
                            type: 'dashed'
                        }
                    }
                }],

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                     data: ['Order In Queue', 'Collected','Loaded','OffLoaded','Delivered'],
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: ['#eee']
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                        }
                    }
                }],


        series: [{
            name: 'Cargo Tracking',
          type: 'bar',
                        itemStyle: {
                            normal: {
                                color: '#5470c6'
                            }
                        },
            data: [
              
            ]
        }]


    });



}
</script>



@endsection