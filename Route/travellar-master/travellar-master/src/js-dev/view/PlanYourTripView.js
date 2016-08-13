/* globals Util, Trip, User, Day, Days, Transports, Sleepplaces, Location */

var PlanYourTripView = Backbone.View.extend({
	template: hbs.planyourtrip,

	initialize: function(options) {
		console.log("[PlanYourTripView] Init");
		_.bindAll(this);

		this.collection = options.collection;
		this.model = options.model;

		console.log(this.model.trip.toJSON());
	},

	events: {
		"submit #frmPlanYourTrip1": "form1Submitted",
		"submit #frmPlanYourTrip2": "form2Submitted",
		"click #goTo3": "goToNextStep",
		"click #skipTo3": "goToNextStep",
		"click div.days_overview > a": "dayClickedHandler",
		"click #backToDays": "backToDays"
	},

	renderProtectedArea: function() {
		this.$el.html(hbs.planyourtrip_protected_1);

		$('#start_date').pickadate({format: 'd mmmm, yyyy', formatSubmit: 'yyyy-mm-dd'});
		$('#end_date').pickadate({format: 'd mmmm, yyyy', formatSubmit: 'yyyy-mm-dd'});

		if(this.model.trip.get("start_date") !== undefined) {
			$("#start_date").val(Util.FormatReadableDate(this.model.trip.get("start_date")));
			$('input[name="start_date_submit"]').val(this.model.trip.get("start_date"));
		}

		if(this.model.trip.get("end_date") !== undefined) {
			$("#end_date").val(Util.FormatReadableDate(this.model.trip.get("end_date")));
			$('input[name="end_date_submit"]').val(this.model.trip.get("end_date"));
		}

		this.$form = $("#frmPlanYourTrip1");
		this.$responseContainer = $("div.response");

		this.validatePlanYourTrip1Form();
	},

	form1Submitted: function(e) {
		console.log("[PlanYourTripView] Form 1 submitted");

		e.preventDefault();

		// More detailed validation (not supported by plugin)
		var formData = this.$form.serializeObject();

		formData.start_date = formData.start_date_submit;
		formData.end_date = formData.end_date_submit;
		delete formData.start_date_submit;
		delete formData.end_date_submit;

		var today = Util.FormatDate(new Date().getTime());

		if(Util.DateBiggerThan(today, formData.start_date)) {
			Util.DisplayStatusMessage(this.$responseContainer, "error", "Your start date must start in the future, not the past.");
		}
		else if(Util.DateBiggerThan(formData.start_date, formData.end_date)) {
			Util.DisplayStatusMessage(this.$responseContainer, "error", "We're not going to time travel, pal. Your ending date can't be before your start date.");
		}
		else if(formData.start_date === formData.end_date) {
			Util.DisplayStatusMessage(this.$responseContainer, "error", "A trip of 1 day? Not worth planning it with this tool.");
		}
		else {
			Util.ShowLoading();

			this.model.trip.set(formData);
			this.model.trip.set('user_id', this.model.user.get('id'));

			var that = this;
			this.model.trip.save(null, {
				success: function(model, response) {
					Util.HideLoading();

					Util.HideStatusMessage(1);

					// Fancy animations
					var target = $("#pytWrapper");
					var width = target.width();

					target.animate({
						left: -width
					}, 300, function() {

						that.$el.html(hbs.planyourtrip_protected_2);
						target = $("#pytWrapper");
						target.css('right', -width);
						target.animate({
							right: 0
						}, 300);

						that.$form = that.$el.find("#frmPlanYourTrip2");
						that.$responseContainer = that.$el.find("div.response");
						that.validatePlanYourTrip2Form();
					});

				},
				error: function(model, response) {
					Util.HideLoading();
					Util.DisplayStatusMessage(this.$responseContainer, "error", "Something went wrong while creating the trip. Please try again.");
				}
			});
		}
	},

	goToNextStep: function(e) {
		e.preventDefault();

		Util.ShowLoading();

		var that = this;
		this.model.trip.save(null, {
			success: function(model, response) {
				Util.HideLoading();

				// Fancy animations
				var target = $("#pytWrapper");
				var width = target.width();

				target.animate({
					left: -width
				}, 300, function() {

					var start_date = that.model.trip.get("start_date");
					var end_date = that.model.trip.get("end_date");
					var days_count = Util.DaysDifferenceDate(start_date, end_date);

					that.collection.days = new Days();

					for(var i = 1; i <= days_count; i++) {
						var day = new Day();

						var newDate = new Date(start_date);
						newDate.setDate(newDate.getDate() + (i -1));

						day.set("day_date", Util.FormatDate(newDate));
						day.set("day", i);
						day.set("trip_id", that.model.trip.get("id"));

						that.collection.days.add(day);
					}

					Util.ShowLoading();

					that.collection.days.save(function(data) {

						that.model.trip.set("days", that.collection.days.toJSON());

						that.$el.html(hbs.planyourtrip_protected_3({ days: that.model.trip.get("days"), days_count: days_count }));
						target = $("#pytWrapper");
						target.css('right', -width);
						target.animate({
							right: 0
						}, 300);

						Util.HideLoading();
						
					});
				});
			},
			error: function(model, response) {
				Util.HideLoading();
				Util.DisplayStatusMessage(that.$responseContainer, "error", "Something went wrong while saving your companions. Please try again.");
			}
		});
	},

	dayClickedHandler: function(e) {
		e.preventDefault();


		Util.ShowLoading();

		var that = this;
		that.model.currentDayModel = _.findWhere(that.collection.days.models, { id: $(e.currentTarget).attr('data-id') });

		that.collection.transports = new Transports();
		that.collection.transports.fetch({
			success: function() {

				that.collection.sleepplaces = new Sleepplaces();
				that.collection.sleepplaces.fetch({
					success: function() {
						
						Util.HideLoading();

						// Fancy animations
						var target = $("#pytWrapper");
						var width = target.width();

						target.animate({
							left: -width
						}, 300, function() {

							var day = that.model.currentDayModel.toJSON();
							that.$el.html(hbs.planyourtrip_protected_4({ day: day, sleepplaces: that.collection.sleepplaces.toJSON(), transports: that.collection.transports.toJSON()}));

							if(day.sleep_place_id !== null) {
								that.$el.find("#sleep_place_id option").each(function() {
									if(day.sleep_place_id === $(this).attr('value')) {
										console.log(this);
										$(this).prop('selected', true);
									}
								});
							}

							if(day.transport_id !== null) {
								that.$el.find("#transport_id option").each(function() {
									if(day.sleep_place_id === $(this).attr('value')) {
										console.log(this);
										$(this).prop('selected', true);
									}
								});
							}

							target = $("#pytWrapper");
							target.css('right', -width);
							target.animate({
								right: 0
							}, 300);


							that.renderGoogleMaps();
						});
					}
				});
			}
		});
	},

	renderGoogleMaps: function() {
		var that = this;

		var styles = [{
			"elementType": "all",
			"stylers": [
		      { "saturation": -65 },
		      { "hue": "#004cff" },
		      { "lightness": 11 }
			]
		}];

		var styledMap = new google.maps.StyledMapType(styles,
		{name: "Styled Map"});


		var mapOptions = {
			zoom: 2,
			center: new google.maps.LatLng(0, 0),
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			},
			zoomControl: true,
			scaleControl: true,
			scrollwheel: false,
			streetViewControl: false,
			panControl: true,
			mapTypeControl:  true
		};

		var map = new google.maps.Map(document.getElementById('mapPlaceHolder'), mapOptions);

		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');

		var marker;

		function placeMarker(location) {
			if(marker) {
				marker.setPosition(location);
			}
			else {
				marker = new google.maps.Marker({
					position: location,
					map: map
				});
			}

			$("#location").val( location.lng() + "," + location.lat() );
		}

		var prevLoc = this.model.currentDayModel.get('location');

		if(!$.isEmptyObject(prevLoc) && prevLoc.lat !== null && prevLoc.lat !== 0 && prevLoc.lng !== null && prevLoc.lng !== 0) {
			console.log(prevLoc);
			placeMarker(new google.maps.LatLng(prevLoc.lat, prevLoc.lng));
		}

		google.maps.event.addListener(map, 'click', function(event) {
			placeMarker(event.latLng);
		});
	},

	backToDays: function(e) {
		e.preventDefault();

		Util.ShowLoading();

		var that = this;
		that.$form = $("#frmPlanYourTrip4");


		function saveModelData() {
			that.model.currentDayModel.save(null, {
				success: function(model, response) {

					Util.HideLoading();

					// Fancy animations
					var target = $("#pytWrapper");
					var width = target.width();

					target.animate({
						right: -width
					}, 300, function() {

						that.$el.html(hbs.planyourtrip_protected_3({days: that.collection.days.toJSON(), days_count: that.collection.days.length }));
						target = $("#pytWrapper");
						target.css('left', -width);
						target.animate({
							left: 0
						}, 300);
					});

				}
			});
		}


		var formData = that.$form.serializeObject();

		that.model.currentDayModel.set("transport_id", formData.transport_id);
		that.model.currentDayModel.set("sleep_place_id", formData.sleep_place_id);

		if(formData.location.length > 0) {
			formData.location = formData.location.split(",");

			var location = new Location();
			location.set("lng", formData.location[0]);
			location.set("lat", formData.location[1]);

			location.save(null, {
				success: function(model, response) {
					that.model.currentDayModel.set("location_id", location.get("id"));
					that.model.currentDayModel.set("location", location.toJSON());

					saveModelData();
				}
			});

		}
		else {
			saveModelData();
		}
	},

	form2Submitted: function(e) {
		console.log("[PlanYourTripView] Form 2 submitted");

		e.preventDefault();

		var formData = this.$form.serializeObject();

		var email = formData.email.toLowerCase();
		var companions = this.model.trip.get("companions");

		if(_.findWhere(companions, {email: email}) === undefined) {
			companions.push(new User({email: email}).toJSON());

			this.model.trip.set("companions", companions);

			this.$el.find('div.companions').parent().html(hbs.planyourtrip_protected_2_companions({companions: companions}));

			// In case we want to delete a user
			var that = this;
			this.$el.find('div.companions a').unbind().on('click', function(e) {
				e.preventDefault();

				var clickedEmail = $.trim($(this).text());
				$(this).remove();


				companions = _.without(companions, _.findWhere(companions, {email: clickedEmail}));				
				that.model.trip.set("companions", companions);
			});

			this.$form.find('#email').val('');
		}
		else {
			Util.DisplayStatusMessage(this.$responseContainer, "error", "This email is already added to the companions list.");
		}

	},

	validatePlanYourTrip2Form: function() {
		console.log("Validation form 2 called");
		var that = this;

		that.$form.validate({
			onfocusout: false,
			onkeyup: false,
			rules: {
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				email: {
					required: "If you want to add a companion you must fill in something of course.",
					email: "Please fill in a valid email.",
				}
			},
		    showErrors: function(errorMap, errorList) {
				console.log("[PlanYourTripView] Form 2 validation");

		        that.$responseContainer.html("");
		        if(errorList.length) {
		            Util.DisplayStatusMessage(that.$responseContainer, "error", errorList[0]['message']);
		        }
		    }
		});
	},

	validatePlanYourTrip1Form: function() {
		var that = this;

		that.$form.validate({
			onfocusout: false,
			onkeyup: false,
			rules: {
				name: {
					required: true,
					minlength: 4
				},
				start_date: {
					required: true,
					minlength: 2
				},
				end_date: {
					required: true,
					minlength: 2
				}
			},
			messages: {
				name: {
					required: "Please enter a reference name for your trip.",
					minlength: "The reference name must contain at least 4 characters."
				},
				start_date: {
					required: "Please enter a starting date.",
					date: true
				},
				end_date: {
					required: "Please enter an ending date.",
					date: true
				}
			},
		    showErrors: function(errorMap, errorList) {
				console.log("[PlanYourTripView] Form validation");

		        that.$responseContainer.html("");
		        if(errorList.length) {
		            Util.DisplayStatusMessage(that.$responseContainer, "error", errorList[0]['message']);
		        }
		    }
		});
	},

	render: function() {
		this.$el.html(this.template());
		$('#progress_modal').nsProgress('showWithStatusAndMaskType', 'Loading&hellip;', 'black');

		// Protected page
		var that = this;
		Util.CheckLogin(this.model.user, function(status, message) {
			if(status === "success") {
				that.renderProtectedArea();
			}

			$('#progress_modal').nsProgress('dismiss');
		});

		return this;
	}
});