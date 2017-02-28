// Put your Last.fm API key here
/*var api_key = "";

function sendRequest () {
    var xhr = new XMLHttpRequest();
    var method = "artist.getinfo";
    var artist = encodeURI(document.getElementById("form-input").value);
    xhr.open("GET", "proxy.php?method="+method+"&artist="+artist+"&api_key="+api_key+"&format=json", true);
    xhr.setRequestHeader("Accept","application/json");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            var json = JSON.parse(this.responseText);
            var str = JSON.stringify(json,undefined,2);
            document.getElementById("output").innerHTML = "<pre>" + str + "</pre>";
        }
    };
    xhr.send(null);
}*/


var api_key = "07dd6c90b6d93a01a549e93a750d61fa";

function initialize() {
    var xhr = new XMLHttpRequest();
   // var method = "artist.getinfo";
    var city = encodeURI(document.getElementById("form-input").value);
    alert(city);
    xhr.open("GET", "proxy.php?q="+city+"&appid="+api_key+"&format=json", true);
    xhr.setRequestHeader("Accept","application/json");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            var json = JSON.parse(this.responseText);
            alert(json);
            var str = JSON.stringify(json,undefined,2);
            document.getElementById("output").innerHTML = "<pre>" + str + "</pre>";
            var json = JSON.parse(str);
            debugger;
            var weatherID = json["weather"][0]["id"];
            console.log(weatherID);
            if (weatherID >= 200 && weatherID < 232) {
            	document.getElementById("output").innerHTML = "<pre>get umbrella!</pre>"
            }
            else if (weather ID >= 300 && weatherID < 321) {
            	document.getElementById("output").innerHTML = "<pre>get umbrella!</pre>"
            }
            else if (weatherID >= 500 && weatherID < 531){
            	document.getElementById("output").innerHTML = "<pre>get umbrella!</pre>"
            }
            else if (weatherID >= 600 && weatherID < 622){
            	document.getElementById("output").innerHTML = "<pre>wear coat!!</pre>"
            }
            else if (weatherID >= 800 && weatherID < 804) {
            	document.getElementById("output").innerHTML = "<pre>no need of umbrella!</pre>"
            }

        }
    };
    xhr.send(null);
}
