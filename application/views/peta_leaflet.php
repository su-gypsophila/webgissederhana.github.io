<div class="content">
<div id="map" style="width: 100%; height: 630px; color:black;"></div>
</div>

<script>

//LAYER
var masjid = new L.LayerGroup();
var pasar = new L.LayerGroup();
var gov = new L.LayerGroup();
var kesmas = new L.LayerGroup();
var sd = new L.LayerGroup();
var smp = new L.LayerGroup();
var sma = new L.LayerGroup();
var pt = new L.LayerGroup();
var jalan = new L.LayerGroup();
var adm = new L.LayerGroup();

//ADDMAP

var map = L.map('map', {
center: [-0.456295, 100.593006],
zoom: 14, 
zoomControl: true,
layers:[]
});

//BASEMAPS

var BasemapSatellite= L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
maxZoom: 16, minZoom: 1,
attribution: '© ESRI 2022'
}).addTo(map);

var BasemapTopo= L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
maxZoom: 16, minZoom: 1,
attribution: '© ESRI 2022'
})

var BasemapGoogle= L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
maxZoom: 16, minZoom: 1,
attribution: '© Google 2022'
}) 

//kontrol

var baseLayers = {'Peta Citra Satelit' : BasemapSatellite, 'Peta Topografi': BasemapTopo, 'Peta Google' : BasemapGoogle};
var groupedOverlays = {
"DATA TITIK":{
'Masjid' :masjid,
'Pasar' :pasar,
'Kantor Pemerintahan' :gov,
'Puskesmas' :kesmas,
'Sekolah Dasar' :sd,
'Sekolah Menengah Pertama' :smp,
'Sekolah Menengah Atas' :sma,
'Perguruan Tinggi' :pt,
},
"DATA GARIS":{
'Jalan' :jalan
},
"DATA POLIGON":{
'Batas Administrasi Kecamatan' :adm }
};
//L.control.layers(baseLayers, groupedOverlays).addTo(map);
L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map);

var osmUrl='https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
var osmAttrib='Map data &copy; OpenStreetMap contributors';
var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 10, attribution: osmAttrib }); 
var rect1 = {color: "#ff1100", weight: 1};
var rect2 = {color: "#0000AA", weight: 1, opacity:0, fillOpacity:0};
var miniMap = new L.Control.MiniMap(osm2, {toggleDisplay: true, position : "bottomright", aimingRectOptions : rect1, shadowRectOptions: rect2}).addTo(map);

L.Control.geocoder({position :"topleft", collapsed:true}).addTo(map);

var north = L.control({position: "bottomleft"});
            north.onAdd = function(map) {
                var div = L.DomUtil.create("div", "info legend");
                div.innerHTML = '<img src="<?=base_url()?>assets/mataangin.png"style=width:200px;>';
                return div; }
            north.addTo(map);

// Legend
var legend = L.control.Legend({
position: "bottomleft",
title: "Legenda",
collapsed: true,
symbolWidth: 25,
opacity: 1,
column: 2,
legends: [{
   label: "Masjid",
type: "image",
url: "<?=base_url()?>/assets/l_masjid.png",
},{
   label: "Pasar",
type: "image",
url: "<?=base_url()?>/assets/l_pasar.png",
},{
   label: "Kantor Pemerintahan",
type: "image",
url: "<?=base_url()?>/assets/l_pemerintahan.png",
},{
   label: "Puskesmas",
type: "image",
url: "<?=base_url()?>/assets/l_kesmas.png",
},{
label: "Sekolah Dasar",
type: "image",
url: "<?=base_url()?>/assets/l_SD.png",
},{
   label: "Sekolah Menengah Pertama",
type: "image",
url: "<?=base_url()?>/assets/l_SMP.png",
},{
   label: "Sekolah Menengah Atas",
type: "image",
url: "<?=base_url()?>/assets/l_SMA.png",
},{
   label: "Perguruan Tinggi",
type: "image",
url: "<?=base_url()?>/assets/l_PT.png",
}]
}).addTo(map);


// Panggil Data Masjid
$.getJSON("<?=base_url()?>assets/MASJID.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_masjid.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(masjid);
      });
// Panggil Data pasar
$.getJSON("<?=base_url()?>assets/PASAR.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_pasar.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(pasar);
      });

// Panggil Data Pemerintahan
$.getJSON("<?=base_url()?>assets/PEMERINTAHAN.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_pemerintahan.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(gov);
      });

      // Panggil Data kesmas
$.getJSON("<?=base_url()?>assets/PUSKESMAS.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_kesmas.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(kesmas);
      });

      // Panggil Data SD
      $.getJSON("<?=base_url()?>assets/SD.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_SD.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(sd);
      });

      // Panggil Data SMP
            $.getJSON("<?=base_url()?>assets/SMP.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_SMP.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(smp);
      });

      // Panggil Data SMA
            $.getJSON("<?=base_url()?>assets/SMA.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_SMA.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(sma);
      });

      // Panggil Data PT
            $.getJSON("<?=base_url()?>assets/PT.geojson",function(data){ 
         var ratIcon = L.icon({  
            iconUrl: '<?=base_url()?>assets/l_PT.png',
            iconSize: [20,20]
         });
      L.geoJson(data,{
            pointToLayer: function(feature,latlng){
               var marker = L.marker(latlng,{icon: ratIcon}); marker.bindPopup(feature.properties.NAMOBJ); return marker;
            }
         }).addTo(pt);
      });
      // Panggil jalan
      
      $.getJSON("<?=base_url()?>/assets/JALAN.geojson",function(kode){ L.geoJson(kode, {
style: function(feature){
var color,
kode = feature.properties.kode;
if ( kode = 1 ) color = "#ffff", weight = 5;
else if ( kode = 2 ) color = "ffff", weight = 3;
else if ( kode = 3 ) color = "ffff", weight = 2;
else if ( kode = 4 ) color = "ffff", weight = 1;
else color = "#ffff", weight = 0; // no data

return { color: "#999", weight: weight, color: color, fillOpacity: .5 };
},
onEachFeature: function(feature, layer){
layer.bindPopup(feature.properties.REMARK)

} }).addTo(jalan); });


      // Panggil adm
      $.getJSON("<?=base_url()?>/assets/ADM_KEC.geojson",function(OBJECTID){ L.geoJson(OBJECTID, {
style: function(feature){
var fillColor,
OBJECTID = feature.properties.OBJECTID;
if (OBJECTID = 14) fillColor="#f2f2f2"
else if (OBJECTID = 13) fillColor="#ffffff"
else if (OBJECTID = 12) fillColor="#ffffff"
else if (OBJECTID = 11) fillColor="#ffffff"
else if (OBJECTID = 10) fillColor="#ffffff"
else if (OBJECTID = 9) fillColor="#ffffff"
else if (OBJECTID = 8) fillColor="#ffffff"
else if (OBJECTID = 7) fillColor="#ffffff"
else if (OBJECTID = 6) fillColor= "#ffffff"
else if (OBJECTID = 5) fillColor="#ffffff"
else if (OBJECTID = 4) fillColor="#ffffff"
else if (OBJECTID = 3) fillColor="#ffffff"
else if (OBJECTID = 2) fillColor="#ffffff"
else if (OBJECTID = 1) fillColor="#000"
else fillColor = "#65756";  // no data
return { color: "#000", weight: 1.5, fillColor: fillColor, fillOpacity: .1 }; },

onEachFeature: function(feature, layer){
layer.bindPopup(feature.properties.NAMOBJ)
}
}).addTo(adm);

});

/* GPS enabled geolocation control set to follow the user's location */
   var locateControl = L.control.locate({
     position: "topleft",
     drawCircle: true,
     follow: true,
     setView: true,
     keepCurrentZoomLevel: false,
     markerStyle: {
        weight: 1,
        opacity: 0.8,
        fillOpacity: 0.8
     },
     circleStyle: {
      weight: 1,
      clickable: false
     },
     icon: "fa fa-location-arrow",
     metric: false,
     strings: {
      title: "Lokasi Saya",
      popup: "Kamu berjarak {distance} {unit} dari titik ini",
      outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
     },
     locateOptions: {
     maxZoom: 18,
     watch: true,
     enableHighAccuracy: true,
     maximumAge: 10000,
     timeout: 10000
  }
}).addTo(map);

var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);
    
L.control.coordinates({  
  position:"bottomleft",
  decimals:2,  
  decimalSeperator:",",  
  labelTemplateLat:"Latitude: {y}",  
  labelTemplateLng:"Longitude: {x}"  
 }).addTo(map); 
/* scala */ 
L.control.scale({metric: true, position: "bottomleft"}).addTo(map);
 


</script>