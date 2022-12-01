<!DOCTYPE html>
<html>

<head>

    @include('frontend.layouts.map_css')

</head>

<body>
    <div class="wrapper">

        @include('frontend.layouts.map_header')

        <div class="container-fluid">
            <section class="content-header">
                <h1>Map for District Wise Data</h1>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <span class="info-box-icon">
                                <i class="fa fa-institution" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Upazila</span>
                                <span class="info-box-number">204</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-purple">
                            <span class="info-box-icon">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Workshops</span>
                                <span class="info-box-number">91</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <span class="info-box-icon">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Good Practice</span>
                                <span class="info-box-number">432</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon">
                                <i class="fa fa-table" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Best Practice</span>
                                <span class="info-box-number">12</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <a href="{{ route('user.showMapTracking') }}" class="btn btn-success">District Map</a>
                        <a href="{{ route('user.showUpazilaMapTracking') }}" class="btn btn-danger">Upazila Map</a>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="chart_box">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div id="controls" class="nicebox">
                                        <div>
                                            <select id="census-variable">
                                                <option value="{{ asset('assets/frontend/map/all_dis_data') }}">All
                                                    Data</option>
                                            </select>
                                        </div>
                                        <div id="legend">
                                            <div id="census-min">min</div>
                                            <div class="color-key"><span id="data-caret">&#x25c6;</span></div>
                                            <div id="census-max">max</div>
                                        </div>
                                    </div>
                                    <div id="data-box" class="nicebox">
                                        <div class="row">
                                            <div class="col-md-12 population_box">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">District : <label id="data-label"
                                                            for="data-value"></label></div>
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="30%"><b>Supporting Agency :</b></td>
                                                                    <td width="70%"><span id="agency"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Consortium Partners :</b></td>
                                                                    <td><span id="con_partner"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Workshop Data :</b></td>
                                                                    <td><span id="workshop"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Good Practice :</b></td>
                                                                    <td><span id="good_practice"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Project Upazila :</b></td>
                                                                    <td><span id="upazila_name"></span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div id="workshopPiChart"></div>
                                                            </div>
                                                            <div class="col-md-6"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="boxdata">
                                            <div class="clvalue">Consortium Agency : <span id="agency"></span>
                                            </div>
                                            <div class="clvalue">Consortium Partners : <span id="con_partner"></span>
                                            </div>
                                            <div class="clvalue">Workshop Data : <span id="workshop"></span></div>
                                            <div class="clvalue">Good Practice : <span id="good_practice"></span>
                                            </div>
                                            <div class="clvalue">Total Upazila : <span id="upazila"></span></div>
                                            <div class="clvalue">Project Upazila : <span id="upazila_name"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map"></div>
                                    <div id="legend_color" class="legend_color">
                                        <p><span class="bg-red"></span> Data Not Yet Received</p>
                                        <p><span class="bg-yellow"></span> Only Workshop Data Available</p>
                                        <p><span class="bg-green"></span> Workshop and good practice</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    var mapStyle = [{
                            'stylers': [{
                                'visibility': 'off'
                            }]
                        },
                        {
                            'featureType': 'landscape',
                            'elementType': 'geometry',
                            'stylers': [{
                                'visibility': 'on'
                            }, {
                                'color': '#fcfcfc'
                            }]
                        },
                        {
                            'featureType': 'water',
                            'elementType': 'geometry',
                            'stylers': [{
                                'visibility': 'on'
                            }, {
                                'color': '#bfd4ff'
                            }]
                        }
                    ];
                    var map;
                    var censusMin = Number.MAX_VALUE,
                        censusMax = -Number.MAX_VALUE;

                    function initMap() {
                        // load the map
                        map = new google.maps.Map(document.getElementById('map'), {
                            //center: {lat: 23.6850, lng: 90.3563},
                            center: {
                                lat: 23.7677405,
                                lng: 92.9776401
                            },
                            zoom: 7,
                            mapTypeControl: false,
                            styles: mapStyle
                        });

                        var legend_color = document.getElementById('legend_color');
                        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend_color);

                        // set up the style rules and events for google.maps.Data
                        map.data.setStyle(styleFeature);
                        map.data.addListener('mouseover', mouseInToRegion);
                        map.data.addListener('mouseout', mouseOutOfRegion);

                        // wire up the button
                        var selectBox = document.getElementById('census-variable');
                        google.maps.event.addDomListener(selectBox, 'change', function() {
                            clearCensusData();
                            loadCensusData(selectBox.options[selectBox.selectedIndex].value);
                        });

                        // state polygons only need to be loaded once, do them now
                        loadMapShapes();

                    }

                    /** Loads the state boundary polygons from a GeoJSON source. */
                    function loadMapShapes() {
                        // load US state outline polygons from a GeoJson file
                        map.data.loadGeoJson('{{ asset("assets/frontend/map/district.txt") }}', {
                            idPropertyName: 'DISTCODE'
                        });

                        // wait for the request to complete by listening for the first feature to be added
                        google.maps.event.addListenerOnce(map.data, 'addfeature', function() {
                            google.maps.event.trigger(document.getElementById('census-variable'), 'change');
                        });
                    }

                    /**
                     * Loads the census data from a simulated API call to the US Census API.
                     *
                     * @param {string} variable
                     */
                    function loadCensusData(variable) {
                        // load the requested variable from the census API (using local copies)
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', variable + '.json');
                        xhr.onload = function() {
                            var censusData = JSON.parse(xhr.responseText);
                            censusData.shift(); // the first row contains column names
                            censusData.forEach(function(row) {
                                var censusVariable = parseFloat(row[0]);
                                var stateId = row[1];
                                var upazila = row[2];
                                var agency = row[3];
                                var con_partner = row[4];
                                var workshop = row[5];
                                var good_practice = row[6];
                                var bg_color = row[7];
                                var upazila_name = row[8];

                                // keep track of min and max values
                                if (censusVariable < censusMin) {
                                    censusMin = row[5];
                                }
                                if (censusVariable > censusMax) {
                                    censusMax = row[5];
                                }

                                // update the existing row with the new data
                                map.data.getFeatureById(stateId).setProperty('census_variable', censusVariable);
                                map.data.getFeatureById(stateId).setProperty('upazila', upazila);

                                if (agency == 0) {
                                    map.data.getFeatureById(stateId).setProperty('agency', '');
                                } else {
                                    map.data.getFeatureById(stateId).setProperty('agency', agency);
                                }

                                if (con_partner == 0) {
                                    map.data.getFeatureById(stateId).setProperty('con_partner', '');
                                } else {
                                    map.data.getFeatureById(stateId).setProperty('con_partner', con_partner);
                                }

                                map.data.getFeatureById(stateId).setProperty('workshop', workshop);
                                map.data.getFeatureById(stateId).setProperty('good_practice', good_practice);
                                map.data.getFeatureById(stateId).setProperty('bg_color', bg_color);
                                if (upazila_name == 0) {
                                    map.data.getFeatureById(stateId).setProperty('upazila_name', '');
                                } else {
                                    map.data.getFeatureById(stateId).setProperty('upazila_name', upazila_name);
                                }


                            });

                            // update and display the legend
                            document.getElementById('census-min').textContent = censusMin.toLocaleString();
                            document.getElementById('census-max').textContent = censusMax.toLocaleString();
                        };
                        xhr.send();
                    }

                    /** Removes census data from each shape on the map and resets the UI. */
                    function clearCensusData() {
                        censusMin = Number.MAX_VALUE;
                        censusMax = -Number.MAX_VALUE;
                        map.data.forEach(function(row) {
                            row.setProperty('census_variable', undefined);
                            row.setProperty('upazila', undefined);
                            row.setProperty('agency', undefined);
                            row.setProperty('con_partner', undefined);
                            row.setProperty('workshop', undefined);
                            row.setProperty('good_practice', undefined);
                            row.setProperty('bg_color', undefined);
                            row.setProperty('upazila_name', undefined);
                        });
                        document.getElementById('data-box').style.display = 'none';
                        document.getElementById('data-caret').style.display = 'none';
                    }

                    /**
                     * Applies a gradient style based on the 'census_variable' column.
                     * This is the callback passed to data.setStyle() and is called for each row in
                     * the data set.  Check out the docs for Data.StylingFunction.
                     *
                     * @param {google.maps.Data.Feature} feature
                     */
                    function styleFeature(feature) {
                        var high = [5, 69, 54]; // color of smallest datum
                        var low = [151, 83, 34];

                        // delta represents where the value sits between the min and max
                        var delta = (feature.getProperty('census_variable'));

                        var color = [];
                        for (var i = 0; i < 3; i++) {
                            // calculate an integer color based on the delta
                            color[i] = (high[i] - low[i]) * delta + low[i];
                        }

                        var b_color = feature.getProperty('bg_color');

                        // determine whether to show this shape or not
                        var showRow = true;
                        if (feature.getProperty('census_variable') == null || isNaN(feature.getProperty('census_variable'))) {
                            showRow = false;
                        }

                        var outlineWeight = 0.5,
                            zIndex = 1;
                        if (feature.getProperty('district') === 'hover') {
                            outlineWeight = zIndex = 2;
                        }

                        return {
                            strokeWeight: outlineWeight,
                            //fillColor: 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)',
                            strokeColor: '#fff',
                            fillColor: b_color,
                            //strokeColor: scolor,
                            zIndex: zIndex,
                            fillOpacity: 0.7,
                            visible: showRow
                        };
                    }

                    /**
                     * Responds to the mouse-in event on a map shape (state).
                     *
                     * @param {?google.maps.MouseEvent} e
                     */
                    function mouseInToRegion(e) {
                        // set the hover state so the setStyle function can change the border
                        e.feature.setProperty('district', 'hover');

                        var percent = (e.feature.getProperty('census_variable') - censusMin) / (censusMax - censusMin) * 100;

                        // update the label
                        document.getElementById('data-label').textContent = e.feature.getProperty('DISTNAME');
                        document.getElementById('upazila').textContent = e.feature.getProperty('upazila').toLocaleString();
                        document.getElementById('agency').textContent = e.feature.getProperty('agency').toLocaleString();
                        //document.getElementById('con_partner').textContent = e.feature.getProperty('con_partner').toLocaleString();
                        document.getElementById('workshop').textContent = e.feature.getProperty('workshop').toLocaleString();
                        document.getElementById('good_practice').textContent = e.feature.getProperty('good_practice').toLocaleString();
                        document.getElementById('upazila_name').textContent = e.feature.getProperty('upazila_name').toLocaleString();

                        document.getElementById('data-box').style.display = 'block';
                        document.getElementById('data-caret').style.display = 'block';
                        document.getElementById('data-caret').style.paddingLeft = percent + '%';

                        // Chart
                        workshopPiChart(e.feature.getProperty('upazila').toLocaleString(), e.feature.getProperty('workshop')
                            .toLocaleString());
                        //
                        //goodPiChart(e.feature.getProperty('workshop').toLocaleString(), e.feature.getProperty('pop_female').toLocaleString());
                        //
                        //                var practiceAr = e.feature.getProperty('practice').toLocaleString();
                        //
                        //                document.getElementById("practice").innerHTML = '';
                        //
                        //                fpractice(practiceAr);

                        var con_partner_ar = e.feature.getProperty('con_partner').toLocaleString();
                        document.getElementById('con_partner').innerHTML = '';

                        fcon_partner(con_partner_ar);
                    }

                    function fcon_partner(im) {
                        if (im == '') {
                            document.getElementById("con_partner");
                        } else {
                            var conArr = im.split(',');
                            var ul = document.getElementById("con_partner");
                            conArr.forEach(function(i, item, array) {
                                var conitem = i.split('(img)');
                                const imageElement = document.createElement('img');
                                imageElement.src = 'https://salsabil-it.com/hlptracker/assets/images/consortium_partners/' +
                                    conitem[1];
                                imageElement.width = '50';
                                //imageElement.height = '50';
                                imageElement.title = conitem[0];
                                ul.appendChild(imageElement);
                            });
                        }
                    }

                    //            function fpractice(g) {
                    //
                    //                if (g == '') {
                    //                    document.getElementById("practice");
                    //                } else {
                    //                    var practiceArr = g.split('@');
                    //                    var ul = document.getElementById("practice");
                    //                    practiceArr.forEach(function (i, item, array) {
                    //                        if (item === array.length - 1) {
                    //
                    //                        } else {
                    //                            var li = document.createElement("li");
                    //                            li.setAttribute("class", "list-group-item");
                    //                            li.appendChild(document.createTextNode(i));
                    //                            ul.appendChild(li);
                    //                        }
                    //
                    //                    });
                    //                }
                    //            }

                    /**
                     * Responds to the mouse-out event on a map shape (state).
                     *
                     * @param {?google.maps.MouseEvent} e
                     */
                    function mouseOutOfRegion(e) {
                        // reset the hover state, returning the border to normal
                        e.feature.setProperty('district', 'normal');
                        $('#data-box').hide();
                    }



                    // Set a callback to run when the Google Visualization API is loaded.
                    //            google.charts.setOnLoadCallback(populationPiChart);

                    // Callback that creates and populates a data table,
                    // instantiates the pie chart, passes in the data and
                    // draws it.
                    //            function populationPiChart(re, ny) {
                    //
                    //                // Create the data table.
                    //                var data = new google.visualization.DataTable();
                    //                data.addColumn('string', 'Topping');
                    //                data.addColumn('number', 'Slices');
                    //                data.addRows([
                    //                    ['Male', +re],
                    //                    ['Female', +ny]
                    //                ]);
                    //
                    //                // Set chart options
                    //                var options = {
                    //                    //'title': 'Information of Upazilla workshop Population'
                    //                    'width': 120,
                    //                    'height': 120,
                    //                    legend: {position: 'top'}
                    //                };
                    //
                    //                // Instantiate and draw our chart, passing in some options.
                    //                var chart = new google.visualization.PieChart(document.getElementById('pichart_population'));
                    //                chart.draw(data, options);
                    //            }


                    // Set a callback to run when the Google Visualization API is loaded.
                    google.charts.setOnLoadCallback(workshopPiChart);

                    // Callback that creates and populates a data table,
                    // instantiates the pie chart, passes in the data and
                    // draws it.
                    function workshopPiChart(re, ny) {

                        // Create the data table.
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                            ['Upazila', +re],
                            ['Workshop', +(re - ny)]
                        ]);

                        // Set chart options
                        var options = {
                            'title': 'Workshops',
                            //'width': 500,
                            //'height': 300
                            legend: {
                                position: 'bottom'
                            }
                        };

                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.PieChart(document.getElementById('workshopPiChart'));
                        chart.draw(data, options);
                    }
                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSmTv5d-dCxnsKPyZxNmvi28dRL7MjsEg&callback&callback=initMap">
                </script>
            </section>
        </div>

        @include('frontend.layouts.map_footer')

    </div>
    <!-- ./wrapper -->

    @include('frontend.layouts.map_js')

</body>

</html>
