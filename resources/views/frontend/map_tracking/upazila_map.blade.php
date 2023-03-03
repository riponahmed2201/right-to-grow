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
                <h1>Map for Upazila Wise Data</h1>
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
                                                <option value="{{ asset('assets/frontend/map/all_up_data') }}">All Data
                                                </option>
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
                                                    <div class="panel-heading">Upazila : <label id="data-label"
                                                            for="data-value"></label></div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-12" style="margin-bottom: 15px;">
                                                                        <b>Total
                                                                            Population :</b> <span
                                                                            id="pop_total"></span>
                                                                    </div>
                                                                    <div class="col-md-6" style="margin-bottom: 15px;">
                                                                        <img
                                                                            src="{{ asset('assets/frontend/map_images/male-icon.jpg') }}" />
                                                                        : <span id="pop_male"></span>
                                                                    </div>
                                                                    <div class="col-md-6" style="margin-bottom: 15px;">
                                                                        <img
                                                                            src="{{ asset('assets/frontend/map_images/female-icon.jpg') }}" />
                                                                        : <span id="pop_female"></span>
                                                                    </div>
                                                                    <div class="col-md-12"><b>Supporting Agency :</b>
                                                                        <span id="partner_name"></span>
                                                                    </div>
                                                                    <div class="col-md-12"><b>Consortium Partners :</b>
                                                                        <span id="associate_name"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div id="pichart_population"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 workshop_box">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Workshop</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12" style="margin-bottom: 15px;">
                                                                <b>Workshop Date :</b> <span id="pdate"></span>
                                                            </div>
                                                            <div class="col-md-12" style="margin-bottom: 10px;">
                                                                <b>Participants :</b>
                                                            </div>
                                                            <div class="col-md-6"><img
                                                                    src="{{ asset('assets/frontend/map_images/male-icon.jpg') }}" />
                                                                : <span id="part_male"></span></div>
                                                            <div class="col-md-6"><img
                                                                    src="{{ asset('assets/frontend/map_images/female-icon.jpg') }}" />
                                                                : <span id="part_female"></span></div>
                                                            <div class="col-md-12">
                                                                <div id="pichart_participant"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 practice_box">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Good Practice: <span
                                                            id="practice_num"></span></div>
                                                    <div class="panel-body">
                                                        <ul id="practice" class="list-group"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 best_practice_box">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Best Practice</div>
                                                    <div class="panel-body">
                                                        <ul>
                                                            <li><b>UP Name:</b> <span id="up_list"></span></li>
                                                            <li><b>Number of Replications:</b> <span
                                                                    id="number_of_replications"></span></li>
                                                            <li><b>Name of Best Practice:</b> <span
                                                                    id="best_practice_name"></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="boxdata" style="display: none;">
                                            <div class="clvalue">Workshop Date : </div>
                                            <div class="clvalue">Total Participants : <span id="part_total"></span>
                                            </div>
                                            <div class="clvalue">Male Participants : <span id="part_male"></span>
                                            </div>
                                            <div class="clvalue">Female Participants : <span id="part_female"></span>
                                            </div>
                                            <div class="clvalue">Number Of Good Practice : <span
                                                    id="practice_num"></span></div>
                                            <div class="clvalue">Name of Good Practice : <span id="practice1"></span>
                                            </div>
                                            <div class="clvalue">Total Population : <span id="pop_total"></span></div>
                                            <div class="clvalue">Male Population : <span id="pop_male"></span></div>
                                            <div class="clvalue">Female Population : <span id="pop_female"></span>
                                            </div>
                                            <div class="clvalue">Consortium Agent : <span id="partner_name"></span>
                                            </div>
                                            <div class="clvalue">Consortium Partners : <span
                                                    id="associate_name"></span></div>
                                            <div class="clvalue">Consortium Partners : <span id="up_list"></span>
                                            </div>
                                            <div class="clvalue">Consortium Partners : <span
                                                    id="number_of_replications"></span></div>
                                            <div class="clvalue">Consortium Partners : <span
                                                    id="best_practice_name"></span></div>
                                        </div>
                                    </div>
                                    <div id="map"></div>
                                    <div id="legend_color" class="legend_color">
                                        <p><span class="bg-red"></span> R2G Upazila, activity yet to start</p>
                                        <p><span class="bg-yellow"></span> R2G Upazila and activities strated</p>
                                        <p><span class="bg-blue"></span> Workshop and good practice</p>
                                        <p><span class="bg-green"></span> Good Practice replicated in these Upazila</p>
                                        <p><span class="bg-best-practice"></span> Best practice</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 good_practice_type" style="margin-bottom: 15px;">
                        <div class="row">
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/agriculture_data') }}"
                                        id="agriculture_data" />
                                    <a href="javascript:void(0)" id="agriculture" title="Agriculture"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/AGRIGULTURE.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Agriculture</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/business_data') }}"
                                        id="business_data" />
                                    <a href="javascript:void(0)" id="business" title="Business" class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/BUSINESS.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Business</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden"
                                        value="{{ asset('assets/frontend/map/child_friendly_data') }}"
                                        id="child_friendly_data" />
                                    <a href="javascript:void(0)" id="child_friendly" title="Child Friendly"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/CHILD_FRIENDLY.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Child Friendly</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden"
                                        value="{{ asset('assets/frontend/map/disable_friendly_data') }}"
                                        id="disable_friendly_data" />
                                    <a href="javascript:void(0)" id="disable_friendly" title="Disable Friendly"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/DEASIBLE_FRIENDLY.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Disable Friendly</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/education') }}"
                                        id="education_data" />
                                    <a href="javascript:void(0)" id="education" title="Education"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/EDUCATION.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Education</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/environment_data') }}"
                                        id="environment_data" />
                                    <a href="javascript:void(0)" id="environment" title="Environment"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/ENVIRONMENT.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Environment</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/governance_data') }}"
                                        id="governance_data" />
                                    <a href="javascript:void(0)" id="governance" title="Governance"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/GOVERNANCE.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Governance</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden"
                                        value="{{ asset('assets/frontend/map/health_sanitation_data') }}"
                                        id="health_sanitation_data" />
                                    <a href="javascript:void(0)" id="health_sanitation" title="Health & Sanitation"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/HEALTH_SANITAION.png') }}"
                                            width="50" height="50" />
                                        <br /><b>Health & Sanitation</b>
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/other_data') }}"
                                        id="other_data" />
                                    <a href="javascript:void(0)" id="other" title="Other" class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/Others.png') }}"
                                            width="50" height="50" />
                                        <br /><b>Other</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden"
                                        value="{{ asset('assets/frontend/map/water_management_data') }}"
                                        id="water_management_data" />
                                    <a href="javascript:void(0)" id="water_management" title="Water Management"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/WATER_MANAGEMENT.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Water Management</b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-3 col-xs-3">
                                <div class="text-center">
                                    <input type="hidden" value="{{ asset('assets/frontend/map/women_right_data') }}"
                                        id="women_right_data" />
                                    <a href="javascript:void(0)" id="women_right" title="Women's Right"
                                        class="text-black">
                                        <img src="{{ asset('assets/frontend/map_images/WOMEN_RIGHT.jpg') }}"
                                            width="50" height="50" />
                                        <br /><b>Women's Right</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" value="{{ asset('assets/frontend/map/all_up_data') }}"
                            id="all_data" />
                        <input type="button" value="All Partners" id="all" class="btn btn-info"
                            style="margin-bottom: 15px;" />

                        <input type="hidden" value="{{ asset('assets/frontend/map/silence_up_data') }}"
                            id="silence_data" />
                        <input type="button" value="Breaking The silence" id="silence" class="btn btn-success"
                            style="margin-bottom: 15px;" />

                        <input type="hidden" value="{{ asset('assets/frontend/map/helvetas_up_data') }}"
                            id="helvetas_data" />
                        <input type="button" value="Helvetas" id="helvetas" class="btn btn-info"
                            style="margin-bottom: 15px;" />

                        <input type="hidden" value="{{ asset('assets/frontend/map/priptrust_up_data') }}"
                            id="priptrust_data" />
                        <input type="button" value="Priptrust" id="priptrust" class="btn btn-success"
                            style="margin-bottom: 15px;" />

                        <input type="hidden" value="{{ asset('assets/frontend/map/shushilan_up_data') }}"
                            id="shushilan_data" />
                        <input type="button" value="Shushilan" id="shushilan" class="btn btn-info"
                            style="margin-bottom: 15px;" />

                        <input type="hidden" value="{{ asset('assets/frontend/map/water_aid_up_data') }}"
                            id="water_aid_data" />
                        <input type="button" value="Water Aid Bangladesh" id="water_aid" class="btn btn-success"
                            style="margin-bottom: 15px;" />
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
                        map.data.addListener('click', mouseInToRegion);
                        map.data.addListener('click', mouseOutOfRegion);

                        // wire up the button

                        var all_data = document.getElementById('all_data');
                        var all = document.getElementById('all');

                        google.maps.event.addDomListener(all, 'click', function() {
                            clearCensusData();
                            loadCensusData(all_data.value);
                        });

                        var silence_data = document.getElementById('silence_data');
                        var silence = document.getElementById('silence');

                        google.maps.event.addDomListener(silence, 'click', function() {
                            clearCensusData();
                            loadCensusData(silence_data.value);
                        });

                        var helvetas_data = document.getElementById('helvetas_data');
                        var helvetas = document.getElementById('helvetas');

                        google.maps.event.addDomListener(helvetas, 'click', function() {
                            clearCensusData();
                            loadCensusData(helvetas_data.value);
                        });

                        var priptrust_data = document.getElementById('priptrust_data');
                        var priptrust = document.getElementById('priptrust');

                        google.maps.event.addDomListener(priptrust, 'click', function() {
                            clearCensusData();
                            loadCensusData(priptrust_data.value);
                        });

                        var shushilan_data = document.getElementById('shushilan_data');
                        var shushilan = document.getElementById('shushilan');

                        google.maps.event.addDomListener(shushilan, 'click', function() {
                            clearCensusData();
                            loadCensusData(shushilan_data.value);
                        });

                        var water_aid_data = document.getElementById('water_aid_data');
                        var water_aid = document.getElementById('water_aid');

                        google.maps.event.addDomListener(water_aid, 'click', function() {
                            clearCensusData();
                            loadCensusData(water_aid_data.value);
                        });

                        var agriculture_data = document.getElementById('agriculture_data');
                        var agriculture = document.getElementById('agriculture');

                        google.maps.event.addDomListener(agriculture, 'click', function() {
                            clearCensusData();
                            loadCensusData(agriculture_data.value);
                        });

                        var business_data = document.getElementById('business_data');
                        var business = document.getElementById('business');

                        google.maps.event.addDomListener(business, 'click', function() {
                            clearCensusData();
                            loadCensusData(business_data.value);
                        });

                        var child_friendly_data = document.getElementById('child_friendly_data');
                        var child_friendly = document.getElementById('child_friendly');

                        google.maps.event.addDomListener(child_friendly, 'click', function() {
                            clearCensusData();
                            loadCensusData(child_friendly_data.value);
                        });

                        var disable_friendly_data = document.getElementById('disable_friendly_data');
                        var disable_friendly = document.getElementById('disable_friendly');

                        google.maps.event.addDomListener(disable_friendly, 'click', function() {
                            clearCensusData();
                            loadCensusData(disable_friendly_data.value);
                        });

                        var education_data = document.getElementById('education_data');
                        var education = document.getElementById('education');

                        google.maps.event.addDomListener(education, 'click', function() {
                            clearCensusData();
                            loadCensusData(education_data.value);
                        });

                        var environment_data = document.getElementById('environment_data');
                        var environment = document.getElementById('environment');

                        google.maps.event.addDomListener(environment, 'click', function() {
                            clearCensusData();
                            loadCensusData(environment_data.value);
                        });

                        var governance_data = document.getElementById('governance_data');
                        var governance = document.getElementById('governance');

                        google.maps.event.addDomListener(governance, 'click', function() {
                            clearCensusData();
                            loadCensusData(governance_data.value);
                        });

                        var health_sanitation_data = document.getElementById('health_sanitation_data');
                        var health_sanitation = document.getElementById('health_sanitation');

                        google.maps.event.addDomListener(health_sanitation, 'click', function() {
                            clearCensusData();
                            loadCensusData(health_sanitation_data.value);
                        });

                        var other_data = document.getElementById('other_data');
                        var other = document.getElementById('other');

                        google.maps.event.addDomListener(other, 'click', function() {
                            clearCensusData();
                            loadCensusData(other_data.value);
                        });

                        var water_management_data = document.getElementById('water_management_data');
                        var water_management = document.getElementById('water_management');

                        google.maps.event.addDomListener(water_management, 'click', function() {
                            clearCensusData();
                            loadCensusData(water_management_data.value);
                        });

                        var women_right_data = document.getElementById('women_right_data');
                        var women_right = document.getElementById('women_right');

                        google.maps.event.addDomListener(women_right, 'click', function() {
                            clearCensusData();
                            loadCensusData(women_right_data.value);
                        });

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
                        // map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/states.js', { idPropertyName: 'STATE' });
                        //map.data.loadGeoJson('', {idPropertyName: 'DISTCODE'});
                        map.data.loadGeoJson('{{ asset('assets/frontend/map/upazila.txt') }}', {
                            idPropertyName: 'Upz_UID'
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
                                var pdate = row[2];
                                var part_total = row[3];
                                var part_male = row[4];
                                var part_female = row[5];
                                var pop_total = row[6];
                                var pop_male = row[7];
                                var pop_female = row[8];
                                var practice_num = row[9];
                                var practice = row[10];
                                var bg_color = row[11];
                                var partner_name = row[12];
                                var associate_name = row[13];
                                var up_list = row[14];
                                var number_of_replications = row[15];
                                var best_practice_name = row[16];

                                // keep track of min and max values
                                if (censusVariable < censusMin) {
                                    censusMin = row[4];
                                }
                                if (censusVariable > censusMax) {
                                    censusMax = row[4];
                                }

                                // update the existing row with the new data
                                map.data.getFeatureById(stateId).setProperty('census_variable', censusVariable);
                                map.data.getFeatureById(stateId).setProperty('pdate', pdate);
                                map.data.getFeatureById(stateId).setProperty('part_total', part_total);
                                map.data.getFeatureById(stateId).setProperty('part_male', part_male);
                                map.data.getFeatureById(stateId).setProperty('part_female', part_female);
                                map.data.getFeatureById(stateId).setProperty('pop_total', pop_total);
                                map.data.getFeatureById(stateId).setProperty('pop_male', pop_male);
                                map.data.getFeatureById(stateId).setProperty('pop_female', pop_female);
                                map.data.getFeatureById(stateId).setProperty('practice_num', practice_num);
                                if (practice == 0) {
                                    map.data.getFeatureById(stateId).setProperty('practice', '');
                                } else {
                                    map.data.getFeatureById(stateId).setProperty('practice', practice);
                                }
                                map.data.getFeatureById(stateId).setProperty('bg_color', bg_color);
                                map.data.getFeatureById(stateId).setProperty('partner_name', partner_name);
                                map.data.getFeatureById(stateId).setProperty('associate_name', associate_name);
                                map.data.getFeatureById(stateId).setProperty('up_list', up_list);
                                map.data.getFeatureById(stateId).setProperty('number_of_replications',
                                    number_of_replications);
                                map.data.getFeatureById(stateId).setProperty('best_practice_name', best_practice_name);
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
                            row.setProperty('pdate', undefined);
                            row.setProperty('part_total', undefined);
                            row.setProperty('part_male', undefined);
                            row.setProperty('part_female', undefined);
                            row.setProperty('pop_total', undefined);
                            row.setProperty('pop_male', undefined);
                            row.setProperty('pop_female', undefined);
                            row.setProperty('practice_num', undefined);
                            row.setProperty('practice', undefined);
                            row.setProperty('bg_color', undefined);
                            row.setProperty('partner_name', undefined);
                            row.setProperty('associate_name', undefined);
                            row.setProperty('up_list', undefined);
                            row.setProperty('number_of_replications', undefined);
                            row.setProperty('best_practice_name', undefined);
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
                        if (feature.getProperty('upazila') === 'hover') {
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
                        e.feature.setProperty('upazila', 'hover');

                        var percent = (e.feature.getProperty('census_variable') - censusMin) / (censusMax - censusMin) * 100;

                        // update the label
                        document.getElementById('data-label').textContent = e.feature.getProperty('Upaz_name');
                        document.getElementById('pdate').textContent = e.feature.getProperty('pdate').toLocaleString();
                        document.getElementById('part_total').textContent = e.feature.getProperty('part_total').toLocaleString();
                        document.getElementById('part_male').textContent = e.feature.getProperty('part_male').toLocaleString();
                        document.getElementById('part_female').textContent = e.feature.getProperty('part_female').toLocaleString();
                        document.getElementById('pop_total').textContent = e.feature.getProperty('pop_total').toLocaleString();
                        document.getElementById('pop_male').textContent = e.feature.getProperty('pop_male').toLocaleString();
                        document.getElementById('pop_female').textContent = e.feature.getProperty('pop_female').toLocaleString();
                        document.getElementById('practice_num').textContent = e.feature.getProperty('practice_num').toLocaleString();
                        document.getElementById('partner_name').textContent = e.feature.getProperty('partner_name').toLocaleString();
                        document.getElementById('associate_name').textContent = e.feature.getProperty('associate_name')
                            .toLocaleString();
                        document.getElementById('up_list').textContent = e.feature.getProperty('up_list').toLocaleString();
                        document.getElementById('number_of_replications').textContent = e.feature.getProperty('number_of_replications')
                            .toLocaleString();
                        document.getElementById('best_practice_name').textContent = e.feature.getProperty('best_practice_name')
                            .toLocaleString();

                        document.getElementById('data-box').style.display = 'block';
                        document.getElementById('data-caret').style.display = 'block';
                        document.getElementById('data-caret').style.paddingLeft = percent + '%';

                        // Chart
                        participantPiChart(e.feature.getProperty('part_male').toLocaleString(), e.feature.getProperty('part_female')
                            .toLocaleString());

                        populationPiChart(e.feature.getProperty('pop_male').toLocaleString(), e.feature.getProperty('pop_female')
                            .toLocaleString());

                        var practiceAr = e.feature.getProperty('practice').toLocaleString();

                        document.getElementById("practice").innerHTML = '';

                        fpractice(practiceAr);

                    }

                    function fpractice(g) {

                        if (g == '') {
                            document.getElementById("practice");
                        } else {
                            var practiceArr = g.split('@');
                            var ul = document.getElementById("practice");
                            practiceArr.forEach(function(i, item, array) {
                                if (item === array.length - 1) {

                                } else {
                                    var li = document.createElement("li");
                                    li.setAttribute("class", "list-group-item");
                                    li.appendChild(document.createTextNode(i));
                                    ul.appendChild(li);
                                }

                            });
                        }
                    }

                    /**
                     * Responds to the mouse-out event on a map shape (state).
                     *
                     * @param {?google.maps.MouseEvent} e
                     */
                    function mouseOutOfRegion(e) {
                        // reset the hover state, returning the border to normal
                        e.feature.setProperty('upazila', 'normal');
                        //$('#data-box').hide();
                    }



                    // Set a callback to run when the Google Visualization API is loaded.
                    google.charts.setOnLoadCallback(populationPiChart);

                    // Callback that creates and populates a data table,
                    // instantiates the pie chart, passes in the data and
                    // draws it.
                    function populationPiChart(re, ny) {

                        // Create the data table.
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                            ['Male', +re],
                            ['Female', +ny]
                        ]);

                        // Set chart options
                        var options = {
                            //'title': 'Information of Upazilla workshop Population'
                            'width': 120,
                            'height': 120,
                            legend: {
                                position: 'top'
                            }
                        };

                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.PieChart(document.getElementById('pichart_population'));
                        chart.draw(data, options);
                    }


                    // Set a callback to run when the Google Visualization API is loaded.
                    google.charts.setOnLoadCallback(participantPiChart);

                    // Callback that creates and populates a data table,
                    // instantiates the pie chart, passes in the data and
                    // draws it.
                    function participantPiChart(re, ny) {

                        // Create the data table.
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                            ['Male', +re],
                            ['Female', +ny]
                        ]);

                        var options = {
                            legend: {
                                position: 'bottom'
                            }
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('pichart_participant'));
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
