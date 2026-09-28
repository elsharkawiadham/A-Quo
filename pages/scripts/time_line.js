// inizializing all html container for time line box
var
    line_container = document.getElementsByClassName('line_container'),
    line = document.getElementsByClassName('line')

// html containers for the map

function show_timeline() {

    var n_trip_markers,
        n_trip_markers = found_markers.length,
        time_line_containerChild = document.getElementById('time_line_containerChild'),
        time_line_container = document.getElementById('time_line_container')

    time_line_containerChild.parentNode.removeChild(time_line_containerChild)

    var time_line_containerChild = document.createElement('div')

    time_line_containerChild.id = 'time_line_containerChild'
    time_line_container.append(time_line_containerChild)


    for (var i = 0; i < n_trip_markers; i++) {

        var stops_box = document.createElement('div')

        stops_box.className = 'stops_box'
        stops_box.textContent = found_markers[i][0].options.location

        time_line_containerChild.appendChild(stops_box)

        if (i < n_trip_markers - 1) {
            var
                line_container = document.createElement('div'),
                line = document.createElement('hr')

            line_container.className = 'line_container'
            line.className = 'line'
            time_line_containerChild.appendChild(line_container)
            line_container.appendChild(line)
        }
    }

    var z = 0

    setTimeout(() => {
        var stops_box = document.getElementsByClassName('stops_box')[z],
            line = document.getElementsByClassName('line')[z]


        stops_box.style.opacity = '1'
        line.style.background = 'red'
        line.style.width = '100px'

        icon = L.divIcon({
            className: 'marker_container',
            html: "<div class = 'marker_container'>  </div>",
            iconSize: [100, 92],
            iconAnchor: [105, 102]
        });

        L.marker([found_markers[z][0]._latlng.lat, found_markers[z][0]._latlng.lng], { icon: icon }).addTo(mymap);

    }, 1500);

    setTimeout(() => {

        z++
        return done(z)

    }, 8000);



    /*
    
    if (z < n_trip_markers - 1) {
 
        
 
        var a = { x: found_markers[z][0]._latlng.lat, y: found_markers[z][0]._latlng.lng }
        var b = { x: found_markers[z + 1][0]._latlng.lat, y: found_markers[z + 1][0]._latlng.lng }
        var k = 0.2;
 
        // Intermediate values
        var vab = { x: b.x - a.x, y: b.y - a.y }
        var v_rotated = { x: -k * vab.y, y: k * vab.x }
        var middle = { x: a.x + vab.x / 2, y: a.y + vab.y / 2 }
        
        // Your two resulting points
        var result_i = { x: middle.x + v_rotated.x, y: middle.y + v_rotated.y }
        var result_j = { x: middle.x - v_rotated.x, y: middle.y - v_rotated.y }
        L.curve([
            
            'M', [found_markers[z][0]._latlng.lat, found_markers[z][0]._latlng.lng],
            'Q', [result_i.x, result_i.y],
                [result_j.x, result_j.y],
                'T', [found_markers[z + 1][0]._latlng.lat, found_markers[z + 1][0]._latlng.lng]
            ], ).addTo(mymap)
            
        }
        */


    function done(z) {

        var stops_box = document.getElementsByClassName('stops_box')[z],
            line = document.getElementsByClassName('line')[z],
            marker_container = document.getElementsByClassName('marker_container')[z-1]

        if (z == n_trip_markers) {

            console.log('done');
            return false

        } else {

            stops_box.style.opacity = '1'
            marker_container.style.display = 'none'


            // animation on map 

            icon = L.divIcon({
                className: 'marker_container',
                html: "<div class = 'marker_container'>  </div>",
                iconSize: [100, 92],
                iconAnchor: [105, 102]
            });

            L.marker([found_markers[z][0]._latlng.lat, found_markers[z][0]._latlng.lng], { icon: icon }).addTo(mymap);

            mymap.flyTo([found_markers[z][0]._latlng.lat, found_markers[z][0]._latlng.lng], 15.5, {

                duration: 5
            })

            if (z < n_trip_markers - 1) {


                line.style.background = 'red'
                line.style.width = '100px'

            }

            setTimeout(() => {

                z++
                return done(z)

            }, 8000)
        }

    }
    /*
    
    var route = L.layerGroup([
        L.curve([
            
            'M', [found_markers[z][0]._latlng.lat, found_markers[z][0]._latlng.lng],
            'Q', [result_i.x, result_i.y],
            [result_j.x, result_j.y],
            'T', [found_markers[z + 1][0]._latlng.lat, found_markers[z + 1][0]._latlng.lng]
            ])
        ], { snakingPause: 2000 }).addTo(mymap);
    
        route.snakeIn();
        route.on("snakeend", function () {
            L.curve([
    
                'M', [found_markers[z][0]._latlng.lat, found_markers[z][0]._latlng.lng],
                'Q', [result_i.x, result_i.y],
                [result_j.x, result_j.y],
                'T', [found_markers[z + 1][0]._latlng.lat, found_markers[z + 1][0]._latlng.lng]
            ])
                .snakeIn()
                .on("snakeend", function () {
    
                });
        });
    */
}