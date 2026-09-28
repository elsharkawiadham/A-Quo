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
        total_trips_result = 3
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
            third.textContent = entertain_historical_tour_found[z][0].location;
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

group.on("click", function (e) {
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

group.on("mouseover", function (e) {
    var clickedCircle = e.layer;
    return view_area_selected(clickedCircle);
})

group.on('mouseout', function (e) {
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
        group.on("mouseover", function (e) {
            var clickedCircle = e.layer;
            return view_area_selected(clickedCircle);
        })

        group.on('mouseout', function (e) {
            var area_selected_container = document.getElementById('area_selected_container')
            area_selected_container.style.display = 'none'
        })
    }, 2500);

    if (unset_selected_area == true) {

        markers.clearLayers()
        n_markers = 0
        total_trips_result = 2

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

        mymap.flyTo([found_area.lat, found_area.lng], 16.5, {
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

    localStorage.setItem("showtrip", found_markers)
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