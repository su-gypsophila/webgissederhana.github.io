<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>WebGIS Sederhana</title>
<link rel="icon" href="<?=base_url()?>assets/favicon.ico">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/template/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/template/dist/css/adminlte.min.css">


</head>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->          
<script src="<?php echo base_url()?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/template/dist/js/demo.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/leaflet.groupedlayercontrol.css" />
<script src="<?=base_url()?>assets/leaflet.groupedlayercontrol.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/Control.MiniMap.css" />
<script src="<?=base_url()?>assets/Control.MiniMap.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/L.Control.ZoomBar.css"/>
<script type="text/javascript" src="<?=base_url()?>assets/L.Control.ZoomBar.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/Leaflet.Coordinates-0.1.5.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/Leaflet.Coordinates-0.1.5.css"/>
<script type="text/javascript" src="<?=base_url()?>assets/leaflet.legend.js"></script> 
<link rel="stylesheet" href="<?=base_url()?>assets/leaflet.legend.css" />
</head>