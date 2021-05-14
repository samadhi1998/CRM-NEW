@extends('layouts.app')
@section('title','Navigation')
@section('header','Navigation')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
  <title>Google Maps Clone</title> 

 <style>
  body {
      margin: 0;
    }

    #map {
      height: 100vh;
      width: 80vw;
    }
    </style>
 
 
  
</head>
<body>
<div id='map'></div>
<script>
   mapboxgl.accessToken = 'pk.eyJ1IjoibmF0aGFzaGE5OCIsImEiOiJja25vNzE3MDAxNTJ1Mm5ueXNlZzl0dmxiIn0.uyZ7roV2XVuYWBRrhTnYuA';

   navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
  enableHighAccuracy: true
})

function successLocation(position) {
  setupMap([position.coords.longitude, position.coords.latitude])
}

function errorLocation() {
  setupMap([6.901608599999999,80.0087746])
}

function setupMap(center) {
    const map = new mapboxgl.Map({
   container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: center,
    zoom: 13
  })
  const nav = new mapboxgl.NavigationControl();
map.addControl(nav)

var directions = new MapboxDirections({
  accessToken: mapboxgl.accessToken
  
});


map.addControl(directions, 'top-left');
}   

</script>
  
</body>
</html>
@endsection