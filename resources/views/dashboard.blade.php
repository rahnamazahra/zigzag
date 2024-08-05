<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Khayat.ir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="chart-container">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
      var options = {
        series: [{
          name: "مشتریان",
          data: @json($monthlyCustomerCounts)
        }],
        chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          },
          toolbar: {
            show: false
          }
        },
        title: {
          text: 'تعداد مشتریان در سال جاری',
          align: 'center',
          style: {
            fontSize: '15px',
            fontFamily: 'MyCustomFont, Arial, sans-serif'
          }
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'],
            opacity: 0.5
          }
        },
        xaxis: {
          categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
          labels: {
            rotate: -90,
            rotateAlways: true,
            hideOverlappingLabels: true,
            showDuplicates: false,
            trim: true,
            minHeight: 100,
            maxHeight: 400,
            style: {
              fontSize: '13px',
              fontFamily: 'MyCustomFont, Arial, sans-serif'
            },
            cssClass: 'apexcharts-xaxis-label',
            offsetX: 0,
            offsetY: 50
          }
        },
        yaxis: {
          min: 0,
          max: 100,
          tickAmount: 10,
          labels: {
            style: {
              fontSize: '13px',
              fontFamily: 'MyCustomFont, Arial, sans-serif'
            },
            formatter: function (value) {
              return value.toFixed(0); // Display whole numbers
            }
          }
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    </script>
</x-app-layout>
