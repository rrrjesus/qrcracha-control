var customLabel = {
    Dengue: {
        label: 'D'
    },
    Chikungunya: {
        label: 'C'
    },
    FebreAmarela: {
        label: 'F'
    },
    Zika: {
        label: 'Z'
    }
};

function initMap() {
    var map = new google.maps.Map(document.getElementById('mapdengue'), {
        center: new google.maps.LatLng(-23.457019, -46.584551),
        zoom: 14
    });
    var infoWindow = new google.maps.InfoWindow;

    // Altere isso dependendo do nome do seu arquivo PHP ou XML
    downloadUrl('sistema/ambiental/list/proc-list-ambiental/proc-maps-dengue.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });
            marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
        });
    });
}



function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}
