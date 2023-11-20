<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('backend/asset/img/icons/icon-48x48.png') }}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>{{ $title }}</title>

	<link href="{{ asset('backend/asset/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/asset/css/light.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/asset/css/picture.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		
        @include('backend.partials.sidebar')
		<div class="main">
			@include('backend.partials.header')

			<main class="content">
				@yield('container')
			</main>

			@include('backend.partials.footer')
		</div>
	</div>

	<script src="{{ asset('backend/asset/js/app.js') }}"></script>

    @if(request()->is('dashboard*'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
                var gradient = ctx.createLinearGradient(0, 0, 0, 225);
                gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Sales ($)",
                            fill: true,
                            backgroundColor: gradient,
                            borderColor: window.theme.primary,
                            data: [
                                2115,
                                1562,
                                1584,
                                1892,
                                1587,
                                1923,
                                2566,
                                2448,
                                2805,
                                3438,
                                2917,
                                3327
                            ]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 1000
                                },
                                display: true,
                                borderDash: [3, 3],
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }]
                        }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var markers = [{
                        coords: [31.230391, 121.473701],
                        name: "Shanghai"
                    },
                    {
                        coords: [28.704060, 77.102493],
                        name: "Delhi"
                    },
                    {
                        coords: [6.524379, 3.379206],
                        name: "Lagos"
                    },
                    {
                        coords: [35.689487, 139.691711],
                        name: "Tokyo"
                    },
                    {
                        coords: [23.129110, 113.264381],
                        name: "Guangzhou"
                    },
                    {
                        coords: [40.7127837, -74.0059413],
                        name: "New York"
                    },
                    {
                        coords: [34.052235, -118.243683],
                        name: "Los Angeles"
                    },
                    {
                        coords: [41.878113, -87.629799],
                        name: "Chicago"
                    },
                    {
                        coords: [51.507351, -0.127758],
                        name: "London"
                    },
                    {
                        coords: [40.416775, -3.703790],
                        name: "Madrid "
                    }
                ];
                var map = new jsVectorMap({
                    map: "world",
                    selector: "#world_map",
                    zoomButtons: true,
                    markers: markers,
                    markerStyle: {
                        initial: {
                            r: 9,
                            strokeWidth: 7,
                            stokeOpacity: .4,
                            fill: window.theme.primary
                        },
                        hover: {
                            fill: window.theme.primary,
                            stroke: window.theme.primary
                        }
                    },
                    zoomOnScroll: false
                });
                window.addEventListener("resize", () => {
                    map.updateSize();
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
                var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
                document.getElementById("datetimepicker-dashboard").flatpickr({
                    inline: true,
                    prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                    nextArrow: "<span title=\"Next month\">&raquo;</span>",
                    defaultDate: defaultDate
                });
            });
        </script>
    @endif

    @if(request()->is('blog*'))
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		@stack('blogs-filter')
	@endif


</body>

</html>