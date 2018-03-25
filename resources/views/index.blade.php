<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>Hackaton</title>
    <link href="{{ URL::asset('css/impact/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/pe-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/reset.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/shCore.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/shThemeDefault.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/impact/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/impact/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('js/impact/jquery.localscroll-1.2.7-min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="../../public/js/impact/html5shiv.js"></script>
    <script src="../../public/js/impact/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../../public/images/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="../../public/images/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../public/images/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../public/images/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="../../public/images/ico/apple-touch-icon-57x57.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

        .item-inner img {
            max-height: 150px;
        }
      #mapwrapper {
          height: 700px;
      }

      section#mapView {
        padding: 0;          
      }

      #map {
        height: 100%;
      }

      form input, form select {
        width: 100%;
        padding: 10px 5px;
        margin-bottom: 15px;
        background-color: rgba(0, 0, 0, 0.1);
        color: #202020;
        border: none;
      }

      form textarea {
          width: 100%;
          min-height: 150px;
          padding: 10px 5px;
          margin-bottom: 15px;
          background-color: rgba(0, 0, 0, 0.1);
          color: #202020;
          border: none;
      }

      .modal-body .container {
          max-width: 100%;

      }

      .col-centered {
          float: none;
          margin: 0 auto;
      }

      .fix_me {
          left: 15px;
      }
    </style>

    <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Details</h4>

                    <div class="gap"></div>
                    <div class="container">
                        <div class="row">
                            <div class="center gap fade-down section-heading">
                                <h2 class="main-title">Pictures</h2>
                                <div class="gap"></div>
                            </div>
                            <div class='col-md-offset-2 col-md-8 fade-up'>
                                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                    <!-- Bottom Carousel Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#quote-carousel" data-slide-to="1"></li>
                                        <li data-target="#quote-carousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Carousel Slides / Quotes -->
                                    <div class="carousel-inner">
                                        <!-- Quote 1 -->
                                        <div class="item active">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <img id="institution-photo-1" class="img-responsive" src="#" style="width: 100px;height:100px;">
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- Quote 2 -->
                                        <div class="item">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <img id="institution-photo-2" class="img-responsive" src="#" style="width: 100px;height:100px;">
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- Quote 3 -->
                                        <div class="item">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <img id="institution-photo-3" class="img-responsive" src="#" style="width: 100px;height:100px;">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gap"></div>
                    </div>

            </div>
            <div class="modal-body">
                <div class="container">
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2" for="institution-name">Name</label>
                            <div class="col-sm-10"><input id="institution-name" type="text" disabled name="name" placeholder="Name" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="institution-type">Type</label>
                            <div class="col-sm-10"><input id="institution-type" type="text" disabled name="type_id" placeholder="Name" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="institution-address">Address</label>
                            <div class="col-sm-10"><input id="institution-address" type="text" disabled name="address" placeholder="Name" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="institution-website">Website</label>
                            <div class="col-sm-10"><input id="institution-website" type="text" disabled name="name" placeholder="Name" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="institution-email">Email</label>
                            <div class="col-sm-10"><input id="institution-email" type="text" disabled name="name" placeholder="Name" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="institution-phone">Phone number</label>
                            <div class="col-sm-10"><input id="institution-phone" type="text" disabled name="name" placeholder="Name" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Ratio</label>
                            <div class="col-sm-10"><input id="institution-ratio" type="text" disabled name="ratio" placeholder="Optional. Ratio" /></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="institution-description">Description</label>
                            <div class="col-sm-6"><textarea id="institution-description" disabled class="form-control"></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Owner name</label>
                            <div class="col-sm-4"><input id="institution-owner-name" type="text" disabled name="owner_name" placeholder="Optional. Owner name" /></div>
                            <label class="col-sm-2">Short description</label>
                            <div class="col-sm-4"><input id="institution-short-description" type="text" disabled name="short_description" placeholder="Optional. Short description" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"><input id="institution-fb-page" type="text" disabled name="fb_page" placeholder="Optional. Facebook page" /></div>
                            <label class="col-sm-1"><i class="fa fa-facebook"></i></label>
                            <div class="col-sm-3"><input id="institution-twitter-page" type="text" disabled name="fb_page" placeholder="Optional. Facebook page" /></div>
                            <label class="col-sm-1"><i class="fa fa-twitter"></i></label>
                            <div class="col-sm-3"><input id="institution-instagram-page" type="text" disabled name="twitter_page" placeholder="Optional. Twitter page" /></div>
                            <label class="col-sm-1"><i class="fa fa-instagram"></i></label>
                        </div>
                        <div class="form-group">

                        </div>
                    </form>
                    <hr>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

    <script type="text/javascript">
        modalModel = {};
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('body').backstretch([
                "images/bg/bg-robotics-1.jpg",
                "images/bg/bg-robotics-2.jpg",
                "images/bg/bg-robotics-3.jpg"
            ], {duration: 5000, fade: 500, centeredY: true });

        });
    </script>
    <script>
      $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
      });
      var map;
      var markers = [];

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(44.430575, 26.100955),
          mapTypeId: 'roadmap'
        });

       filterMarkers = function() {
            if($('#type').val())
            {
                var valori = $('#type').val().toString().split(",");
                for(var i = 0; i < valori.length; i++)
                    valori[i] = parseInt(valori[i]);

                for (i = 0; i < markers.length; i++) {

                    if($.inArray(JSON.parse(markers[i].category.replace(/&quot;/g,'"')).id, valori) != -1)
                        markers[i].setVisible(true);
                    else
                        markers[i].setVisible(false);
                }
            }
            else
            {
                for (i = 0; i < markers.length; i++) {
                    markers[i].setVisible(true);
                }
            }
        }

        var open_infowindow;

        //Create markers
        @foreach($institutions as $institution)
            var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{ $institution->lat }} , {{ $institution->lng }}),
            category: '{{ $institution->type->toJson() }}',
            icon: {url: "{{ ($institution->ratio >= 0.45 && $institution->ratio <= 0.55) ? substr($institution->type->icon->path, 0, -4) . '-badge.' . substr($institution->type->icon->path, -3) : $institution->type->icon->path }}", scaledSize: new google.maps.Size(45, 45)},
            map: map,
              object: {!! json_encode($institution) !!},
              photos: {!! json_encode($photos) !!},
              rating: {!! json_encode($institution->computeRating()) !!}
          });

            markers.push(marker);

            google.maps.event.addListener(marker, 'mouseover', function() {
                    //var aux = Object.assign({}, marker);  
              
              let contentString = '<div class="row"><div class="col-xs-3"> <img src=' + '{{ $institution->photos->first()->path }}' + ' height="60" width="60"> </div>';

              contentString += '<div class="col-xs-9 fix_me"> <b>' + '{{ $institution->name }}' + '</b>';

              short_des = '{{ $institution->short_description }}';

              short_des += new Array(30 - short_des.length).join(' ');
              contentString += '<p>' + short_des;
              /*if('{{ $institution->email }}' != '')
                contentString += '<p> {{ $institution->email }}';
              if('{{ $institution->fb_page }}' != '')
                contentString += '<p> {{ $institution->fb_page }}';
              if('{{ $institution->twitter_page }}' != '')
                contentString += '<p> {{ $institution->twitter_page }}';
              if('{{ $institution->ig_page }}' != '')
                contentString += '<p> {{ $institution->ig_page }}';
              if('{{ $institution->description }}' != '')
                contentString += '<p> {{ $institution->description }}';
              if('{{ $institution->ratio }}' != '')
                contentString += '<p> {{ $institution->ratio }}';
              if('{{ $institution->website }}' != '')
                contentString += '<p> {{ $institution->website }}';*/

                contentString += '</div></div>';

              let infowindow = new google.maps.InfoWindow({
                content: contentString
              });

              if(open_infowindow)
                open_infowindow.close();

              infowindow.open(map, this);

              open_infowindow = infowindow;
            });

            google.maps.event.addListener(marker, 'click', function() {
                modalModel = marker.object;
                photos = marker.photos;
                rating = marker.rating;

                console.log(modalModel);

                nrPhotos = 3;
                for(let i = 1 ; i <= nrPhotos ; i++) {
                    if(photos.length >= i) {
                        $("#institution-photo-" + i).attr('src', photos[i - 1].path);
                    }
                }

                $("#institution-name").attr('value', modalModel.name);
                $("#institution-type").attr('value', modalModel.type.name);
                $("#institution-address").attr('value', modalModel.address);
                $("#institution-website").attr('value', modalModel.website);
                $("#institution-email").attr('value', modalModel.email);
                $("#institution-phone").attr('value', modalModel.phone_number);
                $("#institution-description").attr('value', modalModel.description);
                $("#institution-owner-name").attr('value', modalModel.owner_name);
                $("#institution-short-description").attr('value', modalModel.short_description);
                $("#institution-ratio").attr('value', modalModel.ratio);
                $("#institution-fb-page").attr('value', modalModel.fb_page);
                $("#institution-twitter-page").attr('value', modalModel.twitter_page);
                $("#institution-instagram-page").attr('value', modalModel.ig_page);



                $("#myModal").modal();
            });

            google.maps.event.addListener(marker, 'mouseout', function() {
                open_infowindow.close();
            });

          
        @endforeach


        var input = document.getElementById('address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();

            $('input[name="lat"]').attr('value',lat);
            $('input[name="lng"]').attr('value',lng);
        
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI2EpvQc_HdFPc12TQTigdfE61gdjkEM8&libraries=places&callback=initMap">
    </script>
</head><!--/head-->
<body>
<div id="preloader"></div>
<header class="navbar navbar-inverse navbar-fixed-top " role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html"><h1><span class="pe-7s-gleam bounce-in"></span> IMPACT</h1></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="smoothScroll gototop">Home</a></li>
                <li><a href="#map" class="smoothScroll">Map</a></li>
                <li><a href="#create" class="smoothScroll">Create</a></li>
                <li><a href="#about-us" class="smoothScroll">About Us</a></li>
                <li><a href="#gallery" class="smoothScroll">Gallery</a></li>                
                {{--  <li><a href="#contact-us" class="smoothScroll">Contact</a></li>  --}}
                @if (!Auth::user())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li><a id="logout" href="#">Logout</a></li>
                @endif               
            </ul>
        </div>
    </div>
</header><!--/header-->

<section id="main-slider" class="no-margin">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <span class="home-icon pe-7s-gleam bounce-in"></span>
                                <h2 class="boxed animation animated-item-1 fade-down">Robots connecting the world</h2>
                                <div class="clearifx"></div>
                                <p class="boxed animation animated-item-2 fade-up">Diversity. Equality. Spread the knowledge. Grow.</p>
                                <br>
                                <a class="btn btn-md animation bounce-in" href="#services">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
</section><!--/#main-slider-->

<div id="content-wrapper">
    <section id="services" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap fade-down section-heading">
                        <h2 class="main-title">Things You Can Do</h2>
                        <hr>
                        {{--  <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>  --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <a href="#map"><div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-globe fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Map</h3>
                            <p>Check the map to see the registered robotics-related entities.</p>
                        </div>
                    </div>
                </div></a><!--/.col-md-6-->
                <a href="#create"><div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-plus-square fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Create</h3>
                            <p>Register an institution through a quick form.</p>
                        </div>
                    </div>
                </div></a><!--/.col-md-6-->
            </div><!--/.row-->
            <div class="gap"></div>
            <div class="row">
                <a href="#events"><div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-calendar fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Events</h3>
                            <p>See upcoming robotics-related events & sign up for them.</p>
                        </div>
                    </div>
                </div></a><!--/.col-md-6-->
                <a href="#feedback"><div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-star fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Feedback</h3>
                            <p>Offer feedbacks</p>
                        </div>
                    </div>
                </div></a><!--/.col-md-6-->
            </div><!--/.row-->
        </div>
        {{--  <div class="gap"></div>  --}}
        {{--  <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap fade-down section-heading">
                        <h2 class="main-title">Our Skills</h2>
                        <hr>
                        <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="tile-progress tile-red bounce-in">
                        <div class="tile-header">
                            <h3>Video Editing</h3>
                            <span>Our cutting room floor is messy.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="65.5%" style="width: 65.5%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">65.5</span>%
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile-progress tile-cyan bounce-in">
                        <div class="tile-header">
                            <h3>Marketing</h3>
                            <span>How well we can sell you and your brand.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="98.5%" style="width: 98.5%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">98.5</span>%
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile-progress tile-primary bounce-in">
                        <div class="tile-header">
                            <h3>Web Development</h3>
                            <span>We love servers and stuff.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="90%" style="width: 90%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">90</span>%
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile-progress tile-pink bounce-in">
                        <div class="tile-header">
                            <h3>Coffee</h3>
                            <span>We done make good joe, though.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="10%" style="width: 10%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">10</span>%
                            </h4>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
            <div class="gap"></div>
        </div> --}}
        <div class="gap"></div>        
    </section>

    <section id="mapView" class="white">
        <div id="mapwrapper">
            <p style="margin-bottom:10px"> <b> Filter by institution type </b> </p>
            <select class="js-example-basic-multiple" multiple="multiple" style="position:relative; z-index: 100; bottom: -200px" id="type" onchange="filterMarkers();">
                @foreach($institution_types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <div id="map"></div>
        </div>
    </section>

    <section id="create" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Add a location</h2>
                <hr>
                <p>Tell us about a robotic-related place you know.</p>
            </div>
            <div class="gap"></div>
            <form method="post" action="{{ route('institutions.store') }}" id="store-institution"> 
                @csrf           

                <div class="row">
                    <div class="col-md-6 fade-up">
                        <input type="text" name="name" placeholder="Name" />
                        <select name="type_id">
                            @foreach ($institution_types as $institutionType)
                                <option value="{{ $institutionType->id }}">{{ $institutionType->name }}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="address" placeholder="Address" /> -->
                        <input id="address" name="address" type="text"
                                placeholder="Address">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                        <!-- <div id="infowindow-content">
                            <img src="" width="16" height="16" id="place-icon">
                            <span id="place-name"  class="title"></span><br>
                            <span id="place-address"></span>
                        </div> -->

                        <input type="text" name="owner_name" placeholder="Optional. Owner name" />
                        <input type="text" name="short_description" placeholder="Optional. Short description" />
                        <textarea name="description" placeholder="Optional. Description"></textarea>
                    </div><!-- col -->

                    <div class="col-md-6 fade-up">
                        <input type="hidden" name="lat" />
                        <input type="hidden" name="lng" />
                        <input type="text" name="website" placeholder="Optional. Website" />                        
                        <input type="text" name="email" placeholder="Optional. Contact email" />
                        <input type="text" name="phone_number" placeholder="Optional. Phone number" />
                        <input type="text" name="fb_page" placeholder="Optional. Facebook page" />
                        <input type="text" name="twitter_page" placeholder="Optional. Twitter page" />
                        <input type="text" name="ig_page" placeholder="Optional. Instagram page" />
                        <input type="text" name="males" placeholder="Optional. Number of males" />
                        <input type="text" name="females" placeholder="Optional. Number of females" />
                    </div><!-- col -->
                </div><!-- row -->

                <div class="row">
                    <div class="col-md-12 col-lg-offset-3 col-lg-6">
                        <button class="btn btn-outlined btn-primary" type="submit"> Submit</button>
                    </div>
                </div>                        
            </form>            
            <div class="gap"></div>
        </div>
    </section>

    <section id="single-quote" class="divider-section">
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class='col-md-offset-2 col-md-8 fade-up'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/quote/isaac-asimov.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>The Three Laws of Robotics:</p>
                                            <div>
                                                1: A robot may not injure a human being or, through inaction, allow a human being to come to harm;
                                            </div>
                                            <div>
                                                2: A robot must obey the orders given it by human beings except where such orders would conflict with the First Law;
                                            </div>
                                            <div>
                                                3: A robot must protect its own existence as long as such protection does not conflict with the First or Second Law;
                                            </div>
                                            <div>
                                                The Zeroth Law: A robot may not harm humanity, or, by inaction, allow humanity to come to harm.
                                            </div>
                                            <small>Isaac Asimov, I, Robot</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
    </section>

    <section id="about-us" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap fade-down section-heading">
                        <h2 class="main-title">A Little About Us</h2>
                        <hr>
                        <p><strong>E-Civis</strong> : <a href="http://e-civis.eu/" target="_blank">our website</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 fade-up">
                    <p class="text-center">We're an NGO called E-Civis, based in Romania. Our mission is to promote democratic values
                    at a global level.</p>
                </div>
                <div class="col-md-4 fade-up">

                </div>
            </div>
            {{--  <div class="gap"></div>
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Meet The Team</h2>
                <hr>
                <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
            </div>
            <div class="gap"></div>

            <div id="meet-the-team" class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team01.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team01.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>Daniel Jones<small class="role muted">Web Design</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team02.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team02.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>John Smith<small class="role muted">Marketing Director</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team03.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team03.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>Dave Gorman<small class="role muted">Web Design</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team04.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team04.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>Steve Smith<small class="role muted">Sales Assistant</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--/#meet-the-team-->  --}}
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
    </section>

    <section id="stats" class="divider-section">
        <div class="gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-timer bounce-in"></span></span>
                        <h1><span class="counter">246000</span></h1>
                        <h3>HOURS SAVED</h3>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-light bounce-in"></span></span>
                        <h1><span class="counter">16875</span></h1>
                        <h3>FRESH IDEAS</h3>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-graph1 bounce-in"></span></span>
                        <h1><span class="counter">99999999</span></h1>
                        <h3>HUGE PROFIT</h3>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-box2 bounce-in"></span></span>
                        <h1><span class="counter">54875</span></h1>
                        <h3>THINGS IN BOXES</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </section>

    <section id="gallery" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Gallery</h2>
                <hr>
                <p>See some of the user uploaded photos down below.</p>
            </div>

            <ul class="portfolio-items col-3 isotope fade-up">
                @foreach ($photos as $photo)
                    <li class="portfolio-item apps isotope-item">
                        <div class="item-inner">
                            <img src="{{ $photo->path }}" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="{{ $photo->path }}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </li><!--/.portfolio-item-->
                @endforeach
            </ul>
        </div>
    </section>

    {{--  <section id="testimonial-carousel" class="divider-section">
        <div class="gap"></div>
        <div class="container">
            <div class="row">
                <div class="center gap fade-down section-heading">
                    <h2 class="main-title">What They Have Been Saying</h2>
                    <hr>
                    <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
                    <div class="gap"></div>
                </div>
                <div class='col-md-offset-2 col-md-8 fade-up'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/team/team01.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/team/team02.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/team/team03.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
    </section>  --}}

    {{--  <section id="contact-us" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Get In Touch</h2>
                <hr>
                <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
            </div>
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-4 fade-up">
                    <h3>Contact Information</h3>
                    <p>
                        <span>E-Civis</span>
                        <span class="icon icon-home"></span>Mitropolit Grigore nr. 31, sector 4, Bucuresti<br/>
                        <span class="icon icon-phone"></span>+40721 678 764<br/>
                        <span class="icon icon-envelop"></span> <a href="#">office@e-civis.eu</a> <br/>
                        <span class="icon icon-twitter"></span> <a href="#">@infinityteam.com</a> <br/>
                    </p>
                    <div class="fade-up">
                        <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </div>
                </div><!-- col -->

                <div class="col-md-8 fade-up">
                    <h3>Drop Us A Message</h3>
                    <br>
                    <br>
                    <div id="message"></div>
                    <form method="post" action="sendemail.php" id="contactform">
                        <input type="text" name="name" id="name" placeholder="Name" />
                        <input type="text" name="email" id="email" placeholder="Email" />
                        <input type="text" name="website" id="website" placeholder="Website" />
                        <textarea name="comments" id="comments" placeholder="Comments"></textarea>
                        <input class="btn btn-outlined btn-primary" type="submit" name="submit" value="Submit" />
                    </form>
                </div><!-- col -->
            </div><!-- row -->
            <div class="gap"></div>
        </div>
    </section>  --}}
</div>

<div id="footer-wrapper">
    <section id="bottom" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 about-us-widget">
                    <h4>Global Coverage</h4>
                    <p>Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin.</p>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Company</h4>
                    <div>
                        <ul class="arrow">
                            <li><a href="#">Company Overview</a></li>
                            <li><a href="#">Meet The Team</a></li>
                            <li><a href="#">Our Awesome Partners</a></li>
                            <li><a href="#">Our Services</a></li>
                        </ul>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Latest Articles</h4>
                    <div>
                        <div class="media">
                            <div class="pull-left">
                                <img class="widget-img" src="images/portfolio/folio01.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Blog Post A</a></span>
                                <small class="muted">Posted 14 April 2014</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <img class="widget-img" src="images/portfolio/folio02.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Blog Post B</a></span>
                                <small class="muted">Posted 14 April 2014</small>
                            </div>
                        </div>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Come See Us</h4>
                    <address>
                        <strong>Ace Towers</strong><br>
                        New York Ave,<br>
                        New York, 215648<br>
                        <abbr title="Phone"><i class="fa fa-phone"></i></abbr> 546 840654 05
                    </address>
                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2014 <a target="_blank" href="http://www.distinctivethemes.com" title="Premium Themes and Templates">Distinctive Themes</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a id="gototop" class="gototop" href="#"><i class="fa fa-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</div>


<script src="../../js/impact/plugins.js"></script>
<script src="../../js/impact/bootstrap.min.js"></script>
<script src="../../js/impact/jquery.prettyPhoto.js"></script>
<script src="../../js/impact/init.js"></script>

<script>
    $('#logout').on('click', function () {
        $.ajax({
            url: '/logout',
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                window.location = '/';
            }
        });
    });

    // $('#store-institution').on('submit', function (e) {
    //     e.preventDefault();

    //     let formData = $(this).serialize();

    //     $.ajax({
    //         url: "{{ route('institutions.store') }}",
    //         method: 'post',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: formData
    //     });
    // })
</script>

<script type="text/javascript">
    $(function() {

        $("#fname_error_message").hide();
        $("#sname_error_message").hide();
        $("#email_error_message").hide();
        $("#password_error_message").hide();
        $("#retype_password_error_message").hide();

        var error_fname = false;
        var error_sname = false;
        var error_email = false;
        var error_password = false;
        var error_retype_password = false;

        $("#form_fname").focusout(function(){
            check_fname();
        });
        $("#form_sname").focusout(function() {
            check_sname();
        });
        $("#form_email").focusout(function() {
            check_email();
        });
        $("#form_password").focusout(function() {
            check_password();
        });
        $("#form_retype_password").focusout(function() {
            check_retype_password();
        });

        function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#form_fname").val();
            if (pattern.test(fname) && fname !== '') {
                $("#fname_error_message").hide();
                $("#form_fname").css("border-bottom","2px solid #34F458");
            } else {
                $("#fname_error_message").html("Should contain only Characters");
                $("#fname_error_message").show();
                $("#form_fname").css("border-bottom","2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_sname() {
            var pattern = /^[a-zA-Z]*$/;
            var sname = $("#form_sname").val()
            if (pattern.test(sname) && sname !== '') {
                $("#sname_error_message").hide();
                $("#form_sname").css("border-bottom","2px solid #34F458");
            } else {
                $("#sname_error_message").html("Should contain only Characters");
                $("#sname_error_message").show();
                $("#form_sname").css("border-bottom","2px solid #F90A0A");
                error_fname = true;
            }
        }

        function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
                $("#password_error_message").html("Atleast 8 Characters");
                $("#password_error_message").show();
                $("#form_password").css("border-bottom","2px solid #F90A0A");
                error_password = true;
            } else {
                $("#password_error_message").hide();
                $("#form_password").css("border-bottom","2px solid #34F458");
            }
        }

        function check_retype_password() {
            var password = $("#form_password").val();
            var retype_password = $("#form_retype_password").val();
            if (password !== retype_password) {
                $("#retype_password_error_message").html("Passwords Did not Matched");
                $("#retype_password_error_message").show();
                $("#form_retype_password").css("border-bottom","2px solid #F90A0A");
                error_retype_password = true;
            } else {
                $("#retype_password_error_message").hide();
                $("#form_retype_password").css("border-bottom","2px solid #34F458");
            }
        }

        function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
                $("#email_error_message").hide();
                $("#form_email").css("border-bottom","2px solid #34F458");
            } else {
                $("#email_error_message").html("Invalid Email");
                $("#email_error_message").show();
                $("#form_email").css("border-bottom","2px solid #F90A0A");
                error_email = true;
            }
        }

        $("#store-institution").submit(function() {
            error_fname = false;
            error_sname = false;
            error_email = false;
            error_password = false;
            error_retype_password = false;

            check_fname();
            check_sname();
            check_email();
            check_password();
            check_retype_password();

            if (error_fname === false && error_sname === false && error_email === false && error_password === false && error_retype_password === false) {
                alert("Registration Successfull");
                return true;
            } else {
                alert("Please Fill the form Correctly");
                return false;
            }


        });
    });
</script>

</body>
</html>