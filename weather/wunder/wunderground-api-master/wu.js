$(document).ready(function() {
	
	//get the value of the input when user clicks submit
	$('.wuInput').submit(function(event) {
	
	// zero out results from previous search
		$('.results').html('');
	
	// get the value of the tags the user submitted
	var zip = $('input[name=zipInput]').val();
	console.log(zip);
		$.ajax({
			  url : "http://api.wunderground.com/api/a4ce678b4426738b/geolookup/conditions/q/IA/Cedar_Rapids.json",
			  dataType : "jsonp",
			  success : function(parsed_json) {
			  	// console.log(parse_json);
				  var location = parsed_json['location']['city'];
				  var temp_f = parsed_json['current_observation']['temp_f'];
				  alert("Current temperature in " + location + " is: " + temp_f);
			  }
		  });

		//grabs the Weather Undeground JSON for a particular zip
		$.ajax({
			url: "http://api.wunderground.com/api/a4ce678b4426738b/geolookup/conditions/q/"+zip+".json", 
			dataType: "jsonp",
			success: function(parsed_json) {
				// console.log(parse_json);
				//set variables for a few of the parsed weather values
				var location = parsed_json.location.city;
				var weather = parsed_json.current_observation.weather;
				var temp_f = parsed_json.current_observation.temp_f;
				var humidity = parsed_json.current_observation.relative_humidity;
				var wind = parsed_json.current_observation.wind_string
				console.log(location);			
				//put some context around the weather values that you just parsed out
				var weatherIN = "<h2>" + location + "</h2><p>" + weather + "</p><p>temp:" + temp_f + "</p><p>humidity:" + humidity + "</p><p>wind:" + wind + "</p>";
				
				//put the weatherIN string with context and variables into the results div as html
				$(".results").html(weatherIN);
			}
		
		//logs a success in the console if everything works!
		}).done(function() {
	    	console.log("great success");	
	  	
	  	//log a failure in the console if something is broken :( 
	  	}).fail(function() {
	    	console.log("something is broken"); 
	  	
	  	});

	//end on submit function
  	});
	



//end doc ready function
});