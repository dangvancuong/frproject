<!DOCTYPE html>
<html>
<head>
    <title>Google Map Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        //AIzaSyBOrpaa9ECnY2JUib0NWv3QXH21JMvc-p4
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 500px;
            width: 100%;
        }
        #panel {
            position: absolute;
            top: 0px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 0px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 0px;
            padding-left: 10px;
        }
    </style>
</head>
<body>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap&key="
        async defer></script>
<script>
    var map;
    var directionsDisplay;
    var directionsService;
    var stepDisplay;
    var markerArray = [];
    function initMap() {
        var lat_lng = {lat: 20.9769427, lng: 105.8921285};
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: lat_lng
        });
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer({map: map});

        var onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('source').addEventListener('change', onChangeHandler);
        document.getElementById('destination').addEventListener('change', onChangeHandler);
        document.getElementById('mode').addEventListener('change', onChangeHandler);
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
            origin: document.getElementById('source').value,
            destination: document.getElementById('destination').value,
            travelMode: document.getElementById('mode').value,
        }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                showSteps(response);
            } else {
                window.alert('Request for getting direction is failed due to ' + status);
            }
        });
    }
    function showSteps(directionResult) {
        var myRoute = directionResult.routes[0].legs[0];
        var instructions = '<h3 class="distance">Quãng đường: ' + myRoute.distance.text + '</h3><br>';
        instructions += '<h5 class="duration">Thời gian: ' + myRoute.duration.text + '</h5>';
        instructions += '<h5 class="start_address">Từ: ' + myRoute.start_address + '</h5>';
        instructions += '<h5 class="end_address">Đến: ' + myRoute.end_address + '</h5>';
        instructions += '<ol>';
        var steps = '';
        for (var i = 0; i < myRoute.steps.length; i++) {
            steps += '<li>' + myRoute.steps[i].instructions + '</li>';
        }
        instructions += '<p class="steps">'+ steps +'</p>';
        instructions += '</ol>';
        document.getElementById("instructions").innerHTML = instructions;
    }
    function attachInstructionText(marker, text) {
        google.maps.event.addListener(marker, 'click', function() {
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
        });
    }
</script>
<div id="panel">
    <b>Xuất phát: </b>
    <select id="source">
        <option value="Vân Đình - Ứng Hòa, vi">Thị trấn Vân Đình</option>
        <option value="Hà Đông, vi">Hà Đông</option>
        <option value="Long Biên, vi">Long Biên</option>
        <option value="Keangnam Landmark 72, vi">Keangnam Landmark 72</option>
    </select>
    <b>Đích: </b>
    <select id="destination">
        <option value="Khâm Thiên, vi">Khâm Thiên</option>
        <option value="Ngã Tư Sở, vi">Ngã Tư Sở</option>
        <option value="Hàng Ngang, vi">Hàng Ngang</option>
        <option value="Hàng Đào, vi">Hàng Đào</option>
    </select>
    <b>Phương tiện: </b>
    <select id="mode">
        <option value="DRIVING">Lái xe</option>
        <option value="WALKING">Đi bộ</option>
        <option value="BICYCLING">Xe đạp</option>
        <option value="TRANSIT">Xe tải</option>
    </select>
</div>
</div>

<div id="warnings"></div>
<div id="instructions"></div>
<div id="map"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
