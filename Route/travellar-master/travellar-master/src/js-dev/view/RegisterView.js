/* globals User, Util */

var RegisterView = Backbone.View.extend({
	template: hbs.register,

	initialize: function(options) {
		console.log("[RegisterView] Init");
		_.bindAll(this);

		this.collection = options.collection;
		this.model = options.model;
	},

	events: {
		"submit form": "formSubmitted",
		"click #alreadyAccount": "toLogin"
	},

	formSubmitted: function(e) {
		console.log("[RegisterView] Form submitted");

		e.preventDefault();

		$('#progress_modal').nsProgress('showWithStatusAndMaskType', 'Loading&hellip;', 'black');

		var hashedPassword = CryptoJS.SHA256(this.$el.find('#password').val()).toString(CryptoJS.enc.Hex);

		this.model.user.set('fname', this.$el.find('#fname').val());
		this.model.user.set('lname', this.$el.find('#lname').val());
		this.model.user.set('email', this.$el.find('#email').val());
		this.model.user.set('password', hashedPassword);

		this.model.user.save(null, { success: this.modelSaveSuccess, error: this.modelSaveError });
	},

	modelSaveSuccess: function(model, response) {
		$('#progress_modal').nsProgress('dismiss');

		if(response.status === "error") {
			if(response.message === "ALREADY_EXISTS") {
				console.log("[RegisterView] There already exists a user with this email :-(!");
				Util.DisplayStatusMessage(this.$responseContainer, 'error', 'There already exists a user with this email, please try another email.');
			}
			else {
				console.log("[RegisterView] ERROR: " + response.message);
				this.modelSaveError(model, response);
			}
		}
		else {
			console.log("[RegisterView] Model save succeed, in other words: user is registered!");
			Util.DisplayStatusMessage(this.$responseContainer, 'success', 'You have succesfully registered! You can now login.');
			this.$form.delay(3000).slideUp(function() {
				console.log("[RegisterView] Animation completed, redirect to Login");
				Backbone.history.navigate('login', true);
			});
		}
	},

	modelSaveError: function(model, response) {
		$('#progress_modal').nsProgress('dismiss');

		console.log("[RegisterView] Model save failed, in other words: user is not registered!");
		Util.DisplayStatusMessage(this.$responseContainer, 'error', 'Something went wrong while registering. Please try again.');
	},

	validateRegisterForm: function() {
		var that = this;

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
				passwordver: {
					equalTo: that.$form.find("#password")
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
					required: "Please enter a password.",
					minlength: "Your password must contain at least 5 characters."
				},
				passwordver: {
					equalTo: "Your password verification does not match your password."
				}
			},
		    showErrors: function(errorMap, errorList) {
				console.log("[RegisterView] Form validation");

		        that.$responseContainer.html("");
		        if(errorList.length) {
		            Util.DisplayStatusMessage(that.$responseContainer, "error", errorList[0]['message']);
		        }
		    }
		});
	},

	toLogin: function() {
		Backbone.history.navigate('login', true);
	},

	render: function() {
		this.$el.html(this.template());
		this.$form = this.$el.find('#frmRegister');
		this.$responseContainer = this.$form.siblings('div.response');

		this.validateRegisterForm();

		return this;
	}
});