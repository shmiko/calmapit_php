/// <reference path="gviz-api.js" />
/// <reference path="jquery-1.5-vsdoc.js" />
/*
* Google Map Cycling Trip - maps out a cycling trip form Berea, KY to Pueblo, CO.
*
* http://dedogs.com (2011.1.9) 
* *
* @name Cycling Trip Map
* @type JavaScript/JQuery
* @author Kirk deDoes (topdog@dedogs.com)
**
Variables
*   actions (object) are used in Asynchronous callback:
AllStates: responds with all states.
getLegs: responds with all Legs.
DailyTrip: responds with all way points.
getMarkers: responds with all markers.
*   action (int) which action is needed.
*   leg (object) holds JSON Leg object from Asynchronous response.
*   map (object) Google map object.
*   ftWayPtLayer (object) Google map fusion table layer displaying waypoints.
*   ftStateLayer (object) Google map fusion table layer outlining States
*   ftWayPtID and ftStateID (int) are fusion table distinct IDs
*   infoWinW and infoWinH (int) are the width and height of the information window.
*   currentState (string) initial state.
*   latLng (object) initial Latitude and Longitude coordinates.
*   directiosService (object) Google DirectionsSerive object.
*   directionsRenders (array objects) Elements Google DirectionsRenders objects
*   markers (array objects) Elements Google Marker objects. 
*   
*/

var gMap = {
    //Initialize variables
    actions: { AllStates: 0, mapTrip: 1, getLegs: 2, DailyTrip: 3, getMarkers: 4 }
    , action: 0
    , leg: null
    , map: null
    , infoWinW: 275
    , infoWinH: 200
    , states: ""
    , currentState: "All"
    , traveledState: ""
    , latLng: { start: { lat: 37.568694, lng: -84.296322 }, end: { lat: 44.565156, lng: -123.261967 } }
    , directionsService: null
    , directionsRenders: []
    , markers: []
    , ftWayPtLayer: null
    , ftStateLayer: {}
    , ftWayPtID: "1900527"
    , ftStateID: "1926106"
    , apiKey: "AIzaSyBaQmYTPMnIjMwwdOrMpSAbqObfASrJXJY"
    , wayPTsTableID: "1FTNJq3wAoYZiaeaida0iNAZr-XxUTyY9qfwC-d4"
    , tourLegTableID: "1bVttfwP2HPOgI_wj80k7NL2Axp_WDAFb4S1AwaM"
    //Initialize Google Map. Sets bounds, adds two fusion table layers (highlight States, traveled path).
    //-----------------------------------------------------------------------------------------------
   , InitMap: function () {

       gMap.map = new google.maps.Map(document.getElementById("map_canvas"), {
           mapTypeId: google.maps.MapTypeId.ROADMAP,
           zoom: 11
       });

       gMap.FitBounds();

       gMap.ftWayPtLayer = new google.maps.FusionTablesLayer(gMap.ftWayPtID);
       gMap.ftWayPtLayer.setMap(gMap.map);

       gMap.FusionTablesLayer("id IN ('KY','IL','MO','KS','CO')", "#00FF00");

       //Object used to write out directions to the DirectionsBox panel.
       var directionsRenderer = new google.maps.DirectionsRenderer({ map: gMap.map, suppressMarkers: true });
       directionsRenderer.setPanel(document.getElementById("DirectionsBox"));

   }

    //Asynchronous call to generic handler: passing: JSON string to be deserialized on server, returning: valid JSON data string.
    //action: type of action to be taken. Retrieves both which State and Leg was selected.
    , Request: function () {
        //gMap.ClearMarkers();

        var url = gMap.GetRequestURL();

        //Populate drop downs
        $.ajax({
            url: url.join(''), dataType: 'jsonp', success: function (data) {
                var rows = data['rows'];

                if (typeof rows !== "undefined") {
                    var results = [];
                    for (var i = 0; i < rows.length; i++) {
                        results.push({ id: rows[i][1], title: rows[i][0] });
                    }

                    var select = $("select");
                    if (gMap.action === gMap.actions.DailyTrip) {
                        select = select.filter(":last");
                    } else {
                        select = select.filter(":first");
                    }
                    gMap.PopOptions(results, select);
                }
            }
        });
    }

    //Handles Asynchronous Response:
    //----------------------------------------------------
    //data: JSON string holding Leg information.
    , HandleAsyncRequest: function (data, textStatus, jqXHR) {
        if (gMap.action == gMap.actions.mapTrip) {
            gMap.leg = data;    //Hold a copy Leg data
            gMap.MapTrip();
            gMap.Markers();
        } else if (gMap.action == gMap.actions.DailyTrip) {
            gMap.leg = data;    //Hold a copy Leg data
            gMap.MapTrip();

            //Selecting State, do Async call for Legs related to State.
            //gMap.action = gMap.actions.getLegs;
            //gMap.Request();

        } else {
            var obj = $("select");

            if (data.states !== null) {
                //States were returned populate State drop down and set to default.
                //elem = obj.filter(":first");
                //gMap.PopOptions(data.states, elem);

                //Populate Leg drop downs.
                gMap.action = gMap.actions.getLegs;
                gMap.Request();
            } else if (data.tourLeg !== null) {
                //Legs were returned populate Leg drop down and set to default. 
                var secondSelect = obj.filter(":last");
                gMap.PopOptions(data.tourLeg, secondSelect);
            }
        }
    }
    //----------------------------------------------------

    //Using Google Fusion Tables, highlights States traveled on the map.
    , FusionTablesLayer: function (whereClause, fillColor) {
        var opt = {
            map: gMap.map,
            suppressInfoWindows: true,
            query: { select: "geometry", from: gMap.ftStateID, where: whereClause },
            styles: [{
                where: whereClause,
                polygonOptions: { fillColor: "#0000ff", fillOpacity: 0.1 }
					},
		{
			where: "id = '" + gMap.currentState + "'",
			polygonOptions: { fillColor: fillColor, fillOpacity: 0.1 }
		}
            ]
        };
        gMap.ftStateLayer["All"] = new google.maps.FusionTablesLayer(opt);
        gMap.ftStateLayer["All"].setMap(gMap.map);
    }
    , GetRequestURL: function () {
        var query = "";

        switch (gMap.action) {
            case gMap.actions.AllStates:
                query = "select state, count() from " + gMap.wayPTsTableID + " group by state order by state";
                break;
            case gMap.actions.getLegs:
                break;
            case gMap.actions.mapTrip:
                query = "select state from " + gMap.wayPTsTableID + " group by state";
                break;
            case gMap.actions.getMarkers:
                break;
            case gMap.actions.DailyTrip:
                query = "select title, iDate, description from " + gMap.tourLegTableID + " where state = '" + gMap.GetSelectedState() + "' order by iDate desc";
                break;
            default:

                break;
        }

        var encodedQuery = encodeURIComponent(query);        // Construct the URL
        var url = ['https://www.googleapis.com/fusiontables/v1/query'];
        url.push('?sql=' + encodedQuery);
        url.push("&key=" + gMap.apiKey);
        url.push('&callback=?');        // Send the JSONP request using jQuery

        return url;

    }
    , GetSelectedState: function () {
        return $("select:first option:selected").text();
    }
    //Sets the bounds of the map.
    , FitBounds: function () {
        var start = new google.maps.LatLng(gMap.latLng.start.lat, gMap.latLng.start.lng);
        var end = new google.maps.LatLng(gMap.latLng.end.lat, gMap.latLng.end.lng);
        gMap.map.fitBounds(new google.maps.LatLngBounds(end, start));
    }

    //Clears Direction overlays from map. Removes drawn blue path.
    , ClearOverlays: function () {
        //All Direction objects are stored in an array.
        for (var i = 0; i < gMap.directionsRenders.length; i++) {
            gMap.directionsRenders[i].setMap(null);
        }
    }

    //Writes out directions to DirectionsBox panel. 
    , RenderPoints: function (arryResults) {
        if (arryResults.length === 0) { return } //Return if no results

        var directionsRendererOpt = { map: gMap.map, suppressMarkers: true };
        var obj = document.getElementById("DirectionsBox");
        obj.innerHTML = "";

        var directionsRenderer = new google.maps.DirectionsRenderer(directionsRendererOpt);
        directionsRenderer.setPanel(obj);

        //Hold on to created overlay, so it could be removed from the map later.
        gMap.directionsRenders.push(directionsRenderer);

        directionsRenderer.setDirections(arryResults);    //Write out directions

    }

    //Map complete trip.
    , MapTrip: function () {
        try {
            if (gMap.leg === null) {
                alert("Have not set way points for this particular leg.");
                return;
            }

            var maxWayPts = 8;
            var lat, lng;
            var arryResults = [];

            gMap.ClearOverlays();

            for (var k = 0; k < gMap.leg.length; k++) {
                var oWayPts = gMap.leg[k].wayPoints;
                var wayPoints = [];
                var oBounds = {};
                oBounds.origin = oWayPts.splice(0, 1); //Beginning waypoint
                var wpLength = oWayPts.length;
                wpLength = parseInt(wpLength / 8) + (wpLength % 8 == 0) ? 0 : 1;
                for (var i = 0; i < wpLength; i++) {
                    for (var j = i * maxWayPts; j < maxWayPts * (i + 1) - 1; j++) {
                        if (typeof oWayPts[j] === "undefined") {
                            break;
                        } else {
                            wayPoints.push(
                                {
                                    location: new google.maps.LatLng(oWayPts[j].latLng.lat, oWayPts[j].latLng.lng),
                                    stopover: false
                                });
                        }
                    }
                    if (wayPoints.length > 0) {
                        oBounds.destination = wayPoints.splice(wayPoints.length - 1, 1);
                    }

                    var directionsRequest = {
                        travelMode: google.maps.DirectionsTravelMode.BICYCLING
                    };
                    directionsRequest.origin = new google.maps.LatLng(oBounds.origin[0].latLng.lat, oBounds.origin[0].latLng.lng);

                    /* 
                    Destination is of type waypoint. A waypoint consists of the following fields: •location (required) specifies the address of the waypoint. • stopover (optional) indicates whether this waypoint is a actual stop on the route (true) or instead only a preference to route through the indicated location (false). Stopovers are true by default.
                    ------------------------------------ */
                    lat = oBounds.destination[0].location.lat();
                    lng = oBounds.destination[0].location.lng();

                    directionsRequest.destination = new google.maps.LatLng(lat, lng);
                    oBounds.origin = [{ latLng: { lat: lat, lng: lng } }];

                    directionsRequest.waypoints = wayPoints;

                    gMap.directionsService.route(directionsRequest, function (result, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            gMap.RenderPoints(result);
                        }
                    });
                }
            }

            gMap.ToggleImages(false);
        } catch (e) {
            alert(e);
        }
    }

    //Clears all Markers set on map.
    , ClearMarkers: function () {
        for (var i = 0; i < gMap.markers.length; i++) {
            gMap.markers[i].setMap(null);
        }
    }
    //Asynchronous call retrieving markers and appending to map.
, Markers: function (marks) {
    $.post("cyclingTourHandler.ashx", { action: gMap.actions.getMarkers, leg: $("select:last option:selected").val() }, function (marks) {

        if (typeof marks != "undefined" && marks != null) {
            var size, origin, anchor, section;
            for (var i = 0; i < marks.length; i++) {
                size = marks[i].icon.size.split(",");
                origin = marks[i].icon.origin.split(",");
                anchor = marks[i].icon.anchor.split(",");

                var image = new google.maps.MarkerImage(
    marks[i].iconImg.path + marks[i].iconImg.name,
    new google.maps.Size(size[0], size[1]),
    new google.maps.Point(origin[0], origin[1]),
    new google.maps.Point(anchor[0], anchor[1])
  );
                size = marks[i].icon.sizeS.split(",");
                origin = marks[i].icon.originS.split(",");
                var shadow = new google.maps.MarkerImage(
    marks[i].iconImg.path + "shadow.png",
    new google.maps.Size(size[0], size[1]),
    new google.maps.Point(origin[0], origin[1]),
    new google.maps.Point(anchor[0], anchor[1])
  );

                var shape = {
                    coord: eval(marks[i].icon.shape),
                    type: 'poly'
                };

                var marker = new google.maps.Marker({
                    draggable: false,
                    raiseOnDrag: false,
                    icon: image,
                    shadow: shadow,
                    shape: shape,
                    map: gMap.map,
                    position: new google.maps.LatLng(marks[i].lat, marks[i].lng)
                });

                gMap.markers.push(marker);

                //Image size: w: 275, h:210
                oImg = {}
                oImg.dmens = { width: marks[i].img.width, height: marks[i].img.height };
                oImg.max = { width: gMap.infoWinW, height: gMap.infoWinH };
                oImg.ext = marks[i].img.ext;
                oImg.imgName = marks[i].img.path + marks[i].img.name;

                var img = "<img alt='Information Image' style='margin:0 auto;' src='ThumbHandler.ashx?p=" + JSON.stringify(oImg) + "' />";

                var txt = "<div style='width:400px;overflow:hidden;'><div style='float:left;width:275px;height:210px;overflow:hidden;'>" + img + "</div><div style='float:left;width:120px;overflow:hidden;padding-left:4px;margin-top:12px;'><b>" + marks[i].marker + "</b><div style='margin-bottom:6px;'>" + marks[i].addr + ", " + marks[i].state + "</div>" + marks[i].descrip + "</div></div>";

                gMap.AppendInfoWin(txt, marker);
            }
        }

    }, "json");
}

    //On client click open Information Window on map.
, AppendInfoWin: function (t, m) {
    google.maps.event.addListener(m, 'click', function (e) {
        var infoWindow = new google.maps.InfoWindow();
        infoWindow.setContent(t);
        infoWindow.open(gMap.map, m);
    });
}

    //Drop down list change event handler. When client selects a new State or Leg from drop downs.
, Change: function (e) {
    //e holds HTLMSelect object
    var target = e.target;

    var value;
    for (var i = 0; i < target.length; i++) {
        if (target[i].selected) {
            value = target[i].text;
            break;
        }
    }
    if (typeof value !== "undefined") {
        if (typeof gMap.ftStateLayer["All"] !== "undefined") {
            gMap.ftStateLayer["All"].setMap(null);

            delete gMap.ftStateLayer["All"];
        }
        var opt = {
            map: gMap.Map,
            suppressInfoWindows: true,
            query: { select: 'id', from: gMap.ftStateID, where: "id = '" + value + "'" }
        }
        //var layer = new google.maps.FusionTablesLayer({ query: { select: 'id', from: gMap.ftStateID, where: "id = 'KY'" }, });
        gMap.ftStateLayer[value] = new google.maps.FusionTablesLayer(opt);
        gMap.ftStateLayer[value].setMap(gMap.map);
    }

    //switch (obj.id) {
    //    case "ddl_0":
    //        //State was selected
    //        if (obj.value !== "0") {
    //            gMap.PleaseWait();
    //            gMap.action = gMap.actions.DailyTrip;
    //            //gMap.Request();
    //            //FusionTablesLayer(" state = " + obj.value);
    //            var v = obj.text;
    //        } else {
    //            gMap.PleaseWait();
    //            gMap.ToggleImages(true);
    //            obj = $("#ddl_2");
    //            obj.find("option").remove();
    //            gMap.PleaseSelect(obj);
    //            gMap.ClearOverlays();
    //            gMap.FitBounds();
    //        }
    //        break;
    //    case "ddl_2":
    //        //Tour Leg was selected
    //        if (obj.value !== "0") {
    //            gMap.PleaseWait();
    //            gMap.action = gMap.actions.mapTrip;
    //            //gMap.Request();
    //        } else {
    //            gMap.PleaseWait();
    //            gMap.action = gMap.actions.DailyTrip;
    //            //gMap.Request();
    //        }
    //        break;
    //}

    e.stopPropagation();
}

    //Hide or shows sidebar images. When a State and/or Leg is chosen, trip directions hide the images.
    //When Drop downs are at their defaults, then the images are shown and trip directions are hidden.
, ToggleImages: function (showImgs) {
    var s = $(".sideBarImg, .sidebar .caption");
    var g = $("#DirectionsBox");
    if (showImgs) {
        s.css("display", "block");
        g.css("display", "none");
    } else {
        s.css("display", "none");
        g.css("display", "block");
    }
}

    //Populates drop downs.
, PopOptions: function (data, elem) {
    if (data !== null) {
        var opt;
        elem.find("option").remove();

        gMap.PleaseSelect(elem); //Append default settings.

        for (i = 0; i < data.length; i++) {
            opt = $("<option>").val(data[i].id).text(data[i].title);
            elem.append(opt);
        }
    }
}

    //Reset drop down back to default.
, PleaseSelect: function (obj) {
    var opt = ($("<option>").val(0).text("Please Select..."));
    obj.prepend(opt);
    obj.find("option:first").attr("selected", "selected");
}
, SetTraveledState: function () {
    var query = "SELECT state FROM " + gMap.tourLegTableID;
    var encodedQuery = encodeURIComponent(query);        // Construct the URL
    var url = ['https://www.googleapis.com/fusiontables/v1/query'];
    url.push('?sql=' + encodedQuery);
    url.push("&key=" + gMap.apiKey);
    url.push('&callback=?');

    $.ajax({
        url: url.join(''), dataType: 'jsonp', success: function (data) {
            var rows = data['rows'];

            if (typeof rows !== "undefined") {
                gMap.traveledState = rows[rows.length - 1][0];
            }
        }
    });
}
    //When map changes, please wait appears in the middle of map container. Please Wait is hidden after the map becomes idle. 
, PleaseWait: function () {
    $("#PleaseWait").show();
    google.maps.event.addListenerOnce(gMap.map, "idle", function () {
        $("#PleaseWait").hide();
    });
}

    //Positions information is given about the map when a client clicks on the question mark next to the drop downs.
, PositionInfo: function () {
    var obj = $(".stopOvers img");
    var pos = obj.offset();
    $("#gMapInfo").css({ "top": pos.top + obj.height(), "left": pos.left });
}

, Init: function () {
    gMap.directionsService = new google.maps.DirectionsService();

    //Initialize Drop Downs
    $("select").change(gMap.Change);
    gMap.action = gMap.actions.AllStates;
    //gMap.States();
    gMap.Request();
    //-------------------------------

    gMap.InitMap();
    gMap.PositionInfo();
    gMap.SetTraveledState();
    $(".stopOvers img").mouseenter(function () {
        $("#gMapInfo").show();
    }).mouseleave(function () {
        $("#gMapInfo").hide();
    });
}

};

//Scale Images: Mini images are images located under description.
//SideBar images are located in the sidebar.
var ScaleImgs = {
    Mini: function () {
        var obj = $("#CyclingTemplate .miniContent");
        var max = { width: obj.width(), height: obj.width() };
        var scaleImg = { dmens: max, ext: ".jpg", imgName: "/images/mikesBike.jpg", max: max };
        var img = $("<img alt='Selected Image'>");

        $(obj.get(0)).find("div:first").html(img.attr("src", "ThumbHandler.ashx?p=" + JSON.stringify(scaleImg)));

        img = $("<img alt='Selected Image'>");
        scaleImg.imgName = "/images/bereaCoffeeTea.jpg";

        $(obj.get(1)).find("div:first").html(img.attr("src", "ThumbHandler.ashx?p=" + JSON.stringify(scaleImg)));

        img = $("<img alt='Selected Image'>");
        scaleImg.imgName = "/images/kirkCamping.jpg";

        $(obj.get(2)).find("div:first").html(img.attr("src", "ThumbHandler.ashx?p=" + JSON.stringify(scaleImg)));
    },
    SideBar: function () {
        var obj = $(".sideBarImg");
        var max = { width: obj.width(), height: obj.height() };
        var img = $("<img alt='Selected Image'>");
        var scaleImg = { dmens: max, ext: ".jpg", imgName: "/images/cartDogSolo.jpg", max: max };

        $(obj.get(0)).html(img.attr("src", "ThumbHandler.ashx?p=" + JSON.stringify(scaleImg)));

        img = $("<img alt='Selected Image'>");
        scaleImg.imgName = "/images/mikesBike1.jpg";
        scaleImg.ext = ".jpg";
        $(obj.get(1)).html(img.attr("src", "ThumbHandler.ashx?p=" + JSON.stringify(scaleImg)));

        img = $("<img alt='Selected Image'>");
        scaleImg.imgName = "/images/topper.jpg";
        scaleImg.ext = ".jpg";
        max.width -= 50;
        $(obj.get(2)).html(img.attr("src", "ThumbHandler.ashx?p=" + JSON.stringify(scaleImg)));
    }
};

//Client click opens a new window pointed to nomadicdog.blogspot.com
function BlogWin() {
    var oWin = window.open("http://nomadicdog.blogspot.com/", "tourBlog");
    oWin.focus();
};

//Load the Google script. Script source query string includes a callback to Initialize handler.
function LoadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=Initialize";
    document.body.appendChild(script);
};

//After Google script successfully loaded, Initialize is called.
function Initialize() {
    if (typeof google !== "undefined") {
        gMap.Init();
    }
};

//Start the map display action.
$(function () {
    ScaleImgs.Mini();
    ScaleImgs.SideBar();
    LoadScript();

    window.onresize = function () {
        ScaleImgs.Mini();
        ScaleImgs.SideBar();
    };
});


//---------------------------
//Google Analytics.
//---------------------------
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-26120447-1']);
_gaq.push(['_trackPageview']);

var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

//---------------------------
//Google 1+ button
//---------------------------
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);


