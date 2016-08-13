/* globals Util, AppRouter, User, Trip */

var App = Backbone.View.extend({
	id: 'app',
	tagName: 'div',
	template: hbs.app,

	initialize: function() {
		console.log("[App] Init");
		_.bindAll(this);

		this.model = {};
		this.collection = {};
		this.model.user = new User();
		this.model.trip = new Trip();

		this.realMobile = false;

		this.mainView();
		this.router = new AppRouter({appView: this});
		this.navigation();
	},

	mainView: function() {
		console.log("[App] Render");

		this.$el.html(this.template);
		this.$content = this.$el.find("#content");

		// Real mobile?
		if(window.matchMedia("(max-width: 515px)").matches) {
			this.$el.find('#mainNavigation').sticky({topSpacing:0});
			this.realMobile = true;
		}

		this.checkLoggedIn();
	},

	showView: function(view) {
		console.log("[App] Show view");

		if(this.currentView){
			this.currentView.close();
		}

		this.currentView = view;
		this.$content.html(this.currentView.render().$el);

		if(this.realMobile) {
			// Scroll back to top if mobile
			window.scrollTo(0, this.$content.offset().top + 1);
		}

		return this;
	},

	navigation: function() {
		console.log("[App] Manage navigation");

		var nav = this.$el.find("header#top");
		var that = this;

		// Set url contains route
		if(Backbone.history.fragment !== undefined && Backbone.history.fragment !== "") {
			nav.find('li').removeClass('active');
			nav.find('a').each(function() {
				if($(this).attr("href") === ("#" + Backbone.history.fragment)) {
					$(this).parent().addClass('active');
				}

				that.showBanner("#" + Backbone.history.fragment);
			});
		}


		// TODO: CLEAN UP
		
		if(this.realMobile) {

			var $body = $("body");

			$(document).hammer().on("swiperight", function() {
				$body.addClass("showMobileNav");
				Util.DisableScrolling();

				$(document).bind('click', function (e) {
					$body.removeClass("showMobileNav");
					Util.EnableScrolling();
				});

				$("#mainNavigation a").bind('click', function(e) {
					e.stopPropagation();
				});
			});

			$(document).hammer().on("swipeleft", function() {
				$(document).unbind('click');
				$("#mainNavigation").unbind('click');

				$body.removeClass("showMobileNav");
				Util.EnableScrolling();
			});

		}


		// On click set clicked active
		nav.find("a").unbind().on('click', function(e) {

			// If mobile menu
			if($(this).attr('class') === 'toggleNav') {
				e.preventDefault();
				console.log("[App] Toggle mobile menu");


				if($body.hasClass("showMobileNav")) {
					$(document).unbind('click');
					$("#mainNavigation").unbind('click');

					$body.removeClass("showMobileNav");
					Util.EnableScrolling();
				}
				else {
					$body.addClass("showMobileNav");
					Util.DisableScrolling();

					$(document).bind('click', function (e) {
						$body.removeClass("showMobileNav");
						Util.EnableScrolling();
					});

					$("#mainNavigation a").bind('click', function(e) {
						e.stopPropagation();
					});
				}

				return false;
			}



			nav.find('li').removeClass('active');
			var clickedTag = $(this).attr('href');

			nav.find('a').each(function() {
				if($(this).attr("href") === clickedTag) {
					$(this).parent().addClass('active');
				}

				that.showBanner(clickedTag);
			});
		});
	},

	showBanner: function(page) {
		if(page === "#about") {
			this.$el.find('div.banner').show();
		}
		else {
			this.$el.find('div.banner').hide();
		}
	},

	checkLoggedIn: function() {
		var that = this;

		var rememberedUser = $.cookie('travellar_user');
		if(rememberedUser !== null) {
			console.log("[App] Cookie found! Regenerating user model!");
			this.model.user.set($.parseJSON(rememberedUser));

			Util.CheckLogin(this.model.user);

			// Replace menu
			var header = this.$el.find("#top div.center");
			header.find('#mainNavigation').remove();
			header.append(hbs.navloggedin);

			// Reload event listeners
			this.navigation();
		}
	},

	logOut: function() {
		$.removeCookie('travellar_user');
		window.location.href = "./";
	},

	loggedIn: function(data) {
		console.log("[App] Something tells me the user logged in");
		this.model.user = data;

		// Remember our user
		$.cookie('travellar_user', JSON.stringify(data.toJSON()), { expires: 7 });

		// Force check if logged in
		this.checkLoggedIn();
	}
});