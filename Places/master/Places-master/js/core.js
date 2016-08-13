/*!
 * PLACES JS Methods
 * Copyright 2013, Andrew Cobley
 */

var minZoom = 3;
var maxZoom = 6;
var autoZoomOut = false;
var autoPan = false;
var autoPanCenter;
var autoPanBounds;

var PAN_SPEED_MULTIPLIER = 0.0000002;

$(function()
{
	initMap();
	//addDataLayer();
	//sqlTest();
	//setupScrollMenu();
	setupCountryNames();

	// Calculate hidden position of Search Menu
	var mMT = $('.search-menu-viewport').outerHeight() * -1;
	console.log(">>> OUTER = " + $('.search-menu-viewport').outerHeight() + " >>> INNER = " + $('.search-menu-viewport').innerHeight());
	$('.search-menu-container').data('target-margin-top', mMT);
	$('.search-menu-container').css('margin-top', mMT);
	$('.search-menu-container').css('visibility', 'visible');
	//console.log(mMT);

	// Calculate hidden position of Info Panel
	var iMT = $('section.info-panel').outerHeight();
	$('section.info-panel').data('target-margin-top', iMT);
	$('section.info-panel').css('margin-top', iMT);
	$('section.info-panel').css('visibility', 'visible');
	//console.log(iMT);

	// Attach click event to Search Button
	$('section.search-button').click(function()
	{
		$('.search-menu').stop();

		console.log("T: " + $('.search-menu-container').data('target-margin-top'));

		// Check if Search Menu is currently visible.
		if( $('.search-menu-container').data('target-margin-top') === 0 )
		{
			menuHideUp();
		}
		else
		{
			infoHideDown();
			menuShowDown();
		}

	});

	// Attach hover event to Info Panel
	$('section.info-panel').hover(function()
	{
		infoShowView();
	},function()
	{
		infoShowSettle();
	})

});

function menuHideUp()
{
	var mT = $('.search-menu-viewport').outerHeight() * -1;
	$('.search-menu-container').data('target-margin-top', mT);	
	$('.search-menu-container').animate({ marginTop: mT }, 1000);
}

function menuShowDown()
{
	$('.search-menu-container').data('target-margin-top', 0);
	$('.search-menu-container').animate({ marginTop: 0 }, 1000);
}

function infoShowBounce()
{
	$('section.info-panel').data('target-margin-top', 0);	
	$('section.info-panel').animate({ marginTop: 0 }, 750, function()
	{
		$('section.info-panel').data('target-margin-top', '15em');	
		$('section.info-panel').animate({ marginTop: '15em' }, 750);
	});
}

function infoShowUp()
{
	$('section.info-panel').data('target-margin-top', 0);	
	$('section.info-panel').animate({ marginTop: 0 }, 750);
}

function infoShowView()
{
	$('section.info-panel').data('target-margin-top', '3em');	
	$('section.info-panel').animate({ marginTop: '3em' }, 750);
}

function infoShowSettle()
{
	$('section.info-panel').data('target-margin-top', '15em');	
	$('section.info-panel').animate({ marginTop: '15em' }, 750);
}
	
function infoHideDown()
{
	var mT = $('section.info-panel').outerHeight();
	$('section.info-panel').data('target-margin-top', mT);	
	$('section.info-panel').animate({ marginTop: mT }, 750);
}


/*
function setupScrollMenu()
{
	// Temp	
	var list = ['Afghanistan','Albania','Algeria','Andorra','Angola','Antigua and Barbuda','Argentina','Armenia','Australia','Austria','Azerbaijan','Bahrain','Bangladesh','Barbados','Belarus','Belgium','...'];
	var alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

	var el = $('section.search-menu');

	// Add <ul>
	el.append('<ul class="scrollArea"></ul>');

	// Add all <li>
	$.each(list,function(index,item)
	{
		$('section.search-menu ul.scrollArea').append('<li><a href="" id="' + item + '">' + item + '</a></li>');
	});


	// Set first <li> to middle of viewport
	var cY = el.height() / 2;
	var liY = $('section.search-menu ul.scrollArea li').height();
	$('section.search-menu ul.scrollArea').css('paddingTop', cY-(liY/2));

	// Initiate Snap Scroll Plugin
	el.smoothSnapScroll(
	{
		touchScrolling: true,
		snapToCenter: true,
		elementCallback: 'selected'
	});
	
}*/

function setupCountryNames()
{
	var countries = [];
	var qry = 'SELECT places_countries.adm0_a3_us, places_countries.admin, countries_gen.latlng FROM places_countries, countries_gen WHERE places_countries.adm0_a3_us = countries_gen.cca3 ORDER BY admin ASC';

	$.getJSON('http://andoru.cartodb.com/api/v2/sql/?q='+qry, function(data)
	{
    	$.each(data.rows, function(key, val)
    	{
    		countries.push(val);
    	});
    	addCountriesToMenu(countries);
 	});
}

function addCountriesToMenu(countries)
{

	console.dir(countries);

	var el = $('section.search-menu');

	// Add <ul>
	el.append('<ul class="scrollArea list"></ul>');

	// Add all <li>
	$.each(countries,function(index,item)
	{
		$('section.search-menu ul.scrollArea').append('<li><a href="" id="' + item.adm0_a3_us + '" class="country" data-latlng="' + item.latlng + '">' + item.admin + '</a></li>');
	});

	// Initiate Smooth Div Scroll Plugin
	$('#scroll-search').smoothVerticalScroll(
	{
		hotSpotScrolling: false,
		touchScrolling: true,
		manualContinuousScrolling: false,
		mousewheelScrolling: "vertical"
	});

	// Initiate ListJS
	var options = { valueNames: ['country'] };
	var countryList = new List('countries', options)

	addEventsToMenu();
}

function addEventsToMenu()
{
	// Attach click event to each Scroll Menu list item
	$('ul.scrollArea li a').click(function(e)
	{
		var el = $(this);
		e.preventDefault();
		console.log("Clicked ID: " + el.attr('id') + " Value: " + el.text());

		// Convert data-latlng to L.latLng
		var strLatLng = el.data('latlng');
		console.log(">>>>" + strLatLng);
		var arrLatLng = strLatLng.slice(1,strLatLng.length-1).split(" ");
		console.log(">>>>" + arrLatLng[0]);
		var latLng = L.latLng(arrLatLng[0],arrLatLng[1]);
		console.dir(latLng);

		// Fire Map Click Event for Selected Country
		map.fireEvent('click', {latlng: latLng});
	});
}

function getCountryDataForID(id, flag)
{
	var qry = "SELECT * FROM countries_gen WHERE cca3 = '" + id + "'";

	$.getJSON('http://andoru.cartodb.com/api/v2/sql/?q='+qry, function(data)
	{
    		$.each(data.rows, function(key, val)
    		{
    			setInfoForCountryData(val, flag);
    		});
 	});

}

function setInfoForCountryData(country, flag)
{
	// Set Country Name
	$('h3.country').text(country.name + ", ");
	$('h3.country').append("<span class='region'>" + country.region + "</span>");

	// Set Flag
	$('img.flag').attr('src',"data:image/png;base64,"+flag);

	// Set Population
	$('section.population').text(formatNumberWithCommas(country.population));

	// Set Capital
	if(country.capital.length > 0)
	{
		$('section.capital').text(country.capital);
	}
	else
	{
		$('section.capital').text("No Capital");
	}

	// Set Currency
	var currency = country.currency.slice(1,country.currency.length-1);
	currency = currency.split(" ");
	if(currency[0].length > 0)
	{
		var qry = "SELECT * FROM currency_codes WHERE code = '" + currency[0] + "'";
		for(c = 1; c < currency.length; c++)
		{
			qry += " OR code = '" + currency[c] + "'";
		}

		$.getJSON('http://andoru.cartodb.com/api/v2/sql/?q='+qry, function(data)
		{
    		var cur_text = data.rows[0].currency;

 			for(c = 1; c < data.rows.length; c++)
			{
				cur_text += ", " + data.rows[1].currency;
			}

			$('section.currency').text(cur_text);
 		});
	}
	else
	{
		$('section.currency').text("No Currency");
	}

	// Set TLD
	var tld = country.tld.slice(1,country.tld.length-1);
	tld = tld.split(" ");
	if(tld[0].length > 0)
	{
		var tld_text = tld[0];
		for(t = 1; t < tld.length; t++)
		{
			tld_text += ", " + tld[t];
		}

		$('section.tld').text(tld_text);
	}
	else
	{
		$('section.tld').text("No TLD");
	}

	// Show Info Panel
	infoShowBounce();
}

function setBoundsForID(id)
{
	var sql = new cartodb.SQL({ user: 'andoru' });
	var qry = "SELECT * FROM places_countries WHERE adm0_a3_us = '" + id + "'";
	
	sql.getBounds(qry).done(function(bounds)
	{
		var latlon = bounds[0];
		console.log(bounds);
		//var cX = (bounds[0][0] + bounds[1][0]) / 2;
		//var cY = (bounds[0][1] + bounds[1][1]) / 2;
		//var nCenter = L.latLng(cX,cY);
		//console.log(cX + ", " + cY);

		// Calculate Center of Bounds
		var nCenter = L.latLngBounds(L.latLng(bounds[0][0],bounds[0][1]), L.latLng(bounds[1][0], bounds[1][1])).getCenter();
		console.log("Bounds Center Point: " + nCenter);

		// Calculate Zoom Level for Target
		var targetZoom = map.getBoundsZoom(bounds);
		if(targetZoom > maxZoom)
		{
			targetZoom = maxZoom;
		}
		console.log("Max Zoom for Bounds: " + targetZoom);

		autoZoomOut = true;
		autoPanCenter = nCenter;
		autoPanBounds = bounds;

		// Calculate time 
		var dist = map.getCenter().distanceTo(autoPanCenter);
		var panDuration = dist * PAN_SPEED_MULTIPLIER;
		console.log("Pan duration: " + panDuration);

		map.once('zoomend', function()
		{	
			if(autoZoomOut)
			{
				setTimeout(function()
				{

				console.log("<zoomend> has been fired after autoZoomOut!");
	
				autoPan = true;
				autoZoomOut = false;

				console.log(">>ONCE MOVESTART: " + map.getCenter() + " = " + autoPanCenter);
				map.panTo(autoPanCenter, { duration: panDuration });

				map.once('movestart', function()
				{

				});

				map.once('moveend', function()
				{
					console.log(">>ONCE MOVEEND: " + map.getCenter() + " = " + autoPanCenter);
					if(autoPan)
					{
						//console.log("<moveend> has been fired and centers match!");
						autoPan = false;
						setTimeout(function()
						{
							map.fitBounds(autoPanBounds, {maxZoom: maxZoom});
						},250);		
					}
				});

				},600);
			}
	
			console.log("Current zoom level: " + map.getZoom());
	
		});

		// Zoom out to required level
		var curZoom = map.getZoom();
		var zoomChange = 0;
/*
		if(curZoom === targetZoom)
		{
			console.log('Zoom already at target level. Bump out one level.');
			map.setZoom(targetZoom-1);
		}
		else if(curZoom < targetZoom)
		{
			console.log('Zoom already below required level. Firing <zoomend> manually.');
			map.fire('zoomend');
		}
		else
		{
			console.log('Zoomed in too far. Bump out to target level minus one.');
			map.setZoom(targetZoom-1);
		}
*/
		if(panDuration < 0.3)
		{
			console.log("Target: Very Close (Zoom Level -0)");
		}
		else if(panDuration < 0.6)
		{
			console.log("Target: Quite Close (Zoom Level -1)");
			zoomChange--;
		}
		else if(panDuration < 1.0)
		{
			console.log("Target: Quite Far (Zoom Level -2)");
			zoomChange -= 2;
		}
		else
		{
			console.log("Target: Very Far (Zoom Level -3)");
			zoomChange -= 3;
		}

		var newZoom = curZoom + zoomChange;

		if(newZoom < minZoom)
		{
			console.log("New zoom is less than Min zoom. Revert to Min zoom.")
			newZoom = minZoom;
		}
		else if(newZoom > maxZoom)
		{
			console.log("New zoom is more than Max zoom. Revert to Max zoom.")
			newZoom = maxZoom;
		}

		if(newZoom === curZoom)
		{
			console.log('Zoom already at required level. Firing <zoomend> manually.');
			map.fire('zoomend');
		}
		else
		{
			console.log('Zoom change required to level ' + newZoom);
			map.setZoom(newZoom);
		}

    });
}

/*
// CARTODB - SQL TEST
function sqlTest()
{
	var qry = 'SELECT admin FROM places_countries';

	$.getJSON('http://andoru.cartodb.com/api/v2/sql/?q='+qry, function(data)
	{
    	$.each(data.rows, function(key, val)
    	{
      		console.dir(val);
      		console.log(val.admin);
    	});
 	});
}
*/

// Initialise map and addtional data

function initMap()
{
	var mapbox_ID = 'andoru.7l6dpldi';

	map = L.mapbox.map('map', mapbox_ID).setView([45, -40], 3);

	map.on('click', function(e)
	{
		// Initiate event to check for Tooltip
		$('div.map-tooltip').on('DOMNodeInserted',function(e)
		{
			console.dir(e.target);
			if(e.target.className === 'data-country-code')
			{
				$('div.map-tooltip').off('DOMNodeInserted');
				setTimeout(function()
				{
					var country_code = $('.data-country-code').text();
					var country_flag = $('.data-country-flag').text();
					console.log("Clicked on country with code: " + country_code + " >> " + e.latlng);
					if(country_code)
					{
						menuHideUp();
						infoHideDown();
						setBoundsForID(country_code);
		
						// Force pause until Info Panel hidden -> REVISIT
						setTimeout(function()
						{
							getCountryDataForID(country_code, country_flag);
						},750);
					}
		
				},250);
		
			}
		});

	});

	map.on('moveend', function()
	{
		console.log(">>MOVEEND: " + map.getCenter() + " = " + autoPanCenter);
		if(autoPan)
		{
			//console.log("<moveend> has been fired and centers match!");
			//autoPan = false;
			//map.fitBounds(autoPanBounds, {maxZoom: maxZoom});		
		}

	});
}

/*
function addDataLayer()
{
	cartodb.createLayer(map, 'http://andoru.cartodb.com/api/v2/viz/87b4beda-64b8-11e3-ae12-0e49973114de/viz.json').addTo(map)
    	.on('done', function(layer)
		{
        	console.log("Data Layer - Successful!");
    	})
    	.on('error', function(err)
		{
      		alert("Error: " + err);
    	}
	);
}
*/

function formatNumberWithCommas(x)
{
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",");
}



