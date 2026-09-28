 <?php

    // getting area data

    $array_areas = array();
    $file = file('txt_files/areas.txt');

    foreach ($file as $key => $value) {
        list($loc, $lat, $lng) = explode("|", $value);
        array_push($array_areas, $loc, $lat, $lng);
    }

    // getting main food data

    $array_ = array('breakfast', 'lunch', 'pizzerie', 'trattorie');

    $array_breakfast = array();
    $array_lunch = array();
    $array_pizzerie = array();
    $array_trattorie = array();

    for ($i = 0; $i < 4; $i++) {


        $file = file('txt_files/food/' . $array_[$i] . '.txt');


        foreach ($file as $key => $value) {
            list($loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo) = explode("|", $value);


            switch ($i) {


                case 0:
                    array_push($array_breakfast, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;

                case 1:
                    array_push($array_lunch, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;

                case 2:
                    array_push($array_pizzerie, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;


                case 3:
                    array_push($array_trattorie, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;
            }
        }
    }

    // getting entertain food data

    $array_ = array('aperitivi', 'dessert', 'disco', 'pub');

    $array_aperitivi = array();
    $array_dessert = array();
    $array_disco = array();
    $array_pub = array();

    for ($i = 0; $i < 4; $i++) {


        $file = file('txt_files/food/entertainment/' . $array_[$i] . '.txt');


        foreach ($file as $key => $value) {
            list($loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo) = explode("|", $value);


            switch ($i) {


                case 0:
                    array_push($array_aperitivi, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;

                case 1:
                    array_push($array_dessert, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;

                case 2:
                    array_push($array_disco, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;


                case 3:
                    array_push($array_pub, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;
            }
        }
    }
    // getting gastronomy food data

    $array_ = array('desserts', 'pizza');

    $array_desserts_gastro = array();
    $array_pizza_gastro = array();

    for ($i = 0; $i < 2; $i++) {


        $file = file('txt_files/food/gastro/' . $array_[$i] . '.txt');


        foreach ($file as $key => $value) {
            list($loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo) = explode("|", $value);


            switch ($i) {


                case 0:
                    array_push($array_desserts_gastro, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;

                case 1:
                    array_push($array_pizza_gastro, $loc, $lat, $lng, $address, $area, $review, $web_site, $contact, $photo);

                    break;
            }
        }
    }
    ?>

 <html>

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="refresh" content="">
     <link type="text/css" rel="STYLESHEET" href="../style/main.css">
     <link rel="stylesheet" href="../style/index.css" type="text/css" />
     <link type="text/css" rel="STYLESHEET" href="styles/trips.css">

     <link type="text/css" rel="STYLESHEET" href="styles/time_line.scss">
     <link type="text/css" rel="STYLESHEET" href="styles/time_line_map.scss">

     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
     <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
     <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />

     <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
     <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
     <script src="https://unpkg.com/leaflet@1.1.0/dist/leaflet-src.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.2.0/Tween.min.js"></script>
     <script src="map_src/leaflet.curve.js"></script>

     <title>Food Tour</title>


 </head>

 <body onload="loadpage()">

     <script>
         // declaring all array objects

         const new_areas_object = [];

         const new_breakfast_object = [];
         const new_lunch_object = [];
         const new_trattorie_object = [];
         const new_pizzerie_object = [];

         const new_aperetivi_object = [];
         const new_dessert_object = [];
         const new_disco_object = [];
         const new_pub_object = [];

         const new_desserts_gastro_object = [];
         const new_pizza_gastro_object = [];

         // inizialising var for all div HTML

         var sort_container = document.getElementById('sort_container'),
             star = document.getElementsByClassName('star'),
             review_info = document.getElementsByClassName('review_info'),

             // left side list 

             historical_list_result = document.getElementById('historical_list_result'),
             teenager_tour = document.getElementById('historical_list_result'),
             classic_list_results = document.getElementById('historical_list_result'),
             filter_list = document.getElementsByClassName('filter_list')


         // inizializing all variabeld for showing trips list 

         var total_trips_result,
             total_page_results,

             n_stars,
             n_stars_array = {
                 0: ['3', '3.5', 'Normal'],
                 1: ['3.5', '4', 'Cool'],
                 2: ['4', '4.5', 'Fantastic'],
                 3: ['4.5', '5', 'Fancy']
             },

             area_selected_filter = [],

             selected_area = undefined,
             unset_selected_area = undefined,

             historical_areas = [],
             entertain_array = [],

             breakfast_historical_tour_found = [],
             trattorie_historical_tour_found = [],
             entertain_historical_tour_found = [],
             lunch_historical_tour_found = [],

             teenager_areas = [],
             nightlife_array = [],

             breakfast_teenager_tour_found = [],
             pizzerie_teenager_tour_found = [],
             aperitivi_teenager_tour_found = [],
             nightlife_array_found = [],

             gastro_area = [],
             gastro_tour_found = []

         // values for areas on map
         var group = L.featureGroup(),
             options = {
                 center: new L.LatLng(41.898249, 12.489779),
                 zoom: 14.4,
                 minZoom: 3
             },

             areas,
             areas_radius = [490, 491, 518, 540],
             areas_colors = ['red', '#CDB4DB', 'blue', 'black'],
             areas_opacity = [0.5, 1.2, 0.6, 0],
             found_area = []

         // values for trips markers chosen

         var markers = L.markerClusterGroup(),
             n_markers = 0,

             tripchangeds

         const found_markers = []

         function loadpage() {

             var array_areas = <?php echo json_encode($array_areas);  ?>,
                 array_breakfast = <?php echo json_encode($array_breakfast);  ?>,
                 array_lunch = <?php echo json_encode($array_lunch);  ?>,
                 array_pizzerie = <?php echo json_encode($array_pizzerie);  ?>,
                 array_trattorie = <?php echo json_encode($array_trattorie);  ?>,

                 array_aperitivi = <?php echo json_encode($array_aperitivi);  ?>,
                 array_dessert = <?php echo json_encode($array_dessert);  ?>,
                 array_disco = <?php echo json_encode($array_disco);  ?>,
                 array_pub = <?php echo json_encode($array_pub);  ?>,

                 array_desserts_gastro = <?php echo json_encode($array_desserts_gastro);  ?>,
                 array_pizza_gastro = <?php echo json_encode($array_pizza_gastro);  ?>


             var
                 z = 0,
                 x = 1,
                 y = 2

             for (var i = 0; i < array_areas.length / 3; i++) {

                 new_areas_object.push(

                     {
                         location: array_areas[z],
                         lat: array_areas[x],
                         lng: array_areas[y]

                     })

                 z = z + 3;
                 x = x + 3;
                 y = y + 3;
             }

             for (let i = new_areas_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_areas_object[i]
                 new_areas_object[i] = new_areas_object[j]
                 new_areas_object[j] = k
             }
             var random_n = Math.floor(Math.random() * 4)
             var random_nn = Math.floor(Math.random() * 4)
             historical_areas = [new_areas_object[random_n].location, new_areas_object[random_nn].location]

             var random_n = Math.floor(Math.random() * 4)
             var random_nn = Math.floor(Math.random() * 4)
             teenager_areas = [new_areas_object[random_nn].location, new_areas_object[random_n].location]

             var random_n = Math.floor(Math.random() * 4)
             var random_nn = Math.floor(Math.random() * 4)
             gastro_area = [new_areas_object[random_nn].location, new_areas_object[random_n].location]


             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8


             for (var i = 0; i < array_breakfast.length / 9; i++) {

                 new_breakfast_object.push(

                     {
                         location: array_breakfast[z],
                         lat: array_breakfast[x],
                         lng: array_breakfast[y],
                         address: array_breakfast[s],
                         area: array_breakfast[q],
                         review: array_breakfast[w],
                         web: array_breakfast[t],
                         contact: array_breakfast[d],
                         photo: array_breakfast[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_breakfast_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_breakfast_object[i]
                 new_breakfast_object[i] = new_breakfast_object[j]
                 new_breakfast_object[j] = k
             }

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_trattorie.length / 9; i++) {

                 new_trattorie_object.push(

                     {
                         location: array_trattorie[z],
                         lat: array_trattorie[x],
                         lng: array_trattorie[y],
                         address: array_trattorie[s],
                         area: array_trattorie[q],
                         review: array_trattorie[w],
                         web: array_trattorie[t],
                         contact: array_trattorie[d],
                         photo: array_trattorie[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_trattorie_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_trattorie_object[i]
                 new_trattorie_object[i] = new_trattorie_object[j]
                 new_trattorie_object[j] = k

             }

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_lunch.length / 9; i++) {

                 new_lunch_object.push(

                     {
                         location: array_lunch[z],
                         lat: array_lunch[x],
                         lng: array_lunch[y],
                         address: array_lunch[s],
                         area: array_lunch[q],
                         review: array_lunch[w],
                         web: array_lunch[t],
                         contact: array_lunch[d],
                         photo: array_lunch[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_lunch_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_lunch_object[i]
                 new_lunch_object[i] = new_lunch_object[j]
                 new_lunch_object[j] = k

             }

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_pizzerie.length / 9; i++) {

                 new_pizzerie_object.push(

                     {
                         location: array_pizzerie[z],
                         lat: array_pizzerie[x],
                         lng: array_pizzerie[y],
                         address: array_pizzerie[s],
                         area: array_pizzerie[q],
                         review: array_pizzerie[w],
                         web: array_pizzerie[t],
                         contact: array_pizzerie[d],
                         photo: array_pizzerie[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }
             for (let i = new_pizzerie_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_pizzerie_object[i]
                 new_pizzerie_object[i] = new_pizzerie_object[j]
                 new_pizzerie_object[j] = k

             }

             // gastro
             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_pizza_gastro.length / 9; i++) {

                 new_pizza_gastro_object.push(

                     {
                         location: array_pizza_gastro[z],
                         lat: array_pizza_gastro[x],
                         lng: array_pizza_gastro[y],
                         address: array_pizza_gastro[s],
                         area: array_pizza_gastro[q],
                         review: array_pizza_gastro[w],
                         web: array_pizza_gastro[t],
                         contact: array_pizza_gastro[d],
                         photo: array_pizza_gastro[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_pizza_gastro_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_breakfast_object[i]
                 new_pizza_gastro_object[i] = new_pizza_gastro_object[j]
                 new_pizza_gastro_object[j] = k

             }
             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_desserts_gastro.length / 9; i++) {

                 new_desserts_gastro_object.push(

                     {
                         location: array_desserts_gastro[z],
                         lat: array_desserts_gastro[x],
                         lng: array_desserts_gastro[y],
                         address: array_desserts_gastro[s],
                         area: array_desserts_gastro[q],
                         review: array_desserts_gastro[w],
                         web: array_desserts_gastro[t],
                         contact: array_desserts_gastro[d],
                         photo: array_desserts_gastro[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_desserts_gastro_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_desserts_gastro_object[i]
                 new_desserts_gastro_object[i] = new_desserts_gastro_object[j]
                 new_desserts_gastro_object[j] = k

             }

             // entertainment

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_aperitivi.length / 9; i++) {

                 new_aperetivi_object.push(

                     {
                         location: array_aperitivi[z],
                         lat: array_aperitivi[x],
                         lng: array_aperitivi[y],
                         address: array_aperitivi[s],
                         area: array_aperitivi[q],
                         review: array_aperitivi[w],
                         web: array_aperitivi[t],
                         contact: array_aperitivi[d],
                         photo: array_aperitivi[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_aperetivi_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_aperetivi_object[i]
                 new_aperetivi_object[i] = new_aperetivi_object[j]
                 new_aperetivi_object[j] = k

             }

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_dessert.length / 9; i++) {

                 new_dessert_object.push(

                     {
                         location: array_dessert[z],
                         lat: array_dessert[x],
                         lng: array_dessert[y],
                         address: array_dessert[s],
                         area: array_dessert[q],
                         review: array_dessert[w],
                         web: array_dessert[t],
                         contact: array_dessert[d],
                         photo: array_dessert[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_dessert_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_dessert_object[i]
                 new_dessert_object[i] = new_dessert_object[j]
                 new_dessert_object[j] = k

             }

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_disco.length / 9; i++) {

                 new_disco_object.push(

                     {
                         location: array_disco[z],
                         lat: array_disco[x],
                         lng: array_disco[y],
                         address: array_disco[s],
                         area: array_disco[q],
                         review: array_disco[w],
                         web: array_disco[t],
                         contact: array_disco[d],
                         photo: array_disco[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_disco_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_disco_object[i]
                 new_disco_object[i] = new_disco_object[j]
                 new_disco_object[j] = k

             }

             var
                 z = 0,
                 x = 1,
                 y = 2,
                 s = 3,
                 q = 4,
                 w = 5,
                 t = 6,
                 d = 7,
                 v = 8

             for (var i = 0; i < array_pub.length / 9; i++) {

                 new_pub_object.push(

                     {
                         location: array_pub[z],
                         lat: array_pub[x],
                         lng: array_pub[y],
                         address: array_pub[s],
                         area: array_pub[q],
                         review: array_pub[w],
                         web: array_pub[t],
                         contact: array_pub[d],
                         photo: array_pub[v],
                     })

                 z = z + 9
                 x = x + 9
                 y = y + 9
                 s = s + 9
                 q = q + 9
                 w = w + 9
                 t = t + 9
                 d = d + 9
                 v = v + 9
             }

             for (let i = new_pub_object.length - 1; i > 0; i--) {
                 let j = Math.floor(Math.random() * i)
                 let k = new_pub_object[i]
                 new_pub_object[i] = new_pub_object[j]
                 new_pub_object[j] = k

             }

             /** VARIATED ARRAY TOURS*/

             entertain_array = {
                 0: new_aperetivi_object,
                 1: new_dessert_object
             }

             nightlife_array = {
                 0: new_pub_object,
                 1: new_disco_object
             }

             /** SCRIPT FOR ADDING THE MAP  */

             mymap = L.map(document.getElementById("map"), options);

             const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
             const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
             const tiles = L.tileLayer(tileUrl, {
                 attribution
             });

             tiles.addTo(mymap)


             /*ADD AREA ZONE ON THE MAP **/
             group.addTo(mymap)

             for (var i = 0; i < new_areas_object.length; i++) {
                 var lat = new_areas_object[i].lat,
                     location = new_areas_object[i].location,
                     lng = new_areas_object[i].lng,

                     circle = L.circle([lat, lng], {

                         color: areas_colors[i],
                         fillopacity: areas_opacity[i],
                         radius: areas_radius[i],
                         location: location

                     }).addTo(group)

                 area = [circle]

             }

             return areas_select_filter(), show_first_list(), sort_by_review()
         }

         /** CLOSING ON LOAD FUNCTION */

         function sort_by_review() {

             for (var i = 0; i < 4; i++) {

                 if (i == 0) {

                     var review_info_element = document.createElement('div')
                     review_info_element.className = 'review_info'
                     review_info_element.textContent = 'Mouseover & Click'
                     sort_review.appendChild(review_info_element)

                 }
                 var sort_review_element = document.createElement('span'),
                     review_star = n_stars_array[i]

                 sort_review_element.className = 'star'

                 sort_review_element.innerHTML = '&star;'
                 sort_review_element.setAttribute('onclick', 'star_mouse_on(' + i + ')')
                 sort_review_element.setAttribute('onmouseover', 'star_mouse_over(' + i + ')')
                 sort_review_element.setAttribute('onmouseleave', 'star_mouse_leave(' + i + ')')
                 sort_review.appendChild(sort_review_element)


             }
         }

         function star_mouse_over(x) {

             for (var i = 0; i <= x; i++) {

                 star[i].innerHTML = '&starf;'
                 review_info[0].innerHTML = n_stars_array[x][2] + '  (' + n_stars_array[x][0] + ' - ' + n_stars_array[x][1] + ')'

             }
         }

         function star_mouse_leave(x) {
             for (var i = 0; i <= x; i++) {

                 star[i].innerHTML = '&star;'
                 review_info[0].innerHTML = ' mouseover and click '

             }
         }

         function star_mouse_on(x) {

             for (var i = 0; i < 4; i++) {

                 star[i].removeAttribute('onmouseleave')
                 star[i].removeAttribute('onmouseover')
                 star[i].removeAttribute('onclick')
                 if (i < x) {

                     star[i].innerHTML = '&starf;'
                 }
             }

             n_stars = x
             return review_filter()

         }

         function review_filter() {

             setTimeout(() => {
                 var list_result_container = document.getElementById('list_result_container')

                 loading_trip_result = document.createElement('div')
                 loading_trip_result.className = 'loading_trip_result'
                 loading_trip_result.textContent = 'looking for best results...'
                 list_result_container.appendChild(loading_trip_result)

             }, 100);

             setTimeout(() => {

                 document.getElementsByClassName('loading_trip_result')[0].style.display = 'none'
                 return show_first_list()

             }, 5400);

         }

         function areas_select_filter() {

             var trip_map_container = document.getElementById('trip_map_container')

             new_areas_object.forEach((arrayItem, index) => {

                 var area_container = document.createElement('div')

                 area_container.className = 'area_container'
                 area_container.textContent = new_areas_object[index].location
                 area_container.setAttribute('onclick', 'select_area_event(' + index + ')')

                 trip_map_container.appendChild(area_container)
             })
         }


         total_trips_result = 2
         total_page_results = total_trips_result * 3

         function show_first_list() {

             if (selected_area != undefined) {
                 historical_areas = [selected_area]
                 teenager_areas = [selected_area]
                 gastro_area = [selected_area]
                 unset_selected_area = true

                 var list_result_container = document.getElementById('list_result_container'),
                     close_button = document.getElementById('close_button')

                 list_result_container.parentNode.removeChild(list_result_container)
                 close_button.setAttribute('onclick', 'close_button()')

                 markers.clearLayers()
                 n_markers = 0

                 total_trips_result = 1
                 total_page_results = total_trips_result * 3
             }

             if (n_stars != undefined) {

                 var list_result_container = document.getElementById('list_result_container'),
                     close_button = document.getElementById('close_button')

                 list_result_container.parentNode.removeChild(list_result_container)
                 close_button.setAttribute('onclick', 'close_button()')

                 markers.clearLayers()
                 n_markers = 0

             }

             var trips_container = document.getElementById('trips_container'),
                 list_result_container = document.createElement('div')

             list_result_container.id = 'list_result_container'
             trips_container.append(list_result_container)

             console.log(trips_container)

             var z = 0,
                 y = 0,
                 x = 0,
                 l = 0


             for (var i = 0; i < total_trips_result; i++) {


                 if (z != historical_areas.length) {

                     new_breakfast_object.forEach((arrayItem, index) => {

                         var location_review = new_breakfast_object[index].review

                         if (n_stars == undefined) {

                             if (new_breakfast_object[index].area == historical_areas[z]) {

                                 breakfast_historical_tour_found[z] = [new_breakfast_object[index]]
                             }
                         }

                         if (n_stars != undefined) {
                             if (new_breakfast_object[index].area == historical_areas[z] &&
                                 location_review > n_stars_array[n_stars][0] &&
                                 location_review < n_stars_array[n_stars][1]) {

                                 breakfast_historical_tour_found[z] = [new_breakfast_object[index]]
                             }
                         }
                     })


                     new_trattorie_object.forEach((arrayItem, index) => {

                         if (new_trattorie_object[index].area == historical_areas[z]) {

                             trattorie_historical_tour_found[z] = [new_trattorie_object[index]]
                         }
                     })

                     entertain_array[z].forEach((arrayItem, index) => {

                         if (entertain_array[z][index].area == historical_areas[z]) {

                             entertain_historical_tour_found[z] = [entertain_array[z][index]]
                         }
                     })

                     new_lunch_object.forEach((arrayItem, index) => {

                         if (new_lunch_object[index].area == historical_areas[z]) {

                             lunch_historical_tour_found[z] = [new_lunch_object[index]]
                         }
                     })


                     var historical_list_result = document.createElement('div'),
                         block_box = document.createElement('div'),
                         left = document.createElement('div'),
                         area_img = document.createElement('img'),
                         right = document.createElement('div'),
                         area_box = document.createElement('div'),
                         title = document.createElement('h1'),
                         category = document.createElement('h2'),

                         first = document.createElement('div'),
                         second = document.createElement('div'),
                         third = document.createElement('div'),
                         forth = document.createElement('div'),



                         box_info_expand = document.createElement('div'),
                         link_view_details = document.createElement('button'),
                         close_element = document.createElement('button'),
                         link_show_map = document.createElement('a'),
                         title_stops = document.createElement('h3')

                     area_img.src = 'areas_img/' + historical_areas[z] + '/' + historical_areas[z] + '.jpg'
                     area_img.alt = historical_areas[z]
                     box_info_expand.className = "box_info_expand"
                     close_element.className = 'link_hide_details'
                     close_element.textContent = 'Hide'
                     close_element.setAttribute('onclick', 'hide_details_trip_list(' + l + ')')

                     link_show_map.className = "link_show_map"
                     link_show_map.href = '#plane_trip'
                     link_show_map.setAttribute('onclick', 'show_on_map(' + l + ',' + z + ')')

                     link_view_details.className = "link_view_details"
                     link_view_details.setAttribute("onclick", 'view_details_trip_list(' + l + ')')


                     historical_list_result.id = "historical_list_result";
                     block_box.className = 'block_box'

                     left.className = "left"
                     right.className = "right"
                     area_box.className = "area_box"

                     first.className = "first"
                     second.className = "second"
                     third.className = "third"
                     forth.className = "forth"

                     area_box.textContent = historical_areas[z]
                     title.textContent = 'Title'
                     category.textContent = 'Ancient resturant - Historical Areas'

                     title_stops.textContent = 'All Stops'

                     first.innerHTML = breakfast_historical_tour_found[z][0].location
                     second.textContent = trattorie_historical_tour_found[z][0].location
                     third.textContent = entertain_historical_tour_found[z][0].location
                     forth.textContent = lunch_historical_tour_found[z][0].location


                     var marker = L.marker([breakfast_historical_tour_found[z][0].lat, breakfast_historical_tour_found[z][0].lng], options = {

                         location: breakfast_historical_tour_found[z][0].location,
                         position: l,
                         area: historical_areas[z]

                     })
                     markers.addLayer(marker)
                     n_markers++

                     var marker = L.marker([trattorie_historical_tour_found[z][0].lat, trattorie_historical_tour_found[z][0].lng], options = {

                         location: trattorie_historical_tour_found[z][0].location,
                         position: l,
                         area: historical_areas[z]

                     })
                     markers.addLayer(marker)
                     n_markers++

                     var marker = L.marker([entertain_historical_tour_found[z][0].lat, entertain_historical_tour_found[z][0].lng], options = {

                         location: entertain_historical_tour_found[z][0].location,
                         position: l,
                         area: historical_areas[z]

                     })
                     markers.addLayer(marker)
                     n_markers++

                     var marker = L.marker([lunch_historical_tour_found[z][0].lat, lunch_historical_tour_found[z][0].lng], options = {

                         location: lunch_historical_tour_found[z][0].location,
                         position: l,
                         area: historical_areas[z]

                     })
                     markers.addLayer(marker)
                     n_markers++
                     link_view_details.textContent = 'More Details'
                     link_show_map.textContent = "View on Map"


                     list_result_container.appendChild(historical_list_result)

                     historical_list_result.appendChild(block_box)
                     block_box.appendChild(left)
                     left.appendChild(area_img)

                     block_box.appendChild(right)

                     right.appendChild(area_box)
                     right.appendChild(title)
                     right.appendChild(category)

                     right.appendChild(link_show_map)
                     right.appendChild(link_view_details)
                     historical_list_result.appendChild(box_info_expand)

                     box_info_expand.appendChild(close_element)

                     box_info_expand.appendChild(title_stops)
                     box_info_expand.appendChild(first)
                     box_info_expand.appendChild(second)
                     box_info_expand.appendChild(third)
                     box_info_expand.appendChild(forth)

                     // information icons
                     var array_icon = ["stop_info_icon/address.png", "stop_info_icon/phone.png", "stop_info_icon/website.png"]
                     for (var v = 0; v < 4; v++) {

                         var icon_div = document.createElement('div')
                         icon_div.className = 'icon_div'


                         switch (v) {

                             case 0:


                                 for (var t = 0; t < 3; t++) {
                                     var icon_img = document.createElement('a')
                                     icon_img.className = 'icon_img'
                                     icon_img.src = array_icon[t]

                                     icon_img.href = ""

                                     first.appendChild(icon_div)
                                     icon_div.appendChild(icon_img)
                                 }
                                 break;

                             case 1:

                                 for (var t = 0; t < 3; t++) {
                                     var icon_img = document.createElement('div')
                                     icon_img.className = 'icon_img'
                                     icon_img.src = array_icon[t]

                                     second.appendChild(icon_div)
                                     icon_div.appendChild(icon_img)
                                 }
                                 break;
                             case 2:

                                 for (var t = 0; t < 3; t++) {
                                     var icon_img = document.createElement('div')
                                     icon_img.className = 'icon_img'
                                     icon_img.src = array_icon[t]

                                     third.appendChild(icon_div)
                                     icon_div.appendChild(icon_img)
                                 }
                                 break;

                             case 3:

                                 for (var t = 0; t < 3; t++) {
                                     var icon_img = document.createElement('div')
                                     icon_img.className = 'icon_img'
                                     icon_img.src = array_icon[t]

                                     forth.appendChild(icon_div)
                                     icon_div.appendChild(icon_img)
                                 }
                                 break;
                         }
                     }
                     z++
                 }
                 l++


                 if (y != teenager_areas.length) {

                     new_breakfast_object.forEach((arrayItem, index) => {

                         if (new_breakfast_object[index].area == teenager_areas[y]) {

                             breakfast_teenager_tour_found[y] = [new_breakfast_object[index]]
                         }
                     })
                     new_pizzerie_object.forEach((arrayItem, index) => {

                         if (new_pizzerie_object[index].area == teenager_areas[y]) {
                             pizzerie_teenager_tour_found[y] = [new_pizzerie_object[index]]
                         }
                     })
                     new_aperetivi_object.forEach((arrayItem, index) => {

                         if (new_aperetivi_object[index].area == teenager_areas[y]) {
                             aperitivi_teenager_tour_found[y] = [new_aperetivi_object[index]]
                         }
                     })
                     nightlife_array[y].forEach((arrayItem, index) => {

                         if (nightlife_array[y][index].area == teenager_areas[y]) {

                             nightlife_array_found[y] = [nightlife_array[y][index]]
                         }
                     })



                     var teenager_list_result = document.createElement('div'),
                         block_box = document.createElement('div'),
                         left = document.createElement('div'),
                         area_img = document.createElement('img'),

                         right = document.createElement('div'),
                         area_box = document.createElement('div'),
                         title = document.createElement('h1'),
                         category = document.createElement('h2'),

                         first = document.createElement('div'),
                         second = document.createElement('div'),
                         third = document.createElement('div'),
                         forth = document.createElement('div'),

                         box_info_expand = document.createElement('div'),
                         link_view_details = document.createElement('button'),
                         close_element = document.createElement('button'),
                         link_show_map = document.createElement('a'),
                         title_stops = document.createElement('h3')


                     area_img.src = 'areas_img/' + teenager_areas[y] + '/' + teenager_areas[y] + '.jpg'
                     area_img.alt = teenager_areas[y]

                     box_info_expand.className = "box_info_expand"
                     close_element.className = 'link_hide_details'
                     close_element.textContent = 'Hide'
                     close_element.setAttribute('onclick', 'hide_details_trip_list(' + l + ')')

                     link_show_map.className = "link_show_map"
                     link_show_map.href = '#plane_trip'
                     link_show_map.setAttribute('onclick', 'show_on_map(' + l + ',' + y + ')')

                     link_view_details.className = "link_view_details"
                     link_view_details.setAttribute("onclick", 'view_details_trip_list(' + l + ')')


                     teenager_list_result.id = "teenager_list_result";
                     block_box.className = 'block_box'

                     left.className = "left"
                     right.className = "right"
                     area_box.className = "area_box"


                     title_stops.textContent = 'All Stops'
                     first.className = "first"
                     second.className = "second"
                     third.className = "third"
                     forth.className = "forth"

                     area_box.textContent = teenager_areas[y]
                     title.textContent = 'Title'
                     category.textContent = 'Teenagers tour - Entertainment'


                     first.innerHTML = breakfast_teenager_tour_found[y][0].location
                     second.textContent = pizzerie_teenager_tour_found[y][0].location
                     third.textContent = aperitivi_teenager_tour_found[y][0].location
                     forth.textContent = nightlife_array_found[y][0].location

                     link_view_details.textContent = 'More Details'
                     link_show_map.textContent = "View on Map"

                     var marker = L.marker([breakfast_teenager_tour_found[y][0].lat, breakfast_teenager_tour_found[y][0].lng], options = {

                         location: breakfast_teenager_tour_found[y][0].location,
                         position: l
                     })
                     markers.addLayer(marker)
                     n_markers++

                     var marker = L.marker([pizzerie_teenager_tour_found[y][0].lat, pizzerie_teenager_tour_found[y][0].lng], options = {

                         location: pizzerie_teenager_tour_found[y][0].location,
                         position: l
                     })
                     markers.addLayer(marker)
                     n_markers++

                     var marker = L.marker([aperitivi_teenager_tour_found[y][0].lat, aperitivi_teenager_tour_found[y][0].lng], options = {

                         location: aperitivi_teenager_tour_found[y][0].location,
                         position: l
                     })
                     markers.addLayer(marker)
                     n_markers++

                     var marker = L.marker([nightlife_array_found[y][0].lat, nightlife_array_found[y][0].lng], options = {

                         location: nightlife_array_found[y][0].location,
                         position: l
                     })
                     markers.addLayer(marker)
                     n_markers++

                     list_result_container.appendChild(teenager_list_result)

                     teenager_list_result.appendChild(block_box)

                     block_box.appendChild(left)
                     left.appendChild(area_img)

                     block_box.appendChild(right)

                     right.appendChild(area_box)
                     right.appendChild(title)
                     right.appendChild(category)

                     right.appendChild(link_show_map)
                     right.appendChild(link_view_details)
                     teenager_list_result.appendChild(box_info_expand)

                     box_info_expand.appendChild(close_element)

                     box_info_expand.appendChild(title_stops)
                     box_info_expand.appendChild(first)
                     box_info_expand.appendChild(second)
                     box_info_expand.appendChild(third)
                     box_info_expand.appendChild(forth)
                     y++
                 }
                 l++


                 if (x != gastro_area.length) {

                     var gastro_list_result = document.createElement('div'),
                         block_box = document.createElement('div'),
                         left = document.createElement('div'),
                         area_img = document.createElement('img'),

                         right = document.createElement('div'),
                         area_box = document.createElement('div'),
                         title = document.createElement('h1'),
                         category = document.createElement('h2'),


                         first = document.createElement('div'),
                         second = document.createElement('div'),
                         third = document.createElement('div'),
                         forth = document.createElement('div'),
                         fifth = document.createElement('div'),

                         box_info_expand = document.createElement('div'),
                         link_view_details = document.createElement('button'),
                         close_element = document.createElement('button'),
                         link_show_map = document.createElement('a'),
                         title_stops = document.createElement('h3')


                     area_img.src = 'areas_img/' + gastro_area[x] + '/' + gastro_area[x] + '.jpg'
                     area_img.alt = gastro_area[x]

                     box_info_expand.className = "box_info_expand"
                     close_element.className = 'link_hide_details'
                     close_element.textContent = 'Hide'
                     close_element.setAttribute('onclick', 'hide_details_trip_list(' + l + ')')

                     link_show_map.className = "link_show_map"
                     link_show_map.href = '#plane_trip'
                     link_show_map.setAttribute('onclick', 'show_on_map(' + l + ',' + x + ')')

                     link_view_details.className = "link_view_details"
                     link_view_details.setAttribute("onclick", 'view_details_trip_list(' + l + ')')


                     gastro_list_result.id = "gastro_list_result";
                     block_box.className = 'block_box'

                     left.className = "left"
                     right.className = "right"
                     area_box.className = "area_box"

                     title_stops.textContent = 'All Stops'
                     first.className = "first"
                     second.className = "second"
                     third.className = "third"
                     forth.className = "forth"
                     fifth.className = "fifth"


                     area_box.textContent = gastro_area[x]
                     title.textContent = 'Title'
                     category.textContent = 'Gastronomy'


                     first.textContent = 'undefined'
                     second.textContent = 'undefined'
                     third.textContent = 'undefined'
                     forth.textContent = 'undefined'
                     fifth.textContent = 'undefined'

                     link_view_details.textContent = 'Show Details'
                     link_show_map.textContent = "View on Map"

                     list_result_container.appendChild(gastro_list_result)

                     gastro_list_result.appendChild(block_box)

                     block_box.appendChild(left)
                     left.appendChild(area_img)

                     block_box.appendChild(right)

                     right.appendChild(area_box)
                     right.appendChild(title)
                     right.appendChild(category)

                     right.appendChild(link_show_map)
                     right.appendChild(link_view_details)
                     gastro_list_result.appendChild(box_info_expand)

                     box_info_expand.appendChild(close_element)

                     box_info_expand.appendChild(title_stops)

                     box_info_expand.appendChild(first)
                     box_info_expand.appendChild(second)
                     box_info_expand.appendChild(third)
                     box_info_expand.appendChild(forth)



                     x++;
                 }
                 l++;
             }

         }

         // evetn filter by review


         // event seleceted area filder on top of the map
         function select_area_event(x) {

             var area_container = document.getElementsByClassName('area_container')
             area_selected_filter = new_areas_object[x]
             selected_area = new_areas_object[x].location

             for (var i = 0; i < area_container.length; i++) {
                 area_container[i].removeAttribute('onclick')
             }


             setTimeout(() => {
                 for (var i = 0; i < area_container.length; i++) {
                     area_container[i].setAttribute('onclick', 'select_area_event(' + i + ')')

                     if (i == x) {
                         area_container[i].removeAttribute('onclick')

                     }
                 }
             }, 4000);

             return area_selected(new_areas_object[x].location)

         }

         function area_selected(x) {

             mymap.flyTo([area_selected_filter.lat, area_selected_filter.lng], 16.5, {

                 duration: 4
             })

             setTimeout(() => {
                 mymap.removeLayer(group)
             }, 1000);

             setTimeout(() => {

                 var close_button = document.getElementById('close_button'),
                     area_selected_container = document.getElementById('area_selected_container')

                 area_selected_container.style.display = 'block'
                 close_button.style.display = ' block'
                 area_selected_container.textContent = x
                 close_button.setAttribute('onclick', 'close_button()')

             }, 3000);

             group.removeEventListener('mouseover')
             group.removeEventListener('mouseout')

             return selected_area_filter(area_selected_filter.location)

         }

         group.on("click", function(e) {
             var area_container = document.getElementsByClassName('area_container')

             var clickedCircle = e.layer,
                 clickedCircle_object = clickedCircle._latlng,

                 lat = clickedCircle_object.lat,
                 lng = clickedCircle_object.lng,
                 location = clickedCircle_object.location

             mymap.flyTo([lat, lng], 16.5, {

                 duration: 4
             })

             setTimeout(disable_circles(clickedCircle.options.location), 3000);


             for (var i = 0; i < area_container.length; i++) {
                 area_container[i].removeAttribute('onclick')
             }

             group.removeEventListener('mouseover')
             group.removeEventListener('mouseout')
             selected_area = clickedCircle.options.location

             return selected_area_filter(clickedCircle)
         })

         function selected_area_filter(x) {

             setTimeout(() => {
                 var list_result_container = document.getElementById('list_result_container')

                 loading_trip_result = document.createElement('div')
                 loading_trip_result.className = 'loading_trip_result'
                 loading_trip_result.textContent = 'looking for ...'
                 list_result_container.appendChild(loading_trip_result)

             }, 100);

             setTimeout(() => {

                 document.getElementsByClassName('loading_trip_result')[0].style.display = 'none'

                 return show_first_list()

             }, 5400);

         }

         function disable_circles(e) {


             mymap.removeLayer(group)

             setTimeout(() => {
                 var area_container = document.getElementsByClassName('area_container')
                 for (var i = 0; i < area_container.length; i++) {
                     area_container[i].setAttribute('onclick', 'select_area_event(' + i + ')')
                 }
                 var close_button = document.getElementById('close_button')
                 close_button.style.display = ' block'
                 close_button.setAttribute('onclick', 'close_button()')
             }, 5000);
         }

         group.on("mouseover", function(e) {
             var clickedCircle = e.layer;
             return view_area_selected(clickedCircle);
         })

         group.on('mouseout', function(e) {
             var area_selected_container = document.getElementById('area_selected_container');
             area_selected_container.style.display = 'none'

         })

         function view_area_selected(e) {

             var area_selected_container = document.getElementById('area_selected_container'),
                 location = e.location

             area_selected_container.style.display = 'block'
             area_selected_container.innerHTML = e.options.location;

             if (e == false) {
                 area_selected_container.style.display = 'none'
             } else {
                 area_selected_container.style.display = 'block'
             }


         }

         function close_button(x, show) {
             var close_button = document.getElementById('close_button')
             close_button.style.display = 'none'

             if (area_selected_filter != '') {
                 var close_button = document.getElementById('close_button')
                 close_button.style.display = 'none'

                 mymap.flyTo([41.898249, 12.489779], 14, {
                     center: new L.LatLng(41.898249, 12.489779),
                     duration: 2
                 })
             }

             if (show != undefined) {
                 document.getElementsByClassName('link_show_map')[x].style.display = 'block'
             }

             mymap.flyTo([41.898249, 12.489779], 14, {
                 center: new L.LatLng(41.898249, 12.489779),
                 duration: 2
             })


             setTimeout(() => {

                 var area_selected_container = document.getElementById('area_selected_container')
                 area_selected_container.style.display = 'none'
                 group.addTo(mymap)

                 group.addEventListener('click')
                 group.on("mouseover", function(e) {
                     var clickedCircle = e.layer;
                     return view_area_selected(clickedCircle);
                 })

                 group.on('mouseout', function(e) {
                     var area_selected_container = document.getElementById('area_selected_container')
                     area_selected_container.style.display = 'none'
                 })
             }, 2500);

             if (unset_selected_area == true) {

                 markers.clearLayers()
                 n_markers = 0

                 selected_area = undefined
                 unset_selected_area = undefined

                 var random_n = Math.floor(Math.random() * 4)
                 var random_nn = Math.floor(Math.random() * 4)
                 historical_areas = [new_areas_object[random_n].location, new_areas_object[random_nn].location]

                 var random_n = Math.floor(Math.random() * 4)
                 var random_nn = Math.floor(Math.random() * 4)
                 teenager_areas = [new_areas_object[random_nn].location, new_areas_object[random_n].location]

                 var random_n = Math.floor(Math.random() * 4)
                 var random_nn = Math.floor(Math.random() * 4)
                 gastro_area = [new_areas_object[random_nn].location, new_areas_object[random_n].location]


                 setTimeout(() => {

                     var list_result_container = document.getElementById('list_result_container')

                     loading_trip_result = document.createElement('div')
                     loading_trip_result.className = 'loading_trip_result'
                     loading_trip_result.textContent = 'loading...'
                     list_result_container.appendChild(loading_trip_result)


                 }, 100);

                 setTimeout(() => {

                     document.getElementsByClassName('loading_trip_result')[0].style.display = 'none'
                     var list_result_container = document.getElementById('list_result_container')
                     list_result_container.parentNode.removeChild(list_result_container)
                     return show_first_list()

                 }, 5400)

             }
         }

         function show_on_map(x, z) {

             var y = 0
             for (var i = 0; i < n_markers; i++) {

                 if (markers._needsClustering[i].options.position == x) {

                     found_markers[y] = [markers._needsClustering[i]]
                     y++
                 }
             }


             for (var i = 0; i < new_areas_object.length; i++) {

                 if (new_areas_object[i].location == historical_areas[z]) {
                     found_area = new_areas_object[i]
                 }
             }

             setTimeout(() => {

                 mymap.flyTo([found_area.lat, found_area.lng], 14, {
                     duration: 3

                 })

                 var close_button = document.getElementById('close_button')
                 close_button.style.display = ' block'

             }, 3150);

             setTimeout(() => {

                 var close_button = document.getElementById('close_button')

                 close_button.style.display = ' block'
                 mymap.removeLayer(group)
                 var show = true
                 close_button.setAttribute('onclick', 'close_button(' + x + ',' + show + ')')


             }, 3300);

             for (var i = 0; i < total_page_results; i++) {
                 if (x != i) {

                     document.getElementsByClassName('link_show_map')[x].style.display = 'none'
                     document.getElementsByClassName('link_show_map')[i].style.display = 'block'

                     mymap.flyTo([41.898249, 12.489779], 13.6, {

                         duration: 3.1

                     })

                 } else {
                     document.getElementsByClassName('link_show_map')[x].style.display = 'block'
                     document.getElementsByClassName('link_show_map')[i].style.display = 'none'
                 }
             }
             group.removeEventListener('mouseover')
             group.removeEventListener('mouseout')
             tripchangeds = true
             setTimeout(show_timeline, 5000);
         }

         function view_details_trip_list(x) {

             var select = document.getElementsByClassName('box_info_expand')[x],
                 text = document.getElementsByClassName('link_view_details')[x]

             select.style.display = 'block'
             text.style.display = 'none'

             for (var i = 0; i < total_page_results; i++) {

                 var close = document.getElementsByClassName('box_info_expand')[i],
                     text = document.getElementsByClassName('link_view_details')[i]

                 if (x != i) {

                     close.style.display = 'none'
                     text.style.display = 'block'

                 }
             }

         }

         function hide_details_trip_list(x) {
             var select = document.getElementsByClassName('box_info_expand')[x],
                 text = document.getElementsByClassName('link_view_details')[x]

             select.style.display = 'none'
             text.style.display = 'block'
         }
         /** to add informations details for each stop resault such as 'review' etc. */
     </script>


     <script type="text/javascript" src="scripts/time_line.js"></script>



     <!-- katrin's navbar !-->
     <!-- introductive image !-->

     <div id="plane_trip">

         <!-- Trips, map and time line ariticle div  !-->

         <div id="left">

             <!-- Left for result list -->

             <div id="sort_container">

                 <div class="left">
                     <div id="sort_review"></div>
                 </div>

                 <div class="right">
                     <div> </div>
                     <div> </div>
                     <div> </div>
                 </div>

             </div>

             <div id="trips_container">
             </div>

         </div> <!-- closing Left for result list -->


         <!-- right for map show -->

         <div id="right">

             <div id="trip_map_container"></div>
             <div id="map">

                 <div id="close_button"> close </div>
                 <div id="area_selected_container"> </div>

             </div>

             <div id="time_line_container">
                 <div id="time_line_containerChild"></div>
             </div>


         </div>

         <div class="clear"></div>

     </div> <!-- closing Trips, map and time line ariticle div  !-->


     <!-- more articles -->
     <!-- Katrin's Footer -->
     <footer class="footer">
         <div class="container">
             <div class="row">
                 <div class="footer-col">
                     <h4>company</h4>
                     <ul>
                         <li><a href="#">about us</a></li>
                         <li><a href="#">our services</a></li>
                         <li><a href="#">privacy policy</a></li>
                         <li><a href="#">affiliate program</a></li>
                     </ul>
                 </div>
                 <div class="footer-col">
                     <h4>get help</h4>
                     <ul>
                         <li><a href="#">FAQ</a></li>
                         <li><a href="#">contatti</a></li>
                         <li><a href="#">segnala bug</a></li>
                         <li><a href="#">assistenza</a></li>
                         <li><a href="#">recensioni</a></li>
                     </ul>
                 </div>
                 <div class="footer-col">
                     <h4>online ticket</h4>
                     <ul>
                         <li><a href="#">get your guide</a></li>
                         <li><a href="#">visit city</a></li>
                         <li><a href="#">nomadic mat</a></li>

                     </ul>
                 </div>
                 <div class="footer-col">
                     <h4>follow us</h4>
                     <div class="social-links">
                         <a href="#"><i class="fab fa-facebook-f"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-linkedin-in"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
 </body>

 </html>