/* globals Router, AboutView, LoginView, RegisterView, PlanYourTripView, MyAccountView, LogoutView */

var AppRouter = Backbone.Router.extend({
  routes: {
    "": "about",
    "about": "about",
    "login": "login",
    "register": "register",
    "my-account": "myAccount",
    "plan-your-trip": "planYourTrip",
    "logout": "logout"
  },
 
  initialize: function(options) {
    console.log("[Router] Init");
    this.appView = options.appView;
    Backbone.history.start();
  },
 
  about: function() {
    console.log("[Router] About");
    var aboutView = new AboutView({model: this.appView.model, collection: this.appView.collection});
    this.appView.showView(aboutView);
  },
 
  login: function() {
    console.log("[Router] Login");
    var loginView = new LoginView({model: this.appView.model, collection: this.appView.collection});
    loginView.on("LOGGED_IN", this.appView.loggedIn);
    this.appView.showView(loginView);
  },
 
  register: function() {
    console.log("[Router] Register");
    var registerView = new RegisterView({model: this.appView.model, collection: this.appView.collection});
    this.appView.showView(registerView);
  },
 
  myAccount: function() {
    console.log("[Router] My Account");
    var myAccountView = new MyAccountView({model: this.appView.model, collection: this.appView.collection});
    this.appView.showView(myAccountView);
  },
 
  planYourTrip: function() {
    console.log("[Router] Plan Your Trip");
    var planYourTripView = new PlanYourTripView({model: this.appView.model, collection: this.appView.collection});
    this.appView.showView(planYourTripView);
  },
 
  logout: function() {
    console.log("[Router] Logout");
    var logoutView = new LogoutView({model: this.appView.model, collection: this.appView.collection});
    logoutView.on("LOGGED_OUT", this.appView.logOut);
    this.appView.showView(logoutView);
  }
});

Backbone.View.prototype.close = function() {
  this.remove();
  this.unbind();

  if(this.onClose){
    this.onClose();
  }
};