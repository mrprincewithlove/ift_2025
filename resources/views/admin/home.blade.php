@extends('layouts.admin_base')

@section('content')


    <style>
        .chart-container {
            width: 100%; /* Full width */
            height: 100px; /* Specific height */
        }

        .chart-container canvas {
            min-width: 900px;
            height: 100%; /* Full height */
            width: 100%; /* Full width */
        }
    </style>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report Obshiy raport
                        </h2>
                        <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                                                                      class="w-4 h-4 mr-3"></i> Reload
                            Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">

                        <div class="col-span-12 grid grid-cols-12 gap-6">

                            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                <div class="box p-5 zoom-in relative overflow-hidden">
          <span class="absolute top-0 right-0 p-1 bg-primary text-white">
            <i data-lucide="external-link" class="w-4 h-4"></i>
          </span>
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">New Products</div>
                                            <div class="text-slate-500 mt-1">1450 Products</div>
                                        </div>
                                        <div class="flex-none ml-auto relative">
                                            <div class="w-[90px] h-[90px]">
                                                <canvas id="report-donut-chart-2" width="90" height="90"
                                                        style="display: block; box-sizing: border-box; height: 90px; width: 90px;"></canvas>
                                            </div>
                                            <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                                45%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                <div class="box p-5 zoom-in relative overflow-hidden">
          <span class="absolute top-0 right-0 p-1 bg-primary text-white">
            <i data-lucide="external-link" class="w-4 h-4"></i>
          </span>
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">New Chart</div>
                                            <div class="text-slate-500 mt-1">1450 Products</div>
                                        </div>
                                        <div class="flex-none ml-auto relative">
                                            <div class="w-[90px] h-[90px]">
                                                <canvas id="donutChart1" width="90" height="90"
                                                        style="display: block; box-sizing: border-box; height: 90px; width: 90px;"></canvas>
                                            </div>
                                            <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                                45%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">--}}
                                {{--<div class="box p-5 zoom-in relative overflow-hidden">--}}
          {{--<span class="absolute top-0 right-0 p-1 bg-primary text-white">--}}
            {{--<i data-lucide="external-link" class="w-4 h-4"></i>--}}
          {{--</span>--}}
                                    {{--<div class="flex items-center">--}}
                                        {{--<div class="w-2/4 flex-none">--}}
                                            {{--<div class="text-lg font-medium truncate">New Products</div>--}}
                                            {{--<div class="text-slate-500 mt-1">1450 Products</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="flex-none ml-auto relative">--}}
                                            {{--<div class="w-[90px] h-[90px]">--}}
                                                {{--<div class="" id="donut-chart"></div>--}}

                                            {{--</div>--}}
                                            {{--<div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">--}}
                                                {{--45%--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                <div class="box p-5 zoom-in relative overflow-hidden">
          <span class="absolute top-0 right-0 p-1 bg-primary text-white">
            <i data-lucide="external-link" class="w-4 h-4"></i>
          </span>

                                    <div class="">
                                        <div class="h-[58px] w-full">
                                            <canvas class="simple-line-chart-1 -ml-1" width="191" height="58"
                                                    style="display: block; box-sizing: border-box; height: 58px; width: 191px;"></canvas>

                                        </div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="text-lg font-medium truncate mr-3">Posted Ads</div>
                                        <div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">
                                            18000 Campaign
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                                <div class="box p-5 zoom-in relative overflow-hidden">
                                  <span class="absolute top-0 right-0 p-1 bg-primary text-white">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                  </span>

                                    <div class="">
                                        <div class="h-[58px] w-full">
                                            <canvas class="lineChart1 -ml-1" width="191" height="58"
                                                    style="display: block; box-sizing: border-box; height: 58px; width: 191px;"></canvas>

                                        </div>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="text-lg font-medium truncate mr-3">Posted Ads</div>
                                        <div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">
                                            18000 Campaign
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">--}}
                                {{--<div class="box p-5 zoom-in relative overflow-hidden">--}}
          {{--<span class="absolute top-0 right-0 p-1 bg-primary text-white">--}}
            {{--<i data-lucide="external-link" class="w-4 h-4"></i>--}}
          {{--</span>--}}

                                    {{--<div class="h-[158px]">--}}
                                        {{--<div id="area-chart"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="flex mt-1">--}}
                                        {{--<div class="text-lg font-medium truncate mr-3">Posted Ads</div>--}}
                                        {{--<div class="py-1 px-2 flex items-center rounded-full text-xs bg-slate-100 dark:bg-darkmode-400 text-slate-500 cursor-pointer ml-auto truncate">--}}
                                            {{--18000 Campaign--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>

                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                 title="33% Higher than last month"> 33% <i data-lucide="chevron-up"
                                                                                            class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                    <div class="text-base text-slate-500 mt-1">Item Sales</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                                 title="2% Lower than last month"> 2% <i data-lucide="chevron-down"
                                                                                         class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                    <div class="text-base text-slate-500 mt-1">New Orders</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                 title="12% Higher than last month"> 12% <i data-lucide="chevron-up"
                                                                                            class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                    <div class="text-base text-slate-500 mt-1">Total Products</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                 title="22% Higher than last month"> 22% <i data-lucide="chevron-up"
                                                                                            class="w-4 h-4 ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                    <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

            </div>
        </div>
    </div>


@endsection

@push('customJS')

    {{--canvas chart start--}}
    <script src="{{asset('assets/js/chart.js')}}"></script>

    <script>
        const colors = {
            pending: (opacity) => `rgba(253, 230, 138, ${opacity})`,  // Tailwind: yellow-400
            warning: (opacity) => `rgba(239, 68, 68, ${opacity})`,   // Tailwind: red-600
            primary: (opacity) => `rgba(37, 99, 235, ${opacity})`,    // Tailwind: blue-600
            darkmode: {
                700: () => 'rgba(31, 41, 55, 1)',  // Tailwind: gray-800
            },
            white: 'rgba(255, 255, 255, 1)',      // White
        };

        if ($("#donutChart1").length) {
            var _ctx6 = $("#donutChart1")[0].getContext("2d");

            var _myDoughnutChart2 = new Chart(_ctx6, {
                type: "doughnut",
                data: {
                    labels: ["Yellow", "Dark"],
                    datasets: [{
                        data: [15, 10, 65],
                        backgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9)
                        ],
                        hoverBackgroundColor: [
                            colors.pending(0.9),
                            colors.warning(0.9),
                            colors.primary(0.9)
                        ],
                        borderWidth: 2,
                        borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    cutout: "83%"
                }
            });
        }

        if ($(".lineChart1").length) {
            $(".lineChart1").each(function () {
                var ctx = $(this)[0].getContext("2d");

                var myChart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "# of Votes",
                            data: [0, 200, 250, 200, 500, 450, 850, 1050, 950, 1100, 900, 1200], // Example data
                            borderWidth: 2,
                            borderColor: 'rgba(52, 144, 220, 0.8)', // Tailwind blue-500
                            backgroundColor: 'transparent',
                            pointBorderWidth: 0,
                            pointBorderColor: 'rgba(52, 144, 220, 0.8)', // Same color for points
                            tension: 0.4,
                            scales:false,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    display: false // Show x-axis labels
                                },
                                grid: {
                                    display: false,
                                    drawBorder: false
                                }
                            },
                            y: {
                                ticks: {
                                    display: false // Show y-axis labels
                                },
                                grid: {
                                    display: false, // Show y-axis grid
                                    color: 'rgba(200, 200, 200, 0)',
                                    drawBorder: false
                                }
                            }
                        }
                    }
                });
            });
        }

    </script>
    {{--canvas chart end--}}

    <script src="{{asset('assets/js/apexChart.js')}}"></script>

    {{--<script>--}}

        {{--const options = {--}}
            {{--chart: {--}}
                {{--height: "100%",--}}
                {{--maxWidth: "100%",--}}
                {{--type: "area",--}}
                {{--fontFamily: "Inter, sans-serif",--}}
                {{--dropShadow: {--}}
                    {{--enabled: false,--}}
                {{--},--}}
                {{--toolbar: {--}}
                    {{--show: false,--}}
                {{--},--}}
            {{--},--}}
            {{--tooltip: {--}}
                {{--enabled: true,--}}
                {{--x: {--}}
                    {{--show: false,--}}
                {{--},--}}
            {{--},--}}
            {{--fill: {--}}
                {{--type: "gradient",--}}
                {{--gradient: {--}}
                    {{--opacityFrom: 0.55,--}}
                    {{--opacityTo: 0,--}}
                    {{--shade: "#1C64F2",--}}
                    {{--gradientToColors: ["#1C64F2"],--}}
                {{--},--}}
            {{--},--}}
            {{--dataLabels: {--}}
                {{--enabled: false,--}}
            {{--},--}}
            {{--stroke: {--}}
                {{--width: 2,--}}
            {{--},--}}
            {{--grid: {--}}
                {{--show: true,--}}
                {{--strokeDashArray: 4,--}}
                {{--padding: {--}}
                    {{--left: 0,--}}
                    {{--right: -0,--}}
                    {{--top: 0--}}
                {{--},--}}
            {{--},--}}
            {{--series: [--}}
                {{--{--}}
                    {{--name: "New users",--}}
                    {{--data: [1500, 1418, 1456, 1526, 1356, 1456],--}}
                    {{--color: "#1A56DB",--}}
                {{--},--}}
            {{--],--}}
            {{--xaxis: {--}}
                {{--categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],--}}
                {{--labels: {--}}
                    {{--show: false,--}}
                {{--},--}}
                {{--axisBorder: {--}}
                    {{--show: false,--}}
                {{--},--}}
                {{--axisTicks: {--}}
                    {{--show: false,--}}
                {{--},--}}
            {{--},--}}
            {{--yaxis: {--}}
                {{--show: false,--}}
            {{--},--}}
        {{--}--}}

        {{--if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {--}}
            {{--const chart = new ApexCharts(document.getElementById("area-chart"), options);--}}
            {{--chart.render();--}}
        {{--}--}}

    {{--</script>--}}

    {{--<script>--}}


        {{--const getChartOptions = () => {--}}
            {{--return {--}}
                {{--series: [35.1, 23.5, 2.4, 5.4],--}}
                {{--colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],--}}
                {{--chart: {--}}
                    {{--height: 90,--}}
                    {{--width: "100%",--}}
                    {{--type: "donut",--}}
                {{--},--}}
                {{--stroke: {--}}
                    {{--colors: ["transparent"],--}}
                    {{--lineCap: "",--}}
                {{--},--}}
                {{--plotOptions: {--}}
                    {{--pie: {--}}
                        {{--donut: {--}}
                            {{--labels: {--}}
                                {{--show: true,--}}
                                {{--name: {--}}
                                    {{--show: true,--}}
                                    {{--fontFamily: "Inter, sans-serif",--}}
                                    {{--offsetY: 20,--}}
                                {{--},--}}
                                {{--total: {--}}
                                    {{--showAlways: true,--}}
                                    {{--show: true,--}}
                                    {{--label: "Sapar aga",--}}
                                    {{--fontFamily: "Inter, sans-serif",--}}
                                    {{--formatter: function (w) {--}}
                                        {{--const sum = w.globals.seriesTotals.reduce((a, b) => {--}}
                                            {{--return a + b--}}
                                        {{--}, 0)--}}
                                        {{--return '$' + sum + 'k'--}}
                                    {{--},--}}
                                {{--},--}}
                                {{--value: {--}}
                                    {{--show: true,--}}
                                    {{--fontFamily: "Inter, sans-serif",--}}
                                    {{--offsetY: -20,--}}
                                    {{--formatter: function (value) {--}}
                                        {{--return value + "k"--}}
                                    {{--},--}}
                                {{--},--}}
                            {{--},--}}
                            {{--size: 90,--}}
                        {{--},--}}
                    {{--},--}}
                {{--},--}}
                {{--grid: {--}}
                    {{--padding: {--}}
                        {{--top: -2,--}}
                    {{--},--}}
                {{--},--}}
                {{--// labels: ["Direct", "Sponsor", "Affiliate", "Email marketing"],--}}
                {{--dataLabels: {--}}
                    {{--enabled: false,--}}
                {{--},--}}
                {{--legend: {--}}
                    {{--show: false,--}}
                    {{--position: "bottom",--}}
                    {{--fontFamily: "Inter, sans-serif",--}}
                {{--},--}}
                {{--yaxis: {--}}
                    {{--labels: {--}}
                        {{--formatter: function (value) {--}}
                            {{--return value + "k"--}}
                        {{--},--}}
                    {{--},--}}
                {{--},--}}
                {{--xaxis: {--}}
                    {{--labels: {--}}
                        {{--formatter: function (value) {--}}
                            {{--return value  + "k"--}}
                        {{--},--}}
                    {{--},--}}
                    {{--axisTicks: {--}}
                        {{--show: false,--}}
                    {{--},--}}
                    {{--axisBorder: {--}}
                        {{--show: false,--}}
                    {{--},--}}
                {{--},--}}
            {{--}--}}
        {{--}--}}

        {{--if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {--}}
            {{--const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());--}}
            {{--chart.render();--}}

            {{--// Get all the checkboxes by their class name--}}
            {{--const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');--}}

            {{--// Function to handle the checkbox change event--}}
            {{--function handleCheckboxChange(event, chart) {--}}
                {{--const checkbox = event.target;--}}
                {{--if (checkbox.checked) {--}}
                    {{--switch(checkbox.value) {--}}
                        {{--case 'desktop':--}}
                            {{--chart.updateSeries([15.1, 22.5, 4.4, 8.4]);--}}
                            {{--break;--}}
                        {{--case 'tablet':--}}
                            {{--chart.updateSeries([25.1, 26.5, 1.4, 3.4]);--}}
                            {{--break;--}}
                        {{--case 'mobile':--}}
                            {{--chart.updateSeries([45.1, 27.5, 8.4, 2.4]);--}}
                            {{--break;--}}
                        {{--default:--}}
                            {{--chart.updateSeries([55.1, 28.5, 1.4, 5.4]);--}}
                    {{--}--}}

                {{--} else {--}}
                    {{--chart.updateSeries([35.1, 23.5, 2.4, 5.4]);--}}
                {{--}--}}
            {{--}--}}

            {{--// Attach the event listener to each checkbox--}}
            {{--checkboxes.forEach((checkbox) => {--}}
                {{--checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));--}}
            {{--});--}}
        {{--}--}}


    {{--</script>--}}

@endpush