/* globals User, Util */

var LoginView = Backbone.View.extend({
	template: hbs.login,
	model: new User(),

	initialize: function(options) {
		console.log("[LoginView] Init");
		_.bindAll(this);

		this.collection = options.collection;
		this.model = options.model;
	},

	events: {
		"submit form": "formSubmitted",
		"click #donthaveanaccountyet": "toRegister"
	},

	toRegister: function() {
		Backbone.history.navigate('register', true);
	},

	formSubmitted: function(e) {
		console.log("[LoginView] Form submitted");

		e.preventDefault();

		$('#progress_modal').nsProgress('showWithStatusAndMaskType', 'Loading&hellip;', 'black');

		var hashedPassword = CryptoJS.SHA256(this.$el.find('#password').val()).toString(CryptoJS.enc.Hex);

		this.model.user.set('email', this.$el.find('#email').val());
		this.model.user.set('password', hashedPassword);

		this.model.user.login({ callback: this.loginHandler });
	},

	loginHandler: function(status, message) {
		console.log("[LoginView] Login handling.. Status: " + status + ", message: " + message);

		$('#progress_modal').nsProgress('dismiss');

		if(status === "success") {
			Util.DisplayStatusMessage(this.$responseContainer, "success", "You have succesfully logged in.");
			this.trigger("LOGGED_IN", this.model.user);
			this.$form.delay(3000).slideUp(function() {
				console.log("[LoginView] Animation completed, redirect to My Account");
				Backbone.history.navigate('my-account', true);
			});
		}
		else {
			Util.DisplayStatusMessage(this.$responseContainer, "error", "Something went wrong while logging you in. Is your password correct?");
		}
	},

	validateLoginForm: function() {
		var that = this;

		that.$form.validate({
			onfocusout: false,
			onkeyup: false,
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				email: {
					required: "Please enter your email.",
					email: "Please enter a valid email."
				},
				password: {
					required: "Please enter a password.",
					minlength: "Your password must contain at least 5 characters."
				}
			},
		    showErrors: function(errorMap, errorList) {
				console.log("[LoginView] Form validation");

		        that.$responseContainer.html("");
		        if(errorList.length) {
		            Util.DisplayStatusMessage(that.$responseContainer, "error", errorList[0]['message']);
		        }
		    }
		});
	},

	render: function() {
		this.$el.html(this.template());
		this.$form = this.$el.find('#frmLogin');
		this.$responseContainer = this.$form.siblings('div.response');

		this.validateLoginForm();

		return this;
	}
});