$(document).ready(function(){var infowindow;var map;var bounds=new google.maps.LatLngBounds();var geocoder=new google.maps.Geocoder();var port='';var flightPath='';var m='';var myLatlng=new google.maps.LatLng(0.0,0.0);var myOptions={zoom:13,center:myLatlng,mapTypeId:thisMapType}
map=new google.maps.Map(document.getElementById("map"),myOptions);var waypts=[];var temp=[];var tabs=[];var tooltips=[];var markerUrl=[];var markerShadowUrl=[];var markerWidth=[];var markerHeight=[];var markerShadowWidth=[];var markerShadowHeight=[];downloadUrl(siteUrl+mapsFolder+xmlFile,function(data){var markers=data.documentElement.getElementsByTagName("marker");var _0x6a94=["\x6C\x65\x6E\x67\x74\x68","\x6E\x61\x6D\x65","\x67\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65","\x64\x65\x73\x63","\x74\x6F\x6F\x6C\x74\x69\x70","\x63\x61\x74\x65\x67\x6F\x72\x79","\x6D\x61\x72\x6B\x65\x72\x69\x63\x6F\x6E","\x6D\x61\x72\x6B\x65\x72\x73\x68\x61\x64\x6F\x77","\x6D\x61\x72\x6B\x65\x72\x77\x69\x64\x74\x68","\x6D\x61\x72\x6B\x65\x72\x68\x65\x69\x67\x68\x74","\x6D\x61\x72\x6B\x65\x72\x73\x68\x61\x64\x6F\x77\x77\x69\x64\x74\x68","\x6D\x61\x72\x6B\x65\x72\x73\x68\x61\x64\x6F\x77\x68\x65\x69\x67\x68\x74","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x6D\x6F\x64\x61\x6C\x4D\x61\x70\x22\x3E\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x63\x6C\x6F\x73\x65\x42\x75\x74\x74\x6F\x6E\x22\x20\x74\x69\x74\x6C\x65\x3D\x22\x63\x6C\x6F\x73\x65\x22\x3E\x3C\x2F\x64\x69\x76\x3E\x3C\x68\x34\x3E","\x20\x28","\x29\x3C\x2F\x68\x34\x3E\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x6D\x6F\x64\x61\x6C\x49\x6E\x22\x20\x69\x64\x3D\x22\x6D\x6F\x64\x61\x6C\x5F\x22\x20\x2B\x20\x73\x6D\x20\x2B\x20\x22\x3E","\x3C\x2F\x64\x69\x76\x3E\x3C\x2F\x64\x69\x76\x3E","\x70\x75\x73\x68"];for(var i=0;i<markers[_0x6a94[0]];i++){var start=markers[0][_0x6a94[2]](_0x6a94[1]);var name=markers[i][_0x6a94[2]](_0x6a94[1]);var description=markers[i][_0x6a94[2]](_0x6a94[3]);var tooltipText=markers[i][_0x6a94[2]](_0x6a94[4]);var locationCategory=markers[i][_0x6a94[2]](_0x6a94[5]);var markerIconUrl=markers[i][_0x6a94[2]](_0x6a94[6]);var markerShadowIconUrl=markers[i][_0x6a94[2]](_0x6a94[7]);var markerIconWidth=markers[i][_0x6a94[2]](_0x6a94[8]);var markerIconHeight=markers[i][_0x6a94[2]](_0x6a94[9]);var markerShadowIconWidth=markers[i][_0x6a94[2]](_0x6a94[10]);var markerShadowIconHeight=markers[i][_0x6a94[2]](_0x6a94[11]);var sm=i+1;var tab=_0x6a94[12]+name+_0x6a94[13]+locationCategory+_0x6a94[14]+description+_0x6a94[15];tabs[_0x6a94[16]](tab);tooltips[_0x6a94[16]](tooltipText);markerUrl[_0x6a94[16]](markerIconUrl);markerShadowUrl[_0x6a94[16]](markerShadowIconUrl);markerWidth[_0x6a94[16]](markerIconWidth);markerHeight[_0x6a94[16]](markerIconHeight);markerShadowWidth[_0x6a94[16]](markerShadowIconWidth);markerShadowHeight[_0x6a94[16]](markerShadowIconHeight);temp[_0x6a94[16]](markers[i][_0x6a94[2]](_0x6a94[1]));};var s=parseInt(i)-1;for(var b=0;b<temp.length;++b){(function(address){geocoder.geocode({'address':address},function(results){port=results[0].geometry.location;var gmap=new Array();gmap[b]=results[0].geometry.location;bounds.extend(gmap[b]);flightPlanCoordinates.push(port);m=flightPlanCoordinates.length;var curmarkerIcon=markerUrl[m-1];var curmarkerShadow=markerShadowUrl[m-1];var curmarkerWidth=parseInt(markerWidth[m-1]);var curmarkerWidthHalf=parseInt(curmarkerWidth/2);var curmarkerHeight=parseInt(markerHeight[m-1]);var curshadowWidth=parseInt(markerShadowWidth[m-1]);var curshadowHeight=parseInt(markerShadowHeight[m-1]);var markerIcon=new google.maps.MarkerImage(curmarkerIcon,new google.maps.Size(curmarkerWidth,curmarkerHeight),new google.maps.Point(0,0),new google.maps.Point(curmarkerWidthHalf,curmarkerHeight));var markerShadow=new google.maps.MarkerImage(curmarkerShadow,new google.maps.Size(curshadowWidth,curshadowHeight),new google.maps.Point(0,0),new google.maps.Point(curmarkerWidthHalf,curshadowHeight));var marker=new google.maps.Marker({map:map,icon:markerIcon,shadow:markerShadow,position:results[0].geometry.location,zIndex:flightPlanCoordinates.length});if(flightPlanCoordinates.length==temp.length){var flightPath=new google.maps.Polyline(pOptions);flightPath.setMap(map);}
var tooltipOptions={marker:marker,content:tooltips[m-1],cssClass:'tooltipMap'};var tooltip=new Tooltip(tooltipOptions);google.maps.event.addListener(marker,'click',(function(marker,m){return function(){$("#modalMap").html(tabs[m-1]).show();$('.modalIn').mCustomScrollbar({scrollButtons:{enable:true},theme:"dark"});$(".modalMap").hide().show(500);}})(marker,m));map.fitBounds(bounds);});})(temp[b]);}});$("#modalMap").hide();});$(document).mouseup(function(e){var container=$("#modalMap");if(container.has(e.target).length===0){container.hide(500);}
$(".modalMap .closeButton").click(function(){$("#modalMap").hide(500);});});