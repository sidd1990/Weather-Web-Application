// Put your zillow.com API key here

var username = "siddattri";
var request = new XMLHttpRequest();

function initialize() {
    //initialize map
    var map;
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 32.75, lng: -97.13 },
        zoom: 17
    });

    //Initialized the geocoders and infowindows
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;

    makeMarker(map);
    //Initialize a mouse click event on map which then calls reversegeocode function
    google.maps.event.addListener(map, 'click', function (event) {
        reversegeocode(geocoder, map, event.latLng, infowindow, marker);
        //makeMarker(event.latLng, map);
        console.log(event.latLng);
    });
};

function makeMarker(map) {
    marker = new google.maps.Marker({
        //position: latlng,
        map: map,
        title: 'Hello World!'
    });
};

// Reverse Geocoding 
function reversegeocode(geocoder, map, latlng, infowindow, marker) {
    geocoder.geocode({ 'location': latlng }, function (results, status) {
        if (status === 'OK') {
            if (results[0]) {
                map.setZoom(17);

                marker.setPosition(latlng);
                var latitude = latlng.lat();
                var longitude = latlng.lng();
                sendRequest(latitude, longitude, infowindow, results[0].formatted_address);
                infowindow.open(map, marker);
            } else {
                window.alert('No results found');
            }
        } else {
            window.alert('Geocoder failed due to: ' + status);
        }
    });
};

//clears the div
function clearData() {
    document.getElementById("output").innerHTML = "";
};

// This method is responsible to display the results on the page
function displayResult(infowindow, address) {
    if (request.readyState == 4) {
        var xml = request.responseXML.documentElement;
        var temperature = xml.getElementsByTagName("temperature")[0].childNodes[0].nodeValue;
        var wind = xml.getElementsByTagName("windSpeed")[0].childNodes[0].nodeValue;
        var cloud = xml.getElementsByTagName("clouds")[0].childNodes[0].nodeValue;
        infowindow.setContent("Address : " + address + "<br> Temperature : " + temperature + "<br> Cloud :" + cloud + "<br> Wind : " + wind);
        document.getElementById("output").innerHTML += "Address : " + address + "<br> Temperature : " + temperature + "<br> Cloud :" + cloud + "<br> Wind : " + wind + "<br> <br>";
    }
};

function sendRequest(latitude, longitude, infowindow, address) {
    request.onreadystatechange = function () { displayResult(infowindow, address); };
    var lat = latitude;
    var lng = longitude;
    request.open("GET", " http://api.geonames.org/findNearByWeatherXML?lat=" + lat + "&lng=" + lng + "&username=" + username);
    //request.withCredentials = "true";
    request.send(null);
};
