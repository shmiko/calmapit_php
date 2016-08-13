/* globals Util, User, Trips */

var MyAccountView = Backbone.View.extend({
	template: hbs.myaccount,

	initialize: function(options) {
		console.log("[MyAccountView] Init");
		_.bindAll(this);

		this.collection = options.collection;
		this.model = options.model;

		// Protected page
		Util.CheckLogin(this.model.user);
	},

	events: {
		"click #myProfile": "renderProfile",
		"click #myTrips": "renderTrips",
		"submit #frmProfile": "formSubmitted",
		"click a.edit": "editTripHandler",
		"click a.delete": "deleteTripHandler"
	},

	formSubmitted: function(e) {
		console.log("[MyAccountView] Form submitted");

		e.preventDefault();

		Util.ShowLoading();

		this.newUserData = $('form').serializeObject();
			this.newUserData.hashed = false;
		this.newUserData.password = CryptoJS.SHA256(this.newUserData.password).toString(CryptoJS.enc.Hex);

		if(this.newUserData.newPassword.length > 0) {
			this.newUserData.newPassword = CryptoJS.SHA256(this.newUserData.newPassword).toString(CryptoJS.enc.Hex);
		}
		else {
			delete this.newUserData.newPassword;
		}

		delete this.newUserData.newPasswordVer;

		this.model.user.set(this.newUserData);
		this.model.user.login({callback: this.loginHandler});
	},

	loginHandler: function(status, message) {
		if(status === "success") {
			if(this.newUserData.newPassword !== undefined) {
				this.newUserData.password = this.newUserData.newPassword;
				this.newUserData.hashed = false;
			}

			this.newUserData.email = this.newUserData.newEmail;
			delete this.newUserData.newEmail;

			this.model.user.set(this.newUserData);
			this.model.user.save(null, { success: this.modelSaveSuccess, error: this.modelSaveError });
		}
		else {
			Util.HideLoading();
			Util.DisplayStatusMessage(this.$responseContainer, "error", 'Your current password was incorrect, changes not saved.');
		}
	},

	modelSaveSuccess: function(model, response) {
		this.model.user.set(response.data);
		
		$.cookie('travellar_user', JSON.stringify(this.model.user.toJSON()), { expires: 7 });

		Util.HideLoading();
		Util.DisplayStatusMessage(this.$responseContainer, 'success', 'Your profile was succesfully updated!');
	},

	modelSaveError: function(model, response) {
		Util.HideLoading();

		console.log("[MyAccountView] Model save failed, in other words: user is not updated!");
		Util.DisplayStatusMessage(this.$responseContainer, 'error', 'Something went wrong while updating your profile. Please try again.');
	},

	validateProfileForm: function() {
		var that = this;
		that.$responseContainer = that.$el.find("div.response");

		that.$form.validate({
			onfocusout: false,
			onkeyup: false,
			rules: {
				fname: {
					required: true,
					minlength: 2
				},
				lname: {
					required: true,
					minlength: 2
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5
				},
				newPassword: {
					minlength: 5
				},
				newPasswordVer: {
					required: function() {
						return (that.$form.find("#newPassword").val().length > 0);
					},
					equalTo: that.$form.find("#newPassword")
				}
			},
			messages: {
				fname: {
					required: "Please enter your first name.",
					minlength: "Your first name is not long enough."
				},
				lname: {
					required: "Please enter your last name.",
					minlength: "Your last name is not long enough."
				},
				email: {
					required: "Please enter your email.",
					email: "Please enter a valid email."
				},
				password: {
					required: "Please enter your current password to verify your identity."
				},
				newPassword: {
					minlength: "Your new password must contain at least 5 characters."
				},
				newPasswordVer: {
					equalTo: "Your new password and verification are not the same.",
					required: "Please confirm your new password."
				}
			},
		    showErrors: function(errorMap, errorList) {
				console.log("[MyAccountView] Form validation");

		        that.$responseContainer.html("");
		        if(errorList.length) {
		            Util.DisplayStatusMessage(that.$responseContainer, "error", errorList[0]['message']);
		        }
		    }
		});
	},

	renderProfile: function(e) {
		e.preventDefault();
		this.$buttons.find('a').removeClass('active');
		this.$buttons.find('a#myProfile').addClass('active');
		this.$el.find('div.content').html(hbs.myaccount_profile({ user: this.model.user.toJSON() }));

		// Rebind jQuery elements
		this.bindEvents();
	},

	renderTrips: function(e) {
		e.preventDefault();

		this.$buttons.find('a').removeClass('active');
		this.$buttons.find('a#myTrips').addClass('active');
		Util.ShowLoading();
		this.$el.find('div.content').html(hbs.myaccount_trips);

		// Rebind jQuery elements
		this.bindEvents();

		this.collection.trips = new Trips({ id: this.model.user.get("id") });

		var that = this;
		this.collection.trips.fetch({ 
			success: function(collection, response, options) {
				console.log("[MyAccountView] Fetched Trips collection :)!");
				that.$el.find('div.content').html(hbs.myaccount_trips({ trips: that.collection.trips.toJSON() }));
				Util.HideLoading();
			},
			error: function(collection, response, options) {
				console.log("[MyAccountView] Failed fetching Trips collection :(!");
				Util.HideLoading();
			}
		});
	},

	editTripHandler: function(e) {
		e.preventDefault();

		console.log("[MyAccountView] Edit trip handler");

		var that = this;

		Util.ShowLoading();

		$('#progress_modal').nsProgress('showErrorWithStatusAndMaskType', 'Not available', 'black');

		setTimeout(function() {
			Util.HideLoading();
		}, 3000);

		// var id = $(e.currentTarget).attr("data-id");

		// var modelToEdit = _.findWhere(this.collection.trips.models, {id: id});
		// modelToEdit.fetch({
		// 	success: function(model, response) {
		// 		Util.HideLoading();
		// 		that.model.trip = modelToEdit;
		// 		Backbone.history.navigate('plan-your-trip', true);
		// 	}
		// });
	},

	deleteTripHandler: function(e) {
		e.preventDefault();

		console.log("[MyAccountView] Delete trip handler");
		Util.ShowLoading();

		var id = $(e.currentTarget).attr("data-id");
		var that = this;

		_.findWhere(that.collection.trips.models, {id: id}).destroy({
			success: function(collection, response) {
				// Re render
				that.$el.find('div.content').html(hbs.myaccount_trips({ trips: that.collection.trips.toJSON() }));

				// Re bind
				that.$responseContainer = $("div.response");

				Util.DisplayStatusMessage(that.$responseContainer, "success", "You have successfully deleted a trip.");

				Util.HideLoading();

				Util.HideStatusMessage(5000);
			},
			error: function(collection, response) {
				Util.DisplayStatusMessage(this.$responseContainer, "error", "Something went wrong while deleting the trip. Please try again.");
				Util.HideLoading();
			}
		});
	},

	bindEvents: function() {
		this.$buttons = this.$el.find('div.buttons');
		this.$form = this.$el.find('#frmProfile');
		this.$responseContainer = $('div.response');

		this.validateProfileForm();
	},

	render: function() {
		this.$el.html(this.template({ user: this.model.user.toJSON() }));
		this.bindEvents();

		return this;
	}
});