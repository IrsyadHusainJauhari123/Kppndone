<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>DASBOARD KPPN KETAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis2.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.standalone.min.css"
        integrity="sha512-D5/oUZrMTZE/y4ldsD6UOeuPR4lwjLnfNMWkjC0pffPTCVlqzcHTNvkn3dhL7C0gYifHQJAIrRTASbMvLmpEug=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link rel="stylesheet" href="../assets/css/demo.css"> -->
</head>

<body>
    <div class="wrapper horizontal-layout-3">

        <div class="main-panel">

            <div class="bg-primary2 pt-3 pb-4">
                <div class="container text-white py-2">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <div class="image">
                                <img src="{{ url('/') }}/intres1.png" class="img" width="300">
                            </div><br>
                            <h5 class="op-7 mb-3">Monitoring Data Pagu Dan Realisasi</h5>
                        </div>
                        <div class="ml-auto">
                            <!-- <a href="#" class="btn btn-info btn-round">Manage</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt--5">
                <div class="page-inner mt--1">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <form action="{{ url('depan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-inline mt--1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Filter:</span>
                                        </div>

                                        <input type="text" name="tahun" class="form-control date-picker-tahun"
                                            placeholder="Pilih Tahun">
                                        {{-- <select name="kode_ba" class="form-control" id="validationDefault01">
                                            <option value="">Pilih Kode BA</option>
                                            @foreach ($kb as $k)
                                                <option value="{{ $k->kode_ba }}">{{ $k->kode_ba }}</option>
                                            @endforeach
                                        </select>
                                        <select name="kode_akun" class="form-control" id="validationDefault02">
                                            <option value="">Pilih Kode Akun</option>
                                            @foreach ($ka as $k)
                                                <option value="{{ $k->kode_akun }}">{{ $k->kode_akun }}</option>
                                            @endforeach
                                        </select> --}}
                                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i>
                                            Cari</button>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div style="margin-left: 20%" class="form-group">
                            <div class="input-icon">
                                <input type="text" id="pac-input" name="pac-input" class="form-control"
                                    onkeyup="prosesMenu()" placeholder="Cari Lokasi">
                                <!-- <input type="text" id="pac-input" name="pac-input" placeholder="Cari Lokasi"> -->
                                <span class="input-icon-addon">
                                    <i style="color: green" class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="row mb-4 data">
                    <div class="col-md-12 mb-3">
                        <h3>Kabupaten Ketapang</h3>
                        <iframe class="mb-1"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2041910.9689877087!2d108.08202821872631!3d-1.6780171591466038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e044cf6da61153f%3A0x201126c1f8e4178!2sKabupaten%20Ketapang%2C%20Kalimantan%20Barat!5e0!3m2!1sid!2sid!4v1695098678400!5m2!1sid!2sid"
                            width="1110" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <!-- <div class="form-group"> -->
                        <!-- <label for="">Location Search</label>  -->
                        <!-- <div id="pac-container"> -->
                        <!-- <input type="text" id="pac-input" name="pac-input" placeholder="Cari Lokasi"> -->
                        <!-- <div id="location-error"></div> -->
                        <!-- </div> -->
                        <!-- </div> -->
                        <!-- <div class="form-group">
                    <div id="map" style="width:1110px;height:300px"></div>
                   </div> -->
                    </div>
                    <div class="col-md-4">
                        <span>Pagu dan Realisasi Per Jenis Belanja</span>
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <span> dan Realisasi Perbulan</span>
                        <div class="chart-container">
                            <canvas id="lineChart6"></canvas>
                        </div>

                    </div>
                    <div class="col-md-6 mt-5">
                        <span>Pagu dan Realisasi Per Kementerian Lembaga Pagu</span>
                        <div class="chart-container">
                            <canvas id="barChart3" style="width: 50%; height: 50%"></canvas>
                        </div>
                        <table border='1' width="100%">


                            <thead style="text-align: center">
                                <th>Kode BA</th>
                                <th>Deskripsi</th>

                            </thead>
                            @foreach ($list_kodeba as $kodeba)
                                <tbody style="font-size: 10px">
                                    <td style="text-align: center">{{ $kodeba->kode_ba }}</td>
                                    <td>{{ $kodeba->deskripsi }}</td>
                                </tbody>
                            @endforeach
                            {{-- <tr>
                                    <th>Realisasi</th>
                                    @foreach ($list_ktg_r_h as $ktg_rh)
                                    <th>{{$ktg_rh->kode_ba}}</th>
                                    @endforeach
                                </tr> --}}

                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </table>
                    </div>
                    <div class="col-md-6 mt-5">
                        <span>Pagu dan Realisasi Transfer Ke Daerah Perjenis Belanja</span>
                        <div class="chart-container">
                            <canvas id="barChart10"></canvas>
                        </div>
                        <table border='1' width="100%">
                            <thead style="text-align: center">
                                <th>Kode akun</th>
                                <th>Deskripsi</th>

                            </thead>
                            @foreach ($list_kodeakun as $kodeakun)
                                <tbody style="font-size: 10px">
                                    <td style="text-align: center">{{ $kodeakun->kode_akun }}</td>
                                    <td>{{ $kodeakun->deskripsi }}</td>
                                </tbody>
                            @endforeach
                            {{-- <tr>
                                    <th>Realisasi</th>
                                    @foreach ($list_ktg_r_h as $ktg_rh)
                                    <th>{{$ktg_rh->kode_ba}}</th>
                                    @endforeach
                                </tr> --}}

                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </table>

                    </div>

                </div>
                <div class="row mb-4 data">
                    <div class="col-md-12 mb-3">
                        <h3>Kabupaten Kayong Utara</h3>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1021114.8862682709!2d108.87217000000005!3d-1.3382721202032424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e04acd6984ba2c1%3A0x62f9828812cf258f!2sKabupaten%20Kayong%20Utara%2C%20Kalimantan%20Barat!5e0!3m2!1sid!2sid!4v1695084616928!5m2!1sid!2sid"
                            width="1110" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    {{-- <div class="col-md-3">
                            <span>Pagu dan Realisasi Perjenis Belanja</span>
                            <div class="chart-container">
                                <canvas id="pieChart4" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div> --}}
                    <div class="col-md-4">
                        <span>Pagu dan Realisasi Per Jenis Belanja</span>
                        <div class="chart-container">
                            <canvas id="barChart4"></canvas>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span>Pagu dan Realisasi Perbulan</span>
                        <div class="chart-container">
                            <canvas id="lineChart10" style="width: 50%; height: 50%"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <span>Pagu dan Realisasi Per Kementerian Lembaga</span>
                        <div class="chart-container">
                            <canvas id="barChart5"></canvas>
                        </div>
                        <table border='1' width="100%">


                            <thead style="text-align: center">
                                <th>Kode BA</th>
                                <th>Deskripsi</th>

                            </thead>
                            @foreach ($list_kodeba as $kodeba)
                                <tbody style="font-size: 10px">
                                    <td style="text-align: center">{{ $kodeba->kode_ba }}</td>
                                    <td>{{ $kodeba->deskripsi }}</td>
                                </tbody>
                            @endforeach
                            {{-- <tr>
                                    <th>Realisasi</th>
                                    @foreach ($list_ktg_r_h as $ktg_rh)
                                    <th>{{$ktg_rh->kode_ba}}</th>
                                    @endforeach
                                </tr> --}}

                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </table>
                    </div>

                    <div class="col-md-6 mt-5">
                        <span>Pagu dan Realisasi Transfer Ke Daerah Perjenis Belanja</span>
                        <div class="chart-container">
                            <canvas id="barChart6"></canvas>
                        </div>
                        <table border='1' width="100%">
                            <thead style="text-align: center">
                                <th>Kode akun</th>
                                <th>Deskripsi</th>

                            </thead>
                            @foreach ($list_kodeakun as $kodeakun)
                                <tbody style="font-size: 10px ">
                                    <td style="text-align: center">{{ $kodeakun->kode_akun }}</td>
                                    <td>{{ $kodeakun->deskripsi }}</td>
                                </tbody>
                            @endforeach
                            {{-- <tr>
                                    <th>Realisasi</th>
                                    @foreach ($list_ktg_r_h as $ktg_rh)
                                    <th>{{$ktg_rh->kode_ba}}</th>
                                    @endforeach
                                </tr> --}}

                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <!-- <nav class="pull-left">
                 <ul class="nav">
                  <li class="nav-item">
                   <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                   </a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="#">
                    Help
                   </a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="#">
                    Licenses
                   </a>
                  </li>
                 </ul>
                </nav> -->
            <div class="copyright">
                KPPN Ketapang
            </div>
        </div>
    </footer>

    </div>

    <script>
        function prosesMenu() {
            var input = document.getElementById("pac-input");
            var filter = input.value.toLowerCase();
            var a = document.querySelectorAll(".data");

            for (var i = 0; i < a.length; i++) {
                var ahref = a[i];
                if (ahref.innerHTML.toLowerCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>

    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Atlantis JS -->
    <script src="../assets/js/atlantis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/locales/bootstrap-datepicker.id.min.js"
        integrity="sha512-5dCXH+uVhgMJkIOoV1tEejq2voWTEqqh2Q2+Caz6//+6i9dLpfyDmAzKcdbogrXjPLanlDO5pTsBDKzmaJcWFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTL1Y3hIK6L-NuMojKK_L0NBCh0YGgSd0&libraries=places&callback=initMap"
        async defer></script> -->
    <!-- <script src="src/maplabel-compiled.js"></script> -->



    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script>
        // function initMap() {
        // 	const myLatLng = { lat: -1.5389853619704936, lng: 110.5202486291896 };
        // 	var centerCoordinates = new google.maps.LatLng(-1.5389853619704936, 110.5202486291896);
        // 	var map = new google.maps.Map(document.getElementById('map'), {
        // 		center: centerCoordinates,
        // 		zoom: 7
        // 	});

        // 	var card = document.getElementById('pac-card');
        // 	var input = document.getElementById('pac-input');
        // 	var infowindowContent = document.getElementById('infowindow-content');

        // 	map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        // 	var autocomplete = new google.maps.places.Autocomplete(input);
        // 	var infowindow = new google.maps.InfoWindow();
        // 	infowindow.setContent(infowindowContent);

        // var mapLabel = new MapLabel({
        // 	text: 'Test',
        // 	position: new google.maps.LatLng(-1.5389853619704936, 110.5202486291896),
        // 	map: map,
        // 	fontSize: 20,
        // 	align: 'center'
        // });
        // mapLabel.set('position', new google.maps.LatLng(-1.5389853619704936, 110.5202486291896));

        // var marker = new google.maps.Marker({
        // 	position: myLatLng,
        // 	// label: "data",
        // 	// name: 'Your Text',
        // 	map: map,
        // });

        // var marker = new google.maps.Marker();
        // marker.bindTo('map', mapLabel);
        // marker.bindTo('position', mapLabel);
        // marker.setDraggable(true);

        // google.maps.event.addDomListener(window, 'load', init);

        // aMapLabel = new MapLabel({
        //              text: 'Your Text',
        //              position: mapLabelCenter,
        //              strokeColor: '#FFFFFF',
        //              fontColor: '#FFFFFF',
        //              map: map,
        //              fontSize: 24,
        //              strokeWeight: 0,
        //              align: 'left'
        //          });

        //          marker.bindTo('map', aMapLabel);
        //          marker.bindTo('position', aMapLabel);


        // 	autocomplete.addListener('place_changed', function() {
        // 		document.getElementById("location-error").style.display = 'none';
        // 		infowindow.close();
        // 		marker.setVisible(false);
        // 		var place = autocomplete.getPlace();
        // 		if (!place.geometry) {
        // 			document.getElementById("location-error").style.display = 'inline-block';
        // 			document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
        // 			return;
        // 		}

        // 		map.fitBounds(place.geometry.viewport);
        // 		marker.setPosition(place.geometry.location);
        // 		marker.setVisible(true);

        // 		infowindowContent.children['place-icon'].src = place.icon;
        // 		infowindowContent.children['place-name'].textContent = place.name;
        // 		infowindowContent.children['place-address'].textContent = input.value;
        // 		infowindow.open(map, marker);
        // 	});
        // }
    </script>


    <script>
        $('.date-picker-bulan').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });

        // var pieChart = document.getElementById('pieChart').getContext('2d'),
        //     pieChart2 = document.getElementById('pieChart2').getContext('2d'),
        //     pieChart3 = document.getElementById('pieChart3').getContext('2d'),
        //     pieChart4 = document.getElementById('pieChart4').getContext('2d'),
        //     // doughnutChart = document.getElementById('doughnutChart').getContext('2d'),
        //     // radarChart = document.getElementById('radarChart').getContext('2d'),
        //     // bubbleChart = document.getElementById('bubbleChart').getContext('2d'),
        //     // multipleLineChart = document.getElementById('multipleLineChart').getContext('2d'),
        //     // multipleBarChart = document.getElementById('multipleBarChart').getContext('2d'),
        //     // htmlLegendsChart = document.getElementById('htmlLegendsChart').getContext('2d'),
        //     barChartHorizontal = document.getElementById('barChartHorizontal').getContext('2d'),
        //     barChartHorizontal1 = document.getElementById('barChartHorizontal1').getContext('2d'),
        //     barChart1 = document.getElementById('barChart1').getContext('2d');
    </script>

    {{-- Bar Chart 1 --}}
    <script>
        //pemangillan Js diagram pada controler//

        var barChart = document.getElementById('barChart').getContext('2d');


        var myBarChart = new Chart(barChart, {
            type: 'bar',
            data: {

                labels: [
                    @foreach ($list_ktg_r as $data)
                        {{ $data->kode_akun }},
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_ktg_r as $data)
                                {{ $data->total_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_ktg_p as $data)
                                {{ $data->total_pagu }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Pagu dan Realisasi'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>

    {{-- Horizontal Bar Chart --}}
    <script>
        var barChart3 = document.getElementById('barChart3').getContext('2d');


        var myBarChart3 = new Chart(barChart3, {
            type: 'horizontalBar',
            data: {

                labels: [
                    @foreach ($list_ktg_p_h as $data)
                        `{{ $data->kode_ba }}`,
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_ktg_r_h as $data)
                                {{ $data->total_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_ktg_p_h as $data1)
                                {{ $data1->total_pagu }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Pagu dan Realisasi'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>

    {{-- line chart --}}
    <script>
        var lineChart6 = document.getElementById('lineChart6').getContext('2d');

        var myLineChart6 = new Chart(lineChart6, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Persentase",
                    borderColor: "#1d7af3",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#1d7af3",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    backgroundColor: 'transparent',
                    fill: true,
                    borderWidth: 2,
                    data: [
                        @foreach ($list_ktg_r_p as $list_11)
                            {{ $list_11->persentase }},
                        @endforeach

                    ],

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 10,
                        fontColor: '#1d7af3',
                    }
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        });
    </script>

    <script>
        var barChart10 = document.getElementById('barChart10').getContext('2d');

        var myBarChart10 = new Chart(barChart10, {
            type: 'horizontalBar',
            data: {

                labels: [
                    @foreach ($list_ktg_r1 as $data)
                        {{ $data->kode_akun }},
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_ktg_r1 as $data)
                                {{ $data->total_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_ktg_p1 as $data1)
                                {{ $data1->total_pagu }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Pagu dan Realisasi'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>

    {{-- Horizontal Bar chart 2 ktg --}}
    {{-- <script>
        var barChart6 = document.getElementById('barChart6').getContext('2d');

        var myBarChart6 = new Chart(barChart6, {
            type: 'horizontalBar',
            data: {

                labels: [
                    @foreach ($list_kku_7 as $data)
                        {{ $data->kode_akun }},
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_kku_7 as $data)
                                {{ $data->jlm_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_kku_7 as $data1)
                                {{ $data1->pg }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Pagu dan Realisasi'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script> --}}


    {{-- bar kku --}}
    <script>
        var barChart4 = document.getElementById('barChart4').getContext('2d');

        var myBarChart4 = new Chart(barChart4, {
            type: 'bar',
            data: {

                labels: [
                    @foreach ($list_kku_r as $data)
                        {{ $data->kode_akun }},
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_kku_r as $data)
                                {{ $data->total_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_kku_p as $data1)
                                {{ $data1->total_pagu }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Traffic Stats'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>

    {{-- Horizontal kku --}}
    <script>
        var barChart6 = document.getElementById('barChart6').getContext('2d');

        var myBarChart6 = new Chart(barChart6, {
            type: 'horizontalBar',
            data: {

                labels: [
                    @foreach ($list_kku_r2 as $data)
                        {{ $data->kode_akun }},
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_kku_r2 as $data)
                                {{ $data->total_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_kku_p2 as $data1)
                                {{ $data1->total_pagu }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Pagu dan Realisasi'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>
    {{-- line kku --}}
    <script>
        var lineChart10 = document.getElementById('lineChart10').getContext('2d');

        var myLineChart10 = new Chart(lineChart10, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Persentase",
                    borderColor: "#1d7af3",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#1d7af3",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    backgroundColor: 'transparent',
                    fill: true,
                    borderWidth: 2,
                    data: [
                        @foreach ($list_kku_r_p as $list_20)
                            {{ $list_20->persentase }},
                        @endforeach

                    ],

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 10,
                        fontColor: '#1d7af3',
                    }
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        });
    </script>

    <script>
        var barChart5 = document.getElementById('barChart5').getContext('2d');

        var myBarChart5 = new Chart(barChart5, {
            type: 'horizontalBar',
            data: {

                labels: [
                    @foreach ($list_kku_r_h as $data)
                        `{{ $data->kode_ba }}`,
                    @endforeach
                ],
                datasets: [{
                        label: "Realisasi",
                        backgroundColor: 'rgb(23, 125, 255)',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [
                            @foreach ($list_kku_r_h as $data)
                                {{ $data->total_realisasi }},
                            @endforeach
                        ],
                    },
                    {
                        label: "pagu",
                        backgroundColor: 'rgb(8, 212, 35)',
                        borderColor: 'rgb(8, 212, 35)',
                        data: [
                            @foreach ($list_kku_p_h as $data1)
                                {{ $data1->total_pagu }},
                            @endforeach
                        ],
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Pagu dan Realisasi'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>

</body>

</html>
{{-- @endsection --}}
