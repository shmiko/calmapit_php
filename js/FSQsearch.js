/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var photos = [];
var options = {
  autoResize: true, // This will auto-update the layout when the browser window is resized.
  container: $('#tiles'), // Optional, used for some extra CSS styling
  offset: 2, // Optional, the distance between grid items
  itemWidth: 210 // Optional, the width of a grid item
};

var handler = null;
var page = 1;
var isLoading = false;
var category = '4deefb944765f83613cdba6e,4fceea171983d5d06c3e9823,4bf58dd8d48988d182941735';

var foursquare = {
  apiURL : 'https://api.foursquare.com/v2/',
  venuesearch : 'venues/search?',
  venuecategories : 'venues/categories?',
  id : 'client_id=FBXSIF2E5OPJDB5ZYNYXYEOIDRZFAD3HCKJ5HOBACAWTMISA&client_secret=53NTKHLIULTZEL0X5QJLMLORTQRHEVVDUASBPKOFDAWJ4HO2&v=20120612'
}

var vSearch = foursquare.apiURL + foursquare.venuesearch + foursquare.id;
var vCategories = foursquare.apiURL + foursquare.venuecategories + foursquare.id;
var imageSrc;
var request;

function ajax(url,type,func){
  $.ajax({
    url:url,
    type:"GET",
    cache:false,
    dataType:type,
    contentType:"application/json; charset=utf-8",
    success:func,
    error: function(XMLHttpRequest, textStatus, errorThrown){
      $("#debug").html(textStatus+XMLHttpRequest.responseText);
    }
  });
}

/*
  Initialize the quicksearch
*/

function search(c){
  $('#tiles').html('');
  if(c != null){
    category = c;
  }
  page = 1;
  loadData();
}


function makeFSQrequest(){
  request = foursquare.apiURL + foursquare.venuesearch + foursquare.id;
  if(inputLocation.value != ""){
    request += '&near=' + inputLocation.value;
	
  }
  else{
    request += '&near=Sydney';
  }
  request += '&categoryId=' + category;
  request += '&limit=50';
}

function makeFSQPhotoRequest(venueId){
  request = foursquare.apiURL + 'venues/' + venueId + '/photos?' + foursquare.id;
};


function getFSQPhoto(venueId){
  makeFSQPhotoRequest(venueId);
  $.ajax({
    url: request,
    dataType: 'jsonp',
    data: {
      page : page
    }, // Page parameter to make sure we load new data
    success: getPhoto
  });
}

function getPhoto(data){
  
  var i = photos.length;
  if(data.response.photos.groups[1] != null){
    photos.push(data.response.photos.groups[1].items);
    $('#image'+i).attr("src",data.response.photos.groups[1].items[0].prefix + 'original' + data.response.photos.groups[1].items[0].suffix);
    $('#image'+i).attr("height",Math.round(photos[i][0].height/photos[i][0].width*250));
    
  }
  else{
    photos.push('img/noimage.jpg');
    $('#image'+i).attr("src","img/noimage.jpg");
    document.getElementById('list' + i).style.display = 'none';
    $('#image'+i).attr("height","200px");
    
    
  }
  applyLayout();
  $('#list'+i).fadeTo('normal', 1);
  
}


/**
     * When scrolled all the way to the bottom, add more tiles.
     */
function onScroll(event) {
  // Only check when we're not still waiting for data.
  if(!isLoading) {
    // Check if we're within 100 pixels of the bottom edge of the broser window.
    var closeToBottom = ($(window).scrollTop() + $(window).height() > $(document).height() - 100);
    if(closeToBottom) {
      loadData();
    }
  }
};
    
/**
     * Refreshes the layout.
     */
function applyLayout() {
  // Clear our previous layout handler.
  if(handler) handler.wookmarkClear();
      
  // Create a new layout handler.
  handler = $('#tiles li');
  handler.wookmark(options);
};
    
/**
     * Loads data from the API.
     */
    
function loadData() {
  isLoading = true;
  $('#loaderCircle').show();
  makeFSQrequest();
  $.ajax({
    url: request,
    dataType: 'jsonp',
    data: {
      page: page
    }, // Page parameter to make sure we load new data
    success: onLoadData
  });
};
    
/**
     * Receives data from the API, creates HTML for images and updates the layout
     */
var j=0;
var x=0;


function onLoadData(data) {
  photos = [];
  j++;
  isLoading = false;
  $('#loaderCircle').hide();
  var html = '';
  var i=0, length=data.length, image;  
  for(i=0; i<data.response.venues.length; i++) {
    html += '<li id=list' + i +  ' style="opacity:0;">';
    imageSrc = '../img/noimage.jpg';
    getFSQPhoto(data.response.venues[i].id);
    html += '<img src="" id=image'+ i + ' width=245 height=0">';
    html += '<p>' + data.response.venues[i].name + '</p>';
    html += '</li>';
  }
  
  $('#tiles').append(html);

  applyLayout();
};
  
$(document).ready(new function() {
  // Capture scroll event.
  //$(document).bind('scroll', onScroll);
      
  // Load first data from the API.
  loadData();
});

